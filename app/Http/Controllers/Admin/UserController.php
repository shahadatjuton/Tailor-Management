<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view('admin.user.userList',compact('users'));
    }

    public function create(){
        $roles = Role::latest()->get();
        return view('admin.user.createUser',compact('roles'));
    }

    public function store(Request $request){


        $this->validate($request, [
           'name' => 'required',
            'email'=>'required',
            'password'=>'required|confirmed',
            'role'=> 'required',
        ]);
        $image = $request->file('image');
        $slug = $request->name;
        if (isset($image)){
            $currant_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currant_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile')){
                Storage::disk('public')->makeDirectory('profile');
            }
            $image_Size = Image::make($image)->resize(1600,1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('profile/'.$image_name,$image_Size);
        }else{
            $image_name = 'default.png';
        }
        $role = $request->role;
        if ($role == "Admin"){
            $role_id = 1;
        }elseif ($role == "Staff"){
            $role_id = 2;
        }else{
            $role_id = 3;
        }


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $role_id;
        $user->image = $image_name;
        $user->save();
        Toastr::success('User created successfully!','Success');
        return redirect()->route('admin.user.list');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.user.editUser',compact('user','roles'));
    }

    public function update(Request $request ,$id){

        $this->validate($request, [
            'name' => 'required',
            'email'=>'required',
            'role'=> 'required',
        ]);
        $user = User::findOrFail($id);

        $image = $request->file('image');
        $slug = $request->name;
        if (isset($image)){
            $currant_date = Carbon::now()->toDateString();
            $image_name = $slug.'-'.$currant_date.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('profile')){
                Storage::disk('public')->makeDirectory('profile');
            }
            if (Storage::disk('public')->exists('profile/'. $user->image )) {
                Storage::disk('public')->delete('profile/'. $user->image );
            }
            $image_Size = Image::make($image)->resize(1600,1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('profile/'.$image_name,$image_Size);
        }else{
            $image_name = 'default.png';
        }
        $role = $request->role;
        if ($role == "Admin"){
            $role_id = 1;
        }elseif ($role == "Staff"){
            $role_id = 2;
        }else{
            $role_id = 3;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $role_id;
        $user->image = $image_name;
        $user->save();
        Toastr::success('User Updated successfully!','Success');
        return redirect()->route('admin.user.list');
    }
    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        Toastr::success('The data is deleted successfully!','Success!');
        return redirect()->route('admin.user.list');
    }
}
