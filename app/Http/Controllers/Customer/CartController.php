<?php

namespace App\Http\Controllers\Customer;

use App\Dress;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\OrderDetails;
use App\Notifications\NotifyChange;
use App\Notifications\NotifyOrder;
use App\Notifications\NotifyPayment;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\User;
use App\UserInfo;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Stripe;

class CartController extends Controller
{
    public function index(){
       $carts = Cart::where('user_id',Auth::id())->get();
        $total_amount = $carts->sum('total');
        return view('cart.cart',compact('carts','total_amount'));
    }

    public function store(Request $request, $id){

        $this->validate($request, [
            'quantity'=> 'required|min:1',
            'size'=> 'required',
        ]);
        $dress = Dress::find($id);
        $cart = new  Cart();
        $cart->user_id = Auth::id();
        $cart->dress_id = $id;
        $cart->total = $dress->price * $request->quantity;
        $cart->quantity = $request->quantity;
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
        $today = Carbon::now();
//        $cart_item = Cart::where('user_id',Auth::id())->sum('quantity');
        return view('cart.checkout',compact('total_amount','total_item','user_info','today'));
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
            'date'=>'required|date|after:yesterday',
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
        $order->delivery_date = $request->date;
        $order->save();
        $order_id = $order->id;
// ================ Order Details ==================================
        $carts = Cart::where('user_id', Auth::id())->get();

//        $purchase_id = Purchase::where('created_by',Auth::id())->get()->last()->id;
        foreach ($carts as $cart){
            $order_details = new OrderDetail();
            $order_details->order_id = $order_id;
            $order_details->dress_id = $cart->dress_id;
            $order_details->quantity = $cart->quantity;
            $order_details->total = $cart->total;
            $order_details->size = $cart->size;
            $order_details->save();
        }

        $payment = new Payment();
        $payment->order_id=$order_id;
        $payment->user_id=Auth::id();
        $payment->trx_id="null";
        $payment->save();

        Cart::where('user_id', Auth::id())->delete();
        Toastr::success('Order completed','Success!!');
        return redirect()->route('customer.cart.payment',$order_id);
//

    }
    public function orderList(){
        $orders = Auth::user()->orders;
        return view('customer.orderList',compact('orders'));
    }

    public function orderDetails($id){
        $order = Order::find($id);
        $orderDetails = OrderDetail::where('order_id',$id)->get();
        return view('customer.orderDetails',compact('orderDetails','order'));
    }

    public function payment($id){
        $order = Order::find($id);
        return view('customer.payment',compact('order'));

    }

    public function paymentStore(Request $request){

//===================================================
//        return $request;
        $order = Order::find($request->order_id);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $charge =  Stripe\Charge::create ([

            "amount" => $order->total_amount * 86,

            "currency" => "usd",

           "source" => $request->stripeToken,

           "description" => $order->invoice_no. "no invoice is done"

       ]);

        $payment = Payment::where('order_id',$order->id)->first();
        $payment->trx_id = $charge->id;
        $payment->save();
        $order->payment_status = 1;
        $order->save();

        $user = User::where('id',$order->user_id)->first();
        $user->notify(new NotifyPayment($order, $user));

        Toastr::success('payment sent successfully','Success!!');
       return redirect()->route('customer.cart.order.list');
//        =========================================

}

        public function updateSize($id){
        $order_detail = OrderDetail::find($id);
        return view('customer.updateSize',compact('order_detail'));
        }

    public function storeSize(Request $request){
        $order_detail = OrderDetail::find($request->id);

        $order = \App\Order::where('id',$order_detail->order_id)->first();
        $order->status = 2;
        $order->save();
        $order_detail->size = $request->size;
        $order_detail->status = 2;
        $order_detail->save();

        $users = User::where('role_id',2)->get();
        Notification::send($users, new NotifyChange($order_detail));
        Toastr::success('Dress Size Updated','Success!!');
        return redirect()->route('customer.cart.order.list');
    }

    public function orderDestroy($id){
      $order = Order::find($id);
      $order->delete();
      Toastr::success('Order deleted successfully','Success');
      return redirect()->back();
    }

    public function orderAccept($id){
        $order = Order::find($id);
        if ($order->payment_status == 0){
            Toastr::warning('Please Pay First To Complete The Order','Warning');
            return redirect()->back();
        }
        $order->status = 2;
        $order->save();

        $users = User::where('role_id',2)->orWhere('role_id',1)->get();
        Notification::send($users, new NotifyOrder($order ));
        Toastr::success('Order Placed Successfully','Success!');
        return redirect()->back();
    }
}
