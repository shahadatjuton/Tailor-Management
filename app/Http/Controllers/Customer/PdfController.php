<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Order;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Support\Facades\Auth;

class PdfController extends Controller
{
    public function invoice($id){
        $data['order'] = Order::find($id);
        $pdf = PDF::loadView('customer.pdf.invoice',$data);
        return $pdf->download('invoice.pdf');
    }
}
