@extends('layouts.frontend.master')

@section('content')

    <section class="hero-section set-bg" data-setbg="img/bg.jpg">
        <div class="hero-slider owl-carousel">
            @foreach($sliders as $slider)
            <div class="hs-item">
                <div class="hs-left"><img src="{{asset('storage/slider/'.$slider->image)}}" alt="{{$slider->title}}"></div>
                <div class="hs-right">
                    <div class="hs-content">
                        <div class="price ml-4">{{$slider->title}}</div>
                        <br><br>
                        <h2 class="ml-4">{{$slider->description}}</h2>
                    </div>
                </div>
            </div>
            @endforeach
{{--            <div class="hs-item">--}}
{{--                <div class="hs-left"><img src="{{asset('assets/frontend/')}}/img/slider-img.png" alt=""></div>--}}
{{--                <div class="hs-right">--}}
{{--                    <div class="hs-content">--}}
{{--                        <div class="price">from $19.90</div>--}}
{{--                        <h2>summer collection</h2>--}}
{{--                        <p class="site-btn">Shop NOW!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="hs-item">--}}
{{--                <div class="hs-left"><img src="{{asset('assets/frontend/')}}/img/slider-img.png" alt=""></div>--}}
{{--                <div class="hs-right">--}}
{{--                    <div class="hs-content">--}}
{{--                        <div class="price">from $19.90</div>--}}
{{--                        <h2><span>2018</span> <br>summer collection</h2>--}}
{{--                        <p class="site-btn">Shop NOW!</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
<!-- Product section -->
<section class="product-section spad">
    <div class="container">
        <div class="row" id="product-filter">
            @forelse($dresses as $dress)
            <div class="mix col-lg-3 col-md-6 best">
                <div class="product-item">
                    <figure>
                        <img src="{{asset('storage/dress/'.$dress->image)}}" alt="">
                        <div class="pi-meta">
                            <div class="pi-m-left">
                                <img src="{{asset('assets/frontend/')}}/img/icons/eye.png" alt="">
                                <p>quick view</p>
                            </div>
                            <div class="pi-m-right">
                                <img src="{{asset('assets/frontend/')}}/img/icons/heart.png" alt="">
                                <p>save</p>
                            </div>
                        </div>
                    </figure>
                    <div class="product-info">
                        <h6>{{$dress->title}}</h6>
                        <p>{{$dress->price}}</p>
                        <a href="{{route('dress.show',$dress->id)}}" class="site-btn btn-line">View More</a>
                    </div>
                </div>
            </div>
            @empty
                <div class="bg-danger">
                    <h4>There is no design available yet!</h4>
                </div>
            @endforelse
{{--            <div class="mix col-lg-3 col-md-6 new">--}}
{{--                <div class="product-item">--}}
{{--                    <figure>--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/products/2.jpg" alt="">--}}
{{--                        <div class="bache">NEW</div>--}}
{{--                        <div class="pi-meta">--}}
{{--                            <div class="pi-m-left">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/eye.png" alt="">--}}
{{--                                <p>quick view</p>--}}
{{--                            </div>--}}
{{--                            <div class="pi-m-right">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/heart.png" alt="">--}}
{{--                                <p>save</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </figure>--}}
{{--                    <div class="product-info">--}}
{{--                        <h6>Hype grey shirt</h6>--}}
{{--                        <p>$19.50</p>--}}
{{--                        <a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mix col-lg-3 col-md-6 best">--}}
{{--                <div class="product-item">--}}
{{--                    <figure>--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/products/3.jpg" alt="">--}}
{{--                        <div class="pi-meta">--}}
{{--                            <div class="pi-m-left">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/eye.png" alt="">--}}
{{--                                <p>quick view</p>--}}
{{--                            </div>--}}
{{--                            <div class="pi-m-right">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/heart.png" alt="">--}}
{{--                                <p>save</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </figure>--}}
{{--                    <div class="product-info">--}}
{{--                        <h6>long sleeve jacket</h6>--}}
{{--                        <p>$59.90</p>--}}
{{--                        <a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mix col-lg-3 col-md-6 new best">--}}
{{--                <div class="product-item">--}}
{{--                    <figure>--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/products/4.jpg" alt="">--}}
{{--                        <div class="bache sale">SALE</div>--}}
{{--                        <div class="pi-meta">--}}
{{--                            <div class="pi-m-left">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/eye.png" alt="">--}}
{{--                                <p>quick view</p>--}}
{{--                            </div>--}}
{{--                            <div class="pi-m-right">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/heart.png" alt="">--}}
{{--                                <p>save</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </figure>--}}
{{--                    <div class="product-info">--}}
{{--                        <h6>Denim men shirt</h6>--}}
{{--                        <p>$32.20 <span>RRP 64.40</span></p>--}}
{{--                        <a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mix col-lg-3 col-md-6 best">--}}
{{--                <div class="product-item">--}}
{{--                    <figure>--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/products/5.jpg" alt="">--}}
{{--                        <div class="pi-meta">--}}
{{--                            <div class="pi-m-left">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/eye.png" alt="">--}}
{{--                                <p>quick view</p>--}}
{{--                            </div>--}}
{{--                            <div class="pi-m-right">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/heart.png" alt="">--}}
{{--                                <p>save</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </figure>--}}
{{--                    <div class="product-info">--}}
{{--                        <h6>Long red Shirt</h6>--}}
{{--                        <p>$39.90</p>--}}
{{--                        <a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mix col-lg-3 col-md-6 new">--}}
{{--                <div class="product-item">--}}
{{--                    <figure>--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/products/6.jpg" alt="">--}}
{{--                        <div class="bache">NEW</div>--}}
{{--                        <div class="pi-meta">--}}
{{--                            <div class="pi-m-left">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/eye.png" alt="">--}}
{{--                                <p>quick view</p>--}}
{{--                            </div>--}}
{{--                            <div class="pi-m-right">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/heart.png" alt="">--}}
{{--                                <p>save</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </figure>--}}
{{--                    <div class="product-info">--}}
{{--                        <h6>Hype grey shirt</h6>--}}
{{--                        <p>$19.50</p>--}}
{{--                        <a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mix col-lg-3 col-md-6 best">--}}
{{--                <div class="product-item">--}}
{{--                    <figure>--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/products/7.jpg" alt="">--}}
{{--                        <div class="pi-meta">--}}
{{--                            <div class="pi-m-left">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/eye.png" alt="">--}}
{{--                                <p>quick view</p>--}}
{{--                            </div>--}}
{{--                            <div class="pi-m-right">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/heart.png" alt="">--}}
{{--                                <p>save</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </figure>--}}
{{--                    <div class="product-info">--}}
{{--                        <h6>long sleeve jacket</h6>--}}
{{--                        <p>$59.90</p>--}}
{{--                        <a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="mix col-lg-3 col-md-6 best">--}}
{{--                <div class="product-item">--}}
{{--                    <figure>--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/products/8.jpg" alt="">--}}
{{--                        <div class="pi-meta">--}}
{{--                            <div class="pi-m-left">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/eye.png" alt="">--}}
{{--                                <p>quick view</p>--}}
{{--                            </div>--}}
{{--                            <div class="pi-m-right">--}}
{{--                                <img src="{{asset('assets/frontend/')}}/img/icons/heart.png" alt="">--}}
{{--                                <p>save</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </figure>--}}
{{--                    <div class="product-info">--}}
{{--                        <h6>Denim men shirt</h6>--}}
{{--                        <p>$32.20 <span>RRP 64.40</span></p>--}}
{{--                        <a href="#" class="site-btn btn-line">ADD TO CART</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</section>
<!-- Product section end -->


<!-- Blog section -->
{{--<section class="blog-section spad">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-5">--}}
{{--                <div class="featured-item">--}}
{{--                    <img src="{{asset('assets/frontend/')}}/img/featured/featured-3.jpg" alt="">--}}
{{--                    <a href="#" class="site-btn">see more</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-7">--}}
{{--                <h4 class="bgs-title">from the blog</h4>--}}
{{--                <div class="blog-item">--}}
{{--                    <div class="bi-thumb">--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/blog-thumb/1.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="bi-content">--}}
{{--                        <h5>10 tips to dress like a queen</h5>--}}
{{--                        <div class="bi-meta">July 02, 2018   |   By maria deloreen</div>--}}
{{--                        <a href="#" class="readmore">Read More</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="blog-item">--}}
{{--                    <div class="bi-thumb">--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/blog-thumb/2.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="bi-content">--}}
{{--                        <h5>Fashion Outlet products</h5>--}}
{{--                        <div class="bi-meta">July 02, 2018   |   By Jessica Smith</div>--}}
{{--                        <a href="#" class="readmore">Read More</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="blog-item">--}}
{{--                    <div class="bi-thumb">--}}
{{--                        <img src="{{asset('assets/frontend/')}}/img/blog-thumb/3.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="bi-content">--}}
{{--                        <h5>the little black dress just for you</h5>--}}
{{--                        <div class="bi-meta">July 02, 2018   |   By maria deloreen</div>--}}
{{--                        <a href="#" class="readmore">Read More</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- Blog section end -->
@endsection
