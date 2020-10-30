@extends('layouts.frontend.master')

@section('content')
<!-- Page -->
<div class="page-area cart-page spad">
    <div class="container">
        <div class="cart-table table-responsive">
            <table>
                <thead>
                <tr>
                    <th class="product-th">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th class="total-th">Total</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @forelse($carts as $cart)
                <tr>
                    <td class="product-col">
                        <img src="{{asset('storage/dress/'.(\App\Dress::find($cart->dress_id))->image)}}" alt="Design Image">
                        <div class="pc-title">
                            <h4>{{(\App\Dress::find($cart->dress_id))->title}}</h4>
                            <a href="#">Edit Product</a>
                        </div>
                    </td>
                    <td class="price-col">{{(\App\Dress::find($cart->dress_id))->price}}</td>
                    <td class="quy-col">
                        <div class="quy-input">
                            <span>Qty</span>
                            <input  value="{{$cart->quantity}}" readonly>
                        </div>
                    </td>
                    <td class="total-col">{{(\App\Dress::find($cart->dress_id))->price * $cart->quantity}}</td>
                        <td>
                            <a href="{{route('customer.cart.destroy',$cart->id)}}" class="btn btn-danger float-right">Remove</a>
                        </td>
                </tr>
                @empty
                    <div>
                        <h4>There is no dress in cart list</h4>
                    </div>
                @endforelse
                @if($carts->count() > 0)
                <tr>
                    <td colspan="3"></td>
                    <td>Grand Total </td>
                    <td>56789 Taka</td>
                </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="row cart-buttons">
            <div class="col-lg-5 col-md-5">
                <a href="{{route('home')}}" class="site-btn btn-continue">Continue Shopping</a>

            </div>
            <div class="col-lg-7 col-md-7 text-lg-right text-left">
                <a href="{{route('customer.cart.clear')}}" class="site-btn btn-line btn-update">Clear Cart</a>
                <a href="{{route('customer.cart.checkout')}}" class="site-btn btn-continue">Checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- Page end -->
@endsection
