<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = \App\Order::latest()->get();
        return view('admin.order.orderList',compact('orders'));
    }

    public function show($id){

        $orderDetails = OrderDetail::where('order_id',$id)->get();
        $Order = \App\Order::find($id);
        return view('admin.order.orderDetails',compact('orderDetails','Order'));
    }
}
