<?php

namespace App\Http\Controllers\Admin;

use App\Dress;
use App\Http\Controllers\Controller;
use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{

    public function sliderList(){
        $sliders = Setting::latest()->get();
        return view('admin.settings.sliderList',compact('sliders'));
    }

    public function slider(){
        return view('admin.settings.createSlider');
    }

    public function sliderStore(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description'=>'required',
            'image'=> 'required|mimes:jpeg,jpg,png',
        ]);
        $image = $request->file('image');
        $slug = str::slug($request->title);
        if (isset($image)){
            $currant_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currant_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('slider')){
                Storage::disk('public')->makeDirectory('slider');
            }
            $image_Size = Image::make($image)->resize(1600,1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('slider/'.$image_name,$image_Size);
        }else{
            $image_name = 'default.png';
        }

        $slider = new Setting();
        $slider->title = $request->title;
        $slider->description = $request->title;
        $slider->image = $image_name;
        $slider->status = 1;
        $slider->save();
        Toastr::success('Slider is Created','successful!');
        return redirect()->route('admin.slider.list');
    }

    public function sliderEdit($id){
        $slider = Setting::find($id);
        return view('admin.settings.editSlider',compact('slider'));
    }

    public function sliderUpdate(Request $request , $id){
        $this->validate($request, [
            'title' => 'required',
            'description'=>'required',
            'image'=> 'required|mimes:jpeg,jpg,png',
        ]);
        $slider = Setting::find($id);
        $image = $request->file('image');
        $slug = str::slug($request->title);
        if (isset($image)){
            $currant_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currant_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('slider')){
                Storage::disk('public')->makeDirectory('slider');
            }
            if (Storage::disk('public')->exists('slider/'. $slider->image )) {
                Storage::disk('public')->delete('slider/'. $slider->image );
            }
            $image_Size = Image::make($image)->resize(1600,1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('slider/'.$image_name,$image_Size);
        }else{
            $image_name = 'default.png';
        }

        $slider->title = $request->title;
        $slider->description = $request->title;
        $slider->image = $image_name;
        $slider->status = 1;
        $slider->save();
        Toastr::success('Slider is Updated','successful!');
        return redirect()->route('admin.slider.list');

    }

    public function sliderDestroy($id){
        $slider = Setting::find($id);
        $slider->delete();
        Toastr::success('Slider is Deleted','successful!');
        return redirect()->back();
    }

    public function active($id){
        $slider = Setting::find($id);
        $slider->status = 1;
        $slider->save();
        Toastr::success('Slider is Activated','successful!');
        return redirect()->route('admin.slider.list');
    }

    public  function inactive($id){
        $slider = Setting::find($id);
        $slider->status = 0;
        $slider->save();
        Toastr::success('Slider is Inactivated','successful!');
        return redirect()->route('admin.slider.list');
    }

}
