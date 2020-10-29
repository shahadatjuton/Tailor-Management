{{--@extends('layouts.backend.master')--}}

{{--@push('css')--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
{{--    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>--}}
{{--@endpush--}}

{{--@section('content')--}}
{{--    <!-- Content Wrapper. Contains page content -->--}}
{{--    <div class="content-wrapper">--}}


{{--        <!-- Main content -->--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12"><pre id="token_response"></pre></div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-4">--}}
{{--                    <button class="btn btn-primary btn-block" onclick="pay(10)">Pay $10</button>--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                    <button class="btn btn-success btn-block" onclick="pay(50)">Pay $50</button>--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                    <button class="btn btn-info btn-block" onclick="pay(100)">Pay $100</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- /.content -->--}}
{{--    </div>--}}
{{--    <!-- /.content-wrapper -->--}}
{{--@endsection--}}

{{--@push('js')--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://checkout.stripe.com/checkout.js"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--        function pay(amount) {--}}
{{--            var handler = StripeCheckout.configure({--}}
{{--                key: 'pk_test_51HgPI5FDuGHSpFLnbVfzD7UlTnJA9Y89Rz6qUSUKXFjaBBzE4LIUwz1OYNDXOKWV8WgHXX6hqlMjQMACPaPvcwQE009jBphl47', // your publisher key id--}}
{{--                locale: 'auto',--}}
{{--                token: function (token) {--}}
{{--// You can access the token ID with `token.id`.--}}
{{--// Get the token ID to your server-side code for use.--}}
{{--                    console.log('Token Created!!'+ token);--}}
{{--                    console.log(token)--}}
{{--                    $('#token_response').html(JSON.stringify(token));--}}
{{--                    $.ajax({--}}
{{--                        url: '{{ route('customer.cart.payment.store') }}',--}}
{{--                        method: 'post',--}}
{{--                        data: { tokenId: token.id, amount: amount },--}}
{{--                        success: (response) => {--}}
{{--                            console.log(response)--}}
{{--                        },--}}
{{--                        error: (error) => {--}}
{{--                            console.log(error);--}}
{{--                            alert('Oops! Something went wrong')--}}
{{--                        }--}}
{{--                    })--}}
{{--                }--}}
{{--            });--}}
{{--            handler.open({--}}
{{--                name: 'Demo Site',--}}
{{--                description: '2 widgets',--}}
{{--                amount: amount * 100--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}


{{--========================================================================================================--}}


    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Stripe Payment Gateway Integrate - Tutsmake.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <style>
        .mt40{
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mt40">
            <div class="text-center">
                <h2>Pay for Event</h2>
                <br>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Something went wrong<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <form accept-charset="UTF-8" action="{{route('customer.cart.payment.store')}}" class="require-validation"
                  data-cc-on-file="false"
                  data-stripe-publishable-key="test_public_key"
                  id="payment-stripe" method="post">
                @csrf
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                      <input type='hidden' name="order_id" value="{{$order->id}}">
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <label class='control-label'>Name on Card</label> <input
                            class='form-control' size='4' type='text'>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-12 form-group'>
                        <label class='control-label'>Card Number</label> <input
                            autocomplete='off' class='form-control' size='20'
                            type='text' name="card_no">
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-4 form-group'>
                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                                                        class='form-control' placeholder='ex. 311' size='3'
                                                                        type='text' name="ccv">
                    </div>
                    <div class='col-xs-4 form-group'>
                        <label class='control-label'>Expiration</label> <input
                            class='form-control' placeholder='MM' size='2'
                            type='text' name="expiry_month">
                    </div>
                    <div class='col-xs-4 form-group'>
                        <label class='control-label'> </label> <input
                            class='form-control' placeholder='YYYY' size='4'
                            type='text' name="expiry_year">
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <div class='form-control total btn btn-info'>
                            Total: <span class='amount'>$20</span>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12 form-group'>
                        <button class='form-control btn btn-primary submit-button'
                                type='submit' style="margin-top: 10px;">Pay »</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

