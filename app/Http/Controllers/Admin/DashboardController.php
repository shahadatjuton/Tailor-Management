<?php

namespace App\Http\Controllers\Admin;

use App\Dress;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $last_week = Carbon::now()->subDays(7);
        $last_month = Carbon::now()->subDays(30);
        $last_year = Carbon::now()->subDays(365);

        $data['total_order'] = Order::where('status',2)->count();
        $data['last_week_order'] = Order::where('status',2)->where('created_at', '>=',$last_week)->count();
        $data['last_month_order'] = Order::where('status',2)->where('created_at', '>=',$last_month)->count();
        $data['last_year_order'] = Order::where('status',2)->where('created_at', '>=',$last_year)->count();
        $data['total_amount'] = Order::where('status',2)->sum('total_amount');
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
