<!-- ========== Left Sidebar Start ========== -->
<?php

// get All information using user session
use App\Http\Controllers\userDetails; // Use for get user information faster

$user = new userDetails();
$userDetails = $user->getVendorUserDetails(auth()->user()->userToVendor->id);
?>
<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!-- User box -->
        <div class="user-box text-center">
            <img @if($userDetails->logo)  src="{{ $imageLoadingUrl . $userDetails->logo }}" @else  src="{{ asset('images/avatar-icon-png-1.jpg') }}" @endif alt="user-img"
                title="Mat Helme" class="rounded-circle img-thumbnail avatar-md">
            <div class="dropdown">
                <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"
                    aria-expanded="false">{{ $userDetails['shop_name'] }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
            <p class="text-muted">{{ $userDetails['username'] }}</p>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                @if ($userDetails->status != 0)
                    <li class="menu-title">Products Details</li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-chart-donut-variant"></i>
                            <span> Product </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('create_product') }}">Add Product</a></li>
                            <li>
                                <a href="{{ route('manage_products') }}">
                                    <span>Manage Product </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li class=""><a href="{{ route('approve_product_view') }}">Approved</a>
                                    </li>
                                    <li class=""><a href="{{ route('pending_product_view') }}">Pending</a>
                                    </li>
                                    <li class=""><a href="{{ route('reject_product_view') }}">Reject</a>
                                    </li>
                                    <li class=""><a href="{{ route('manage_products') }}">All</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Flash Sale </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="charts-flot.html">Add Product</a></li>
                        <li><a href="charts-morris.html">Manage Product</a></li>
                        <li><a href="charts-chartist.html">Awaiting Approval</a></li>
                        <li><a href="charts-flot.html">Settings</a></li>
                        <li><a href="charts-chartjs.html">Trash</a></li>
                    </ul>
                </li> --}}


                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Categories </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/dashboard/categories/manage-categories">Manage Categories</a></li>
                        <li><a href="{{URL::to("/dashboard/categories/add-new")}}">Add Category</a></li>
                        <li><a href="charts-flot.html">Awaiting Approval</a></li>
                        <li><a href="charts-chartjs.html">Trash</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Brands </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/brand/manage-brand">Manage Brands</a></li>
                        <li><a href="/brand/add-brand">Add Brands</a></li>
                        <li><a href="/brand/awaiting-approval">Awaiting Approval</a></li>
                        <li><a href="/brand/trash">Trash</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Color </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/color/manage-color">Manage Color</a></li>
                        <li><a href="/color/add-color">Add Color</a></li>
                        <li><a href="/color/awaiting-approval">Awaiting Approval</a></li>
                        <li><a href="/color/trash">Trash</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Size </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/size/manage-size">Manage Size</a></li>
                        <li><a href="/size/add-size">Add Size</a></li>
                        <li><a href="/size/awaiting-approval">Awaiting Approval</a></li>
                        <li><a href="/size/trash">Trash</a></li>
                    </ul>
                </li> --}}

                <li class="menu-title">Orders Details</li>

                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Order </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{URL::to('/dashboard/new-orders')}}">New Orders</a></li>
                        <li><a href="charts-chartist.html">Pending Payment</a></li>
                        <li><a href="charts-chartist.html">Processing Orders</a></li>
                        <li><a href="charts-chartist.html">Shipped Orders</a></li>
                        <li><a href="charts-flot.html">Delivered Orders</a></li>
                        <li><a href="charts-chartjs.html">Cancel Orders</a></li>
                        <li><a href="/all-order">All Orders</a></li>
                    </ul>
                </li> --}}

                <li class="menu-title">Promotions and Offer</li>

                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Vouchers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="charts-morris.html">Add Vouchers</a></li>
                        <li><a href="charts-chartist.html">Manage Vouchers</a></li>
                        <li><a href="charts-chartist.html">Trash</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Sponsored Product </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="charts-morris.html">Add Product</a></li>
                        <li><a href="charts-chartist.html">Manage Product</a></li>
                        <li><a href="charts-flot.html">Awaiting Approval</a></li>
                        <li><a href="charts-chartist.html">Trash</a></li>
                    </ul>
                </li> --}}

                <li class="menu-title">Shop Manage</li>
                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Banner </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="charts-morris.html">Add Banner</a></li>
                        <li><a href="charts-chartist.html">Manage Banner</a></li>
                        <li><a href="charts-chartist.html">Trash</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Small Banner </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="charts-morris.html">Add Banner</a></li>
                        <li><a href="charts-chartist.html">Manage Banner</a></li>
                        <li><a href="charts-chartist.html">Trash</a></li>
                    </ul>
                </li> --}}

                <li class="menu-title">Customer Support</li>
                {{-- <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span>Customers</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="charts-morris.html">Manage Customer</a></li>
                    </ul>
                </li> --}}

                <li class="menu-title">Account and Settings</li>
                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-cog"></i>
                        <span> Settings </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('show_profile_page') }}"> Manage Profile </a></li>
                        <li><a href="javascript: void(0);"> Settings </a></li>
                    </ul>
                </li>

                <li class="">
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-chart-donut-variant"></i>
                        <span> Others </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="/bangla-font-issue">Bangla Font Issue</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
