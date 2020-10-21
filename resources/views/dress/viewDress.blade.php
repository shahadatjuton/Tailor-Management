@extends('layouts.frontend.master')

@section('content')

    <!-- Page Preloder -->
{{--<div id="preloder">--}}
{{--    <div class="loader"></div>--}}
{{--</div>--}}

<!-- Header section -->
<header class="header-section header-normal">
    <div class="container-fluid">
        <!-- logo -->
        <div class="site-logo">
            <img src="{{asset('assets/frontend')}}/img/logo.png" alt="logo">
        </div>
        <!-- responsive -->
        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>
        <div class="header-right">
            <a href="cart.html" class="card-bag"><img src="{{asset('assets/frontend')}}img/icons/bag.png" alt=""><span>2</span></a>
            <a href="#" class="search"><img src="{{asset('assets/frontend')}}img/icons/search.png" alt=""></a>
        </div>
        <!-- site menu -->
        <ul class="main-menu">
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="#">Woman</a></li>
            <li><a href="#">Man</a></li>
            <li><a href="#">LookBook</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
</header>
<!-- Header section end -->

<!-- Page -->
<div class="page-area product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <figure>
                    <img class="product-big-img" src="{{asset('storage/dress/'.$dress->image)}}" alt="{{$dress->title}}">
                </figure>
            </div>
            <div class="col-lg-6">
                <div class="product-content">
                    <h2>{{$dress->title}}</h2>
                    <div class="pc-meta">
                        <h4 class="price">{{$dress->price}}</h4>
                    </div>
                    <p>{{$dress->description}}</p>
{{--       Form             --}}
                    <form action="{{route('admin.user.store')}}" method="post" id="createUser" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <!-- /.form-group -->
                            <div class="form-group col-md-4">
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" min="1">
                            </div>

                            <div class="form-group col-md-4 offset-5">
                                <a href="#" class="site-btn btn-line">ADD TO CART</a>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="product-details">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <ul class="nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Description</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <!-- single tab content -->
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                            <p>{{$dress->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center rp-title">
            <h5>Related products</h5>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="product-item">
                    <figure>
                        <img src="img/products/1.jpg" alt="">
                        <div class="pi-meta">
                            <div class="pi-m-left">
                                <img src="img/icons/eye.png" alt="">
                                <p>quick view</p>
                            </div>
                            <div class="pi-m-right">
                                <img src="img/icons/heart.png" alt="">
                                <p>save</p>
                            </div>
                        </div>
                    </figure>
                    <div class="product-info">
                        <h6>Long red Shirt</h6>
                        <p>$39.90</p>
                        <a href="#" class="site-btn btn-line">ADD TO CART</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="product-item">
                    <figure>
                        <img src="img/products/2.jpg" alt="">
                        <div class="bache">NEW</div>
                        <div class="pi-meta">
                            <div class="pi-m-left">
                                <img src="img/icons/eye.png" alt="">
                                <p>quick view</p>
                            </div>
                            <div class="pi-m-right">
                                <img src="img/icons/heart.png" alt="">
                                <p>save</p>
                            </div>
                        </div>
                    </figure>
                    <div class="product-info">
                        <h6>Hype grey shirt</h6>
                        <p>$19.50</p>
                        <a href="#" class="site-btn btn-line">ADD TO CART</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="product-item">
                    <figure>
                        <img src="img/products/3.jpg" alt="">
                        <div class="pi-meta">
                            <div class="pi-m-left">
                                <img src="img/icons/eye.png" alt="">
                                <p>quick view</p>
                            </div>
                            <div class="pi-m-right">
                                <img src="img/icons/heart.png" alt="">
                                <p>save</p>
                            </div>
                        </div>
                    </figure>
                    <div class="product-info">
                        <h6>long sleeve jacket</h6>
                        <p>$59.90</p>
                        <a href="#" class="site-btn btn-line">ADD TO CART</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="product-item">
                    <figure>
                        <img src="img/products/4.jpg" alt="">
                        <div class="bache sale">SALE</div>
                        <div class="pi-meta">
                            <div class="pi-m-left">
                                <img src="img/icons/eye.png" alt="">
                                <p>quick view</p>
                            </div>
                            <div class="pi-m-right">
                                <img src="img/icons/heart.png" alt="">
                                <p>save</p>
                            </div>
                        </div>
                    </figure>
                    <div class="product-info">
                        <h6>Denim men shirt</h6>
                        <p>$32.20 <span>RRP 64.40</span></p>
                        <a href="#" class="site-btn btn-line">ADD TO CART</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page end -->


@endsection
