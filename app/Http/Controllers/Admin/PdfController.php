<?php

namespace App\Http\Controllers\Admin;

use App\Dress;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;


class PdfController extends Controller
{
    public function totalOrder(){
        $data['total_orders'] = Order::where('status',4)->get();
        $pdf = PDF::loadView('admin.pdf.total_orders_report',$data);
        return $pdf->download('total_orders_report.pdf');
    }

    public function lastWeek(){
        $last_week = Carbon::now()->subDays(7);
        $data['last_week_order'] = Order::where('status',2)->where('created_at', '>=',$last_week)->get();
        $pdf = PDF::loadView('admin.pdf.last_week_orders',$data);
        return $pdf->download('last_week_orders_report.pdf');
    }

    public function lastMonth(){
        $last_month = Carbon::now()->subDays(30);
        $data['last_month_order'] = Order::where('status',2)->where('created_at', '>=',$last_month)->get();
        $pdf = PDF::loadView('admin.pdf.last_month_orders',$data);
        return $pdf->download('last_month_orders_report.pdf');
    }

    public function lastYear(){
        $last_year = Carbon::now()->subDays(365);
        $data['last_year_order'] = Order::where('status',2)->where('created_at', '>=',$last_year)->get();
        $pdf = PDF::loadView('admin.pdf.last_year_orders',$data);
        return $pdf->download('last_year_orders_report.pdf');
    }

    public function totalDesign(){
        $data['total_design'] = Dress::where('status',1)->get();
        $pdf = PDF::loadView('admin.pdf.total_design',$data);
        return $pdf->download('total_design_report.pdf');
    }

    public function pendingDesign(){
        $data['pending_design'] = Dress::where('status',0)->get();
        $pdf = PDF::loadView('admin.pdf.pending_design',$data);
        return $pdf->download('pending_design_report.pdf');
    }

    public function totalStaff(){
        $data['total_staff'] = User::where('role_id',2)->get();
        $pdf = PDF::loadView('admin.pdf.total_staff',$data);
        return $pdf->download('total_staff_report.pdf');
    }
}
