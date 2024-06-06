@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">

                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'admin.dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @php
            $brand = (auth()->guard('admin')->user()->brand == 1);
            $category = (auth()->guard('admin')->user()->category == 1);
            $product = (auth()->guard('admin')->user()->product == 1);
            $slider = (auth()->guard('admin')->user()->slider == 1);
            $coupons = (auth()->guard('admin')->user()->coupons == 1);
            $shipping = (auth()->guard('admin')->user()->shipping == 1);
            $blog = (auth()->guard('admin')->user()->blog == 1);
            $setting = (auth()->guard('admin')->user()->setting == 1);
            $returnorder = (auth()->guard('admin')->user()->returnorder == 1);
            $review = (auth()->guard('admin')->user()->review == 1);
            $orders = (auth()->guard('admin')->user()->orders == 1);
            $stock = (auth()->guard('admin')->user()->stock == 1);
            $reports = (auth()->guard('admin')->user()->reports == 1);
            $alluser = (auth()->guard('admin')->user()->alluser == 1);
            $adminuserrole = (auth()->guard('admin')->user()->adminuserrole == 1);
            @endphp


            @if($brand == true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Brands</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.brand' ? 'active' : '' }}">
                        <a href="{{ route('all.brand') }}"><i class="ti-more"></i>All Brands</a>
                    </li>
                </ul>
            </li>
            @endif

            @if($category == true)
            <li class="treeview {{ $prefix == '/category' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'all.category' ? 'active' : '' }}">
                        <a href="{{ route('all.category') }}"><i class="ti-more"></i>All Category</a>
                    </li>
                    <li class="{{ $route == 'all.subcategory' ? 'active' : '' }}">
                        <a href="{{ route('all.subcategory') }}"><i class="ti-more"></i>All SubCategory</a>
                    </li>

                    <li class="{{ $route == 'all.subsubcategory' ? 'active' : '' }}"><a href="{{ route('all.subsubcategory') }}"><i class="ti-more"></i>All Sub->SubCategory</a>
                    </li>
                </ul>
            </li>
            @endif

            @if($product == true)
            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'add.product' ? 'active' : '' }}"><a href="{{ route('add.product') }}"><i class="ti-more"></i>Add Products</a></li>


                    <li class="{{ $route == 'manage.product' ? 'active' : '' }}"><a href="{{ route('manage.product') }}"><i class="ti-more"></i>Manage Products</a></li>
                </ul>
            </li>
            @endif

            @if($slider == true)
            <li class="treeview {{ $prefix == '/slider' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'manage.slider' ? 'active' : '' }}"><a href="{{ route('manage.slider') }}"><i class="ti-more"></i>Manage Slider</a></li>
                </ul>
            </li>
            @endif

            @if($coupons == true)
            <li class="treeview {{ $prefix == '/coupons' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Coupons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'manage-coupon' ? 'active' : '' }}"><a href="{{ route('manage-coupon') }}"><i class="ti-more"></i>Manage Coupon</a></li>
                </ul>
            </li>
            @endif

            @if($shipping == true)
            <li class="treeview {{ $prefix == '/shipping' ? 'active' : '' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shipping Area</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'manage-division' ? 'active' : '' }}"><a href="{{ route('manage-division') }}"><i class="ti-more"></i>Ship Division</a></li>

                    <li class="{{ $route == 'manage-district' ? 'active' : '' }}"><a href="{{ route('manage-district') }}"><i class="ti-more"></i>Ship District</a></li>

                    <li class="{{ $route == 'manage-state' ? 'active' : '' }}"><a href="{{ route('manage-state') }}"><i class="ti-more"></i>Ship State</a></li>
                </ul>
            </li>
            @endif

            @if($returnorder == true)
            <li class="treeview {{ ($prefix == '/return')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Return Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'return.request')? 'active':'' }}"><a href="{{ route('return.request') }}"><i class="ti-more"></i>Return Request</a></li>

                    <li class="{{ ($route == 'all.request')? 'active':'' }}"><a href="{{ route('all.request') }}"><i class="ti-more"></i>All Request</a></li>


                </ul>
            </li>
            @endif

            @if($adminuserrole == true)
            <li class="treeview {{ ($prefix == '/adminuserrole')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Admin User Role </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'all.admin.user')? 'active':'' }}"><a href="{{ route('all.admin.user') }}"><i class="ti-more"></i>All Admin User </a></li>


                </ul>
            </li>
            @endif



            <li class="header nav-small-cap">User Interface</li>

            @if($orders == true)
            <li class="treeview {{ ($prefix == '/orders')?'active':'' }}  ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Orders </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'pending-orders')? 'active':'' }}"><a href="{{ route('pending-orders') }}"><i class="ti-more"></i>Pending Orders</a></li>

                    <li class="{{ ($route == 'confirmed-orders')? 'active':'' }}"><a href="{{ route('confirmed-orders') }}"><i class="ti-more"></i>Confirmed Orders</a></li>

                    <li class="{{ ($route == 'processing-orders')? 'active':'' }}"><a href="{{ route('processing-orders') }}"><i class="ti-more"></i>Processing Orders</a></li>

                    <li class="{{ ($route == 'picked-orders')? 'active':'' }}"><a href="{{ route('picked-orders') }}"><i class="ti-more"></i> Picked Orders</a></li>

                    <li class="{{ ($route == 'shipped-orders')? 'active':'' }}"><a href="{{ route('shipped-orders') }}"><i class="ti-more"></i> Shipped Orders</a></li>

                    <li class="{{ ($route == 'delivered-orders')? 'active':'' }}"><a href="{{ route('delivered-orders') }}"><i class="ti-more"></i> Delivered Orders</a></li>

                    <li class="{{ ($route == 'cancel-orders')? 'active':'' }}"><a href="{{ route('cancel-orders') }}"><i class="ti-more"></i> Cancel Orders</a></li>
                </ul>
            </li>
            @endif


        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>