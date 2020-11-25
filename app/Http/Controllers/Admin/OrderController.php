<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetails;
use App\Notifications\NotifyDate;
use App\Notifications\NotifyForSize;
use App\Notifications\NotifyOrderConfirmation;
use App\OrderDetail;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use function Sodium\compare;

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

    public function deliveryDateStore(Request $request){
        $this->validate($request,[
            'date'=>'required|after:yesterday',
        ]);

        $order = \App\Order::find($request->order_id);
        $order->possible_date = $request->date;
        $order->status = 1;
        $order->save();
        $user = User::where('id',$order->user_id)->first();
        $user->notify(new NotifyDate($order));
        Toastr::success('Delivery date set up successfully!','Success!!');
        return redirect()->route('admin.order.index');

    }

    public function orderDetails($id){
        $order_details = OrderDetail::find($id);
        return view('admin.order.orderShow',compact('order_details'));
    }

    public function sizeInstruction(Request $request){
        $order_details = OrderDetail::find($request->order_details_id);
        $order = \App\Order::where('id',$order_details->order_id)->first();
        $order->status = 3;
        $order->save();

        $order_details->instruction = $request->instruction;
        $order_details->status = 1;
        $order_details->save();
        $user = User::where('id',$order->user_id)->first();
        $user->notify(new NotifyForSize($order_details));
        Toastr::success('Instruction given with success','Successfully');
        return redirect()->route('admin.order.index');
    }

    public function acceptOrder($id){
        $order = \App\Order::findOrFail($id);
        $order->status = 4;
        $order->save();
        $user = User::where('id',$order->user_id)->first();
        $user->notify(new NotifyOrderConfirmation($order));
        Toastr::success('Order Accepted','Accept');
        return redirect()->back();

    }
}
