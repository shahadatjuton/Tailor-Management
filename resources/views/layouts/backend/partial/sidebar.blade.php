@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
{{--        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
        <span class="brand-text font-weight-light">Tailor Management</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('storage/profile/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview {{($prefix == "admin/dashboard")?'menu-open':''}}">
                    <a href="#" class="nav-link {{($prefix == "admin/dashboard")?'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    </ul>
                </li>
@if(Auth::id() == 1)
                <li class="nav-item has-treeview {{($prefix == "admin/user")?'menu-open':''}}">
                    <a href="#" class="nav-link {{($prefix == "admin/user")?'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.user.index')}}" class="nav-link {{($route == "admin.user.index")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View User List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.user.create')}}" class="nav-link {{($route == "admin.user.create")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Create User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{($prefix == "admin/category")?'menu-open':''}}">
                    <a href="#" class="nav-link {{($prefix == "admin/category")?'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Category Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.category.index')}}" class="nav-link {{($route == "admin.category.index")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Category List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.category.create')}}" class="nav-link {{($route == "admin.category.create")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Create Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{($prefix == "admin/tag")?'menu-open':''}}">
                    <a href="#" class="nav-link {{($prefix == "admin/tag")?'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Tag Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.tag.index')}}" class="nav-link {{($route == "admin.tag.index")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Tag List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.tag.create')}}" class="nav-link {{($route == "admin.tag.create")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Create Tag</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{($prefix == "admin/dress")?'menu-open':''}}">
                    <a href="#" class="nav-link {{($prefix == "admin/dress")?'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dress Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.dress.index')}}" class="nav-link {{($route == "admin.dress.index")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Dress List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.dress.create')}}" class="nav-link {{($route == "admin.dress.create")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Create Dress</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.dress.pending')}}" class="nav-link {{($route == "admin.dress.pending")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Pending Design List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    <li class="nav-item has-treeview {{($prefix == "order")?'menu-open':''}}">
                        <a href="#" class="nav-link {{($prefix == "order")?'active':''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Order Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.order.index')}}" class="nav-link {{($route == "admin.order.index")?'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Orders</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @elseif(Auth::id() == 2)
{{--                Staff--}}
                    <li class="nav-item has-treeview {{($prefix == "staff/dress")?'menu-open':''}}">
                        <a href="#" class="nav-link {{($prefix == "staff/dress")?'active':''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dress Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('staff.dress.index')}}" class="nav-link {{($route == "staff.dress.index")?'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Dress List</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('staff.dress.create')}}" class="nav-link {{($route == "staff.dress.create")?'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p> Create Dress</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{($prefix == "staff/order")?'menu-open':''}}">
                        <a href="#" class="nav-link {{($prefix == "staff/order")?'active':''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Order Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('staff.order.index')}}" class="nav-link {{($route == "staff.order.index")?'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Order List</p>
                                </a>
                            </li>
                        </ul>
                    </li>
{{--    ====================== Customer =================================================--}}

                @elseif(Auth::id() == 3)
                    <li class="nav-item has-treeview {{($prefix == "order")?'menu-open':''}}">
                        <a href="#" class="nav-link {{($prefix == "order")?'active':''}}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Order Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('customer.cart.order.list')}}" class="nav-link {{($route == "customer.cart.order.list")?'active':''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Orders</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                @endif


                <li class="nav-item has-treeview {{($prefix == "profile")?'menu-open':''}}">
                    <a href="#" class="nav-link {{($prefix == "profile")?'active':''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Profile
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('profile.view')}}" class="nav-link {{($route == "profile.view")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('profile.newPassword')}}" class="nav-link {{($route == "profile.newPassword")?'active':''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p> Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
