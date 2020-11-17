<?php

namespace App\Http\Controllers\Customer;

use App\Dress;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use App\UserInfo;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{
    public function index(){
        $orders = Auth::user()->orders()->get();
        $user_info =  Auth::user()->userInfo->count();
        return view('customer.dashboard',compact('user_info','orders'));
    }

    public function customerInfo(){
        return view('customer.userInfo');
    }

    public function infoStore(Request $request){
        $this->validate($request,[
            'house'=>'required',
            'road'=>'required',
            'zone'=>'required',
            'city'=>'required',
            'phone'=>'required',
            'image'=>'required',
            'size'=>'required',
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
        $user = User::find(Auth::id());
        $user->image = $image_name;
        $user->save();

        $info = new  UserInfo();
        $info->user_id = Auth::id();
        $info->size = $request->size;
        $info->house = $request->house;
        $info->road = $request->road;
        $info->zone = $request->zone;
        $info->city = $request->city;
        $info->phone = $request->phone;
        $info->save();
        Toastr::success('Your information is up-to dated successfully!','Success');
        return redirect()->route('customer.dashboard');


    }
}
