<?php

namespace App\Http\Controllers\Admin;

use App\Dress;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['total_order'] = Order::where('status',2)->count();
        $data['total_design'] = Dress::where('status',1)->count();
        $data['pending_design'] = Dress::where('status',0)->count();
        $data['total_staff'] = User::where('role_id',2)->count();
        return view('admin.dashboard',$data);
    }

    public function userList(){
        $users = User::all();
        dd($users);
        return view('admin.user.userList');
    }
}
