<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function totalOrder(){
        $data['total_order'] = Order::where('status',4)->latest()->get();

        return view('staff.report.total_order',$data);
    }

    public function pendingOrder(){
        $data['pending_order'] = Order::where('status', 0)->orWhere('status', 1)->orWhere('status', 2)->orWhere('status', 3)->latest()->get();

        return view('staff.report.pending_order',$data);
    }
    public function ownDesign(){
        $data['own_design'] = Auth::user()->dresses->where('status',1);

        return view('staff.report.own_design',$data);
    }
}
