<?php

namespace App\Http\Controllers\Staff;

use App\Dress;
use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $last_week = Carbon::now()->subDays(7);
        $last_month = Carbon::now()->subDays(30);
        $last_year = Carbon::now()->subDays(365);
        $data['total_order'] = Order::where('status',4)->latest()->get();
        $data['pending_order'] = Order::where('status', 0)->orWhere('status', 1)->orWhere('status', 2)->orWhere('status', 3)->latest()->get();
        $data['total_design'] = Dress::where('status',1)->get();
        $data['own_design'] = Auth::user()->dresses->where('status',1);
        return view('staff.dashboard',$data);
    }
}
