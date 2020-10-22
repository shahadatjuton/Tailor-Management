<div>
    <header class="header-section header-normal">
        <div class="container-fluid">
            <!-- logo -->
            <div class="site-logo">
                <img src="{{asset('assets/frontend/')}}/img/logo.png" alt="logo">
            </div>
            <!-- responsive -->
            <div class="nav-switch">
                <i class="fa fa-bars"></i>
            </div>
            <div class="header-right">
                <a href="{{route('customer.cart.index')}}" class="card-bag"><img src="{{asset('assets/frontend/images/bag.png')}}" alt="">
                    <span>{{\App\Model\Cart::where('user_id',Auth::id())->count()}}</span></a>
                <a href="#" class="search"><img src="{{asset('assets/frontend/images/search.png')}}" alt=""></a>
            </div>
            <!-- site menu -->
            <ul class="main-menu">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="#">Woman</a></li>
                <li><a href="#">Man</a></li>
                <li><a href="#">LookBook</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="{{route('login')}}">Log In</a></li>
            </ul>
        </div>
    </header>

</div>
