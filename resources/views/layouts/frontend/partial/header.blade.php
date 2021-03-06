<div>
    <header class="header-section header-normal">
        <div class="container-fluid">
            <!-- logo -->
            <div class="site-logo">
                <h2>Taylor  Management</h2>
            </div>
            <!-- responsive -->
            <div class="nav-switch">
                <i class="fa fa-bars"></i>
            </div>
            <div class="header-right">
                <a href="{{route('customer.cart.index')}}" class="card-bag"><img src="{{asset('assets/frontend/images/bag.png')}}" alt="">
                    <span>{{\App\Model\Cart::where('user_id',Auth::id())->count()}}</span></a>
{{--                <a href="#" class="search"><img src="{{asset('assets/frontend/images/search.png')}}" alt=""></a>--}}
            </div>
            <!-- site menu -->

            <ul class="main-menu">
                <li class="active"><a href="{{route('home')}}">Home</a></li>
                @if(Auth::user())
                    @php
                        $user_role = Str::lower(Auth::user()->role->role_name);
                    @endphp
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    <li><a href="{{route($user_role.".dashboard")}}">{{Auth::user()->name}}</a></li>
                @else
                <li><a href="{{route('register')}}">Registration</a></li>
                <li><a href="{{route('login')}}">Log In</a></li>
                @endif
            </ul>
        </div>
    </header>

</div>
