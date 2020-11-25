<?php

namespace App\Http\Controllers;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function index(){
        $user = User::findOrFail(Auth::id());
        return view('profile.viewProfile',compact('user'));
    }
    public function edit($id){
        $user = User::findOrFail($id);
        return view('profile.editProfile',compact('user'));
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'name' => 'required',
            'email'=>'required',
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
            if ($user->image !== "default.png"){

                        if (Storage::disk('public')->exists('profile/'. $user->image )) {
                            Storage::disk('public')->delete('profile/'. $user->image );
                        }
            }
            $image_Size = Image::make($image)->resize(1600,1080)->save($image->getClientOriginalExtension());
            Storage::disk('public')->put('profile/'.$image_name,$image_Size);
        }else{
            $image_name = 'default.png';
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $image_name;
        $user->save();
        Toastr::success('Profile Updated successfully!','Success');
        return redirect()->route('profile.view');
    }

    public function newPassword(){
        return view('profile.changePassword');
    }
    public function changePassword(Request $request){
        $this->validate( $request,[
            'current_password'=>'required',
            'password'=>'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword))
        {
            if (!Hash::check($request->password, $hashedPassword))
            {
                $user= User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::warning('Your password has been changed successfully!','warning');
                Auth::logout();
                return redirect()->back();
            } else
            {
                Toastr::warning('New password can not be same as old password','warning');
                return redirect()->back();
            }
        } else
        {
            Toastr::error('Your password does not match', 'error');
            return redirect()->back();
        }
    }
}
