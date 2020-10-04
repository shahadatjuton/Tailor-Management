<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TagController extends Controller
{

    public function index(){
        $tags = Tag::all();
        return view('admin.tag.tagList',compact('tags'));
    }
    public function create(){
        return view('admin.tag.createTag');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=> 'required'
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = str::slug('$request->name');
        $tag->created_by = Auth::id();
        $tag->save();
        Toastr::success('Category Created Successfully!','Success!!');
        return redirect()->route('admin.tag.index');
    }
    public function edit($id){
        $tag = Tag::findOrFail($id);
        return view('admin.tag.editTag',compact('tag'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=> 'required'
        ]);

        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->slug = str::slug('$request->name');
        $tag->updated_by = Auth::id();
        $tag->save();
        Toastr::success('Category Updated Successfully!','Success!!');
        return redirect()->route('admin.tag.index');
    }
    public function destroy($id){
        $tag = Tag::findOrFail($id);
        $tag->delete();
        Toastr::success('Category Deleted Successfully!','Success!!');
        return redirect()->route('admin.tag.index');
    }
}
