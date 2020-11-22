<?php

namespace App\Http\Controllers\Admin;

use App\Dress;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function totalOrder(){
        $data['total_orders'] = Order::where('status',4)->get();
        return view('admin.report.total_orders_report',$data);
    }

    public function lastWeek(){
        $last_week = Carbon::now()->subDays(7);
        $data['last_week_order'] = Order::where('status',2)->where('created_at', '>=',$last_week)->get();
        return view('admin.report.last_week_orders',$data);
    }

    public function lastMonth(){
        $last_month = Carbon::now()->subDays(30);
        $data['last_month_order'] = Order::where('status',2)->where('created_at', '>=',$last_month)->get();
        return view('admin.report.last_month_orders',$data);
    }

    public function lastYear(){
        $last_year = Carbon::now()->subDays(365);
        $data['last_year_order'] = Order::where('status',2)->where('created_at', '>=',$last_year)->get();
        return view('admin.report.last_year_orders',$data);
    }

    public function totalDesign(){
        $data['total_design'] = Dress::where('status',1)->get();
        return view('admin.report.total_design',$data);
    }

    public function pendingDesign(){
        $data['pending_design'] = Dress::where('status',0)->get();
        return view('admin.report.pending_design',$data);
    }

    public function totalStaff(){
        $data['total_staff'] = User::where('role_id',2)->get();
        return view('admin.report.total_staff',$data);
    }
}
