@extends('layouts.frontend.master')


@push('css')

@endpush

@section('content')
<!-- Page -->
<!-- Page -->
<div class="page-area cart-page spad">
    <div class="container">
        <form  action="{{route('customer.cart.order')}}" method="post" class="checkout-form" id="payment-form">
            @csrf
            <div class="row">
                @if($user_info !== null)
                    <div class="col-lg-6">
                        <h4 class="checkout-title">Billing Address</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="First Name *" name="name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="E-mail *" name="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone *" name="phone" value="{{$user_info->phone}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone *" name="house" value="{{$user_info->house}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone *" name="road" value="{{$user_info->road}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone *" name="zone" value="{{$user_info->zone}}">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Phone *"  class="text-center" name="city" value="{{$user_info->city}}">
                            </div>

                        </div>
                    </div>
                @else
                <h4>Please fill the form manually or update your information</h4>
                    <div class="col-lg-6">
                        <h4 class="checkout-title">Billing Address</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" placeholder="First Name *" name="name" value="{{Auth::user()->name}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="E-mail *" name="email" value="{{Auth::user()->email}}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone *" name="phone">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone *" name="house">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone *" name="road">
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Phone *" name="zone">
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Phone *"  class="text-center" name="city" >
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-6">
                    <div class="order-card">
                        <div class="order-details">
                            <div class="od-warp">
                                <h4 class="checkout-title">Your order</h4>
                                <table class="order-table">
                                    <thead>
                                    <tr>
                                        <th>No Of Items</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$total_item}}</td>
                                        <td>{{$total_amount}}</td>
                                        <input type="hidden" name="total" value="{{$total_amount}}">
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <label>Select Possible Delivery Date</label>
                                    <input type="date" name="date" min="{{$today}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="site-btn btn-full">
                            Place Order</button>
                    </div>
                </div>
            </div>
        </form>
{{--        --}}
        <div class="container" style="margin-top:10%;margin-bottom:10%">
            <div class="row justify-content-center">

            </div>
        </div>
{{--        --}}
    </div>
</div>
<!-- Page -->
<!-- Page end -->
@endsection

@push('js')

@endpush
