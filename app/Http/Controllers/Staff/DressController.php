<?php

namespace App\Http\Controllers\Staff;

use App\Category;
use App\Dress;
use App\Http\Controllers\Controller;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class DressController extends Controller
{
    public function index(){
        $dresses = Dress::where('created_by',Auth::id())->latest()->get();
        return view('staff.dress.dressList',compact('dresses'));
    }

    public function create(){
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('staff.dress.CreateDress',compact('categories','tags'));
    }

    public function store( Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description'=>'required',
            'price'=>'required',
            'category'=> 'required',
            'tag'=> 'required',
        ]);
        $image = $request->file('image');
        $slug = str::slug($request->title);
        if (isset($image)){
            $currant_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currant_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('dress')){
                Storage::disk('public')->makeDirectory('dress');
            }
            $image_Size = Image::make($image)->resize(1600,1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('dress/'.$image_name,$image_Size);
        }else{
            $image_name = 'default.png';
        }

        $dress = new Dress();
        $dress->title = $request->title;
        $dress->slug = str::slug($request->title);
        $dress->description = $request->description;
        $dress->price = $request->price;
        $dress->created_by = Auth::id();
        $dress->image = $image_name;
        $dress->status = 0;
        $dress->save();
        Toastr::success('Dress is Created','successful!');
        return redirect()->route('staff.dress.index');

    }

    public function edit($id){
        $dress = Dress::findOrFail($id);
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        return view('staff.dress.editDress',compact('dress','categories','tags'));
    }

    public function update( Request $request, $id){
        $this->validate($request, [
            'title' => 'required',
            'description'=>'required',
            'price'=>'required',
            'category'=> 'required',
            'tag'=> 'required',
        ]);
        $dress = Dress::findOrFail($id);

        $image = $request->file('image');
        $slug = str::slug($request->title);
        if (isset($image)){
            $currant_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currant_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('dress')){
                Storage::disk('public')->makeDirectory('dress');
            }
            if (Storage::disk('public')->exists('dress/'. $dress->image )) {
                Storage::disk('public')->delete('dress/'. $dress->image );
            }
            $image_Size = Image::make($image)->resize(1600,1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('dress/'.$image_name,$image_Size);
        }else{
            $image_name = 'default.png';
        }

        $dress->title = $request->title;
        $dress->slug = str::slug($request->title);
        $dress->description = $request->description;
        $dress->price = $request->price;
        $dress->created_by = Auth::id();
        $dress->image = $image_name;
        $dress->save();
        Toastr::success('Dress is Updated','successful!');
        return redirect()->route('staff.dress.index');
    }
    public function destroy($id){
        $dress = Dress::findOrFail($id);
        $dress->delete();
        Toastr::success('The data is deleted successfully!','Success!');
        return redirect()->route('staff.dress.index');
    }
}
