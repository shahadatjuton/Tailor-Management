<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use Brian2694\Toastr\Facades\Toastr;
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
        $cart = new  Cart();
        $cart->user_id = Auth::id();
        $cart->dress_id = $id;
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
        return view('cart.checkout');
    }

}
