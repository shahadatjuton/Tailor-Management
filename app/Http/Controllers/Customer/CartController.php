<?php

namespace App\Http\Controllers\Customer;

use App\Dress;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\OrderDetails;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\UserInfo;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
       $carts = Cart::where('user_id',Auth::id())->get();
        return view('cart.cart',compact('carts'));
    }

    public function store(Request $request, $id){

        $this->validate($request, [
            'quantity'=> 'required',
            'date'=> 'required',
            'size'=> 'required',
        ]);
        $dress = Dress::find($id);
        $cart = new  Cart();
        $cart->user_id = Auth::id();
        $cart->dress_id = $id;
        $cart->total = $dress->price * $request->quantity;
        $cart->quantity = $request->quantity;
        $cart->delivery_date = $request->date;
        $cart->size =$request->size;
        $cart->save();
        Toastr::success('Dress added into cart list','Success!');
        return redirect()->route('customer.cart.index');
    }

    public function destroy($id){
        $cart = Cart::find($id);
        $cart->delete();
        Toastr::success('Item Deleted','Success!');
        return redirect()->back();
    }

    public function clear(){
        $carts = Cart::where('user_id',Auth::id())->delete();
        Toastr::success('Cart cleared ', 'Success!');
        return redirect()->back();
    }
    public function checkout(){
        $user_info = UserInfo::where('user_id',Auth::id())->first();
        $carts= Cart::where('user_id',Auth::id())->get();
        $total_item = $carts->sum('quantity');
        $total_amount = $carts->sum('total');
//        $cart_item = Cart::where('user_id',Auth::id())->sum('quantity');
        return view('cart.checkout',compact('total_amount','total_item','user_info'));
    }

    public function order(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'house'=>'required',
            'road'=>'required',
            'zone'=>'required',
            'city'=>'required',
        ]);
        if ( UserInfo::where('user_id',Auth::id())->first()->count() < 1){
            $info = new  UserInfo();
            $info->user_id = Auth::id();
            $info->size = $request->size;
            $info->house = $request->house;
            $info->road = $request->road;
            $info->zone = $request->zone;
            $info->city = $request->city;
            $info->phone = $request->phone;
            $info->save();
        }

// ================      Order Number ========================
        $order = Order::all()->count();
        if ($order > 0){
            $order_id = Order::where('user_id',Auth::id())->get()->last()->id;
        }
        else{
            $order_id = 0;
        }
        $year = Carbon::now()->year;
        $date = Carbon::now()->format('Ymd-');
        $invoice_no = '#'.$date.'TMS-'.str_pad( $order_id + 1,  "0", STR_PAD_LEFT);
// ================   Save Order ===============================
        $order = new Order();
        $order->user_id = Auth::id();
        $order->invoice_no = $invoice_no;
        $order->total_amount = $request->total;
        $order->payment_status = 0;
        $order->save();

// ================ Order Details ==================================
        $carts = Cart::where('user_id', Auth::id())->get();

//        $purchase_id = Purchase::where('created_by',Auth::id())->get()->last()->id;
        foreach ($carts as $cart){
            $order_details = new OrderDetail();
            $order_details->order_id = $order->id;
            $order_details->dress_id = $cart->dress_id;
            $order_details->quantity = $cart->quantity;
            $order_details->total = $cart->total;
            $order_details->size = $cart->size;
            $order_details->save();
        }

        $payment = new Payment();
        $payment->order_id=$order->id;
        $payment->user_id=Auth::id();
        $payment->trx_id="trx-id";
        $payment->save();

        Cart::where('user_id', Auth::id())->delete();
        Toastr::success('Order completed','Success!!');
        return redirect()->route('customer.dashboard');
//

    }

}
