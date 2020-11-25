<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Order;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{

    public function totalOrder(){
        return "okay";
        $data['total_order'] = Order::where('status',4)->latest()->get();
        $pdf = PDF::loadView('staff.pdf.total_order',$data);
        return $pdf->download('total_order_report.pdf');
    }

    public function pendingOrder(){
        $data['pending_order'] = Order::where('status', 0)->orWhere('status', 1)->orWhere('status', 2)->orWhere('status', 3)->latest()->get();
        $pdf = PDF::loadView('staff.pdf.pending_orders_report',$data);
        return $pdf->download('pending_order_report.pdf');
    }
    public function ownDesign(){
        $data['own_design'] = Auth::user()->dresses->where('status',1);
        $pdf = PDF::loadView('staff.pdf.own_design',$data);
        return $pdf->download('own_design_report.pdf');
    }

    public function invoice($id){
        $data['order'] = Order::find($id);
        $pdf = PDF::loadView('staff.pdf.invoice',$data);
        return $pdf->download('invoice.pdf');
    }


}
