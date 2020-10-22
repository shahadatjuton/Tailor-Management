@extends('layouts.frontend.master')

@section('content')
<!-- Page -->
<!-- Page -->
<div class="page-area cart-page spad">
    <div class="container">
        <form class="checkout-form">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="checkout-title">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" placeholder="First Name *">
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="Last Name *">
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="E-mail *">
                        </div>
                        <div class="col-md-6">
                            <input type="text" placeholder="Phone *">
                        </div>
                        <div class="col-md-12">
                            <input type="text" placeholder="Address *">
                        </div>

                    </div>
                </div>
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
                                        <td>Cocktail Yellow dress</td>
                                        <td>$59.90</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="pm-item">
                                    <input type="radio" name="pm" id="one">
                                    <label for="one">Paypal</label>
                                </div>
                            </div>
                        </div>
                        <button class="site-btn btn-full">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Page -->
<!-- Page end -->
@endsection
