<?php
    // Get all order by pagination
    use App\Http\Controllers\orders; //Use for orders
    use App\Http\Controllers\addresses; // use for address
    $addressController = new addresses();
    $orderController = new orders;
    $allOrderByPagination = $orderController->getAllOrder(10);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <x-header.header-link/>
    <link rel="stylesheet" href="http://abpetkov.github.io/switchery/dist/switchery.min.css">
</head>
<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <x-header/>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <x-fragment.common-fragment.left-sidebar/>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->



        <div class="content-page pt-2">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-3">Daily Sales</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-right">
                                        <span class="badge badge-pink badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="font-weight-normal mb-1"> 158 </h2>
                                        <p class="text-muted mb-3">Revenue today</p>
                                    </div>
                                    <div class="progress progress-bar-alt-pink progress-sm">
                                        <div class="progress-bar bg-pink" role="progressbar"
                                             aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 77%;">
                                            <span class="sr-only">77% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-3">Sales Analytics</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-right">
                                        <span class="badge badge-success badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="font-weight-normal mb-1"> 8451 </h2>
                                        <p class="text-muted mb-3">Revenue today</p>
                                    </div>
                                    <div class="progress progress-bar-alt-success progress-sm">
                                        <div class="progress-bar bg-success" role="progressbar"
                                             aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 77%;">
                                            <span class="sr-only">77% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-3">Sales Analytics</h4>

                                <div class="widget-box-2">
                                    <div class="widget-detail-2 text-right">
                                        <span class="badge badge-primary badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="font-weight-normal mb-1"> 7540 </h2>
                                        <p class="text-muted mb-3">Revenue today</p>
                                    </div>
                                    <div class="progress progress-bar-alt-primary progress-sm">
                                        <div class="progress-bar progress-bar-primary" role="progressbar"
                                             aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 77%;">
                                            <span class="sr-only">77% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                        <div class="col-xl-3 col-md-6">
                            <div class="card-box">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                    </div>
                                </div>

                                <h4 class="header-title mt-0 mb-3">Daily Sales</h4>

                                <div class="widget-box-2 text-right">
                                    <div class="widget-detail-2">
                                        <span class="badge badge-dark badge-pill float-left mt-3">32% <i class="mdi mdi-trending-up"></i> </span>
                                        <h2 class="font-weight-normal mb-1"> 9841 </h2>
                                        <p class="text-muted mb-3">Revenue today</p>
                                    </div>
                                    <div class="progress progress-bar-alt-dark progress-sm">
                                        <div class="progress-bar bg-dark" role="progressbar"
                                             aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 77%;">
                                            <span class="sr-only">77% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2>All Orders</h2>
                        </div>
                    </div>
                    @foreach($allOrderByPagination as $order)
                    <?php
                        // Get all product of this order
                        $orderProductsList = $orderController->getOrderProductsById($order["id"]);
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box widget-user">
                                <div class="media">
                                    <span class="badge badge-danger badge-pill position-absolute left-1 top-1">1</span>
                                    <div class="avatar-lg mr-3 d-none">
                                        <img src="/storage/media/products/images/DZsXv6k55e23eNlQtV22FOtuamlbFFW4lVBPCEbE.webp" class="img-fluid" alt="user">
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <div class="col-sm-4 float-left">
                                            <h4 class="mt-0 mb-1">#{{$order["order_code"].$order["id"].$order["rand_code"]}}</h4>
                                            <p class="text-muted mb-2 font-13 text-truncate">
                                                <span type="button" class="btn btn-xs btn-purple p-0px-3px">{{$order["order_type"]}}</span>
                                                <br>
                                                <small class="mt-1 text-purple font-weight-bold">Total Price: &#2547; 100</small>
                                                <br>
                                                <small class="mt-1 text-purple font-weight-bold">Total Quantity: 10</small>
                                                <br>
                                                <small class="mt-1 text-purple font-weight-bold">Total Paid: &#2547; 80</small><br>
                                                <small class="mt-1 text-orange font-weight-bold">Total Due: &#2547; 20</small><br>
                                                <small class="mt-1 text-purple font-weight-bold">Payment Status: <span class="text-pink">Partial Paid</span></small>
                                            </p>
                                        </div>
                                        <div class="col-md-3 d-none d-md-block float-left">
                                            <h4 class="mt-0 mb-1">Product</h4>
                                            <p class="text-muted mb-2 font-13 text-truncate">
                                                @foreach($orderProductsList as $product)
                                                <small class="mt-1 text-purple font-weight-bold">{{$product["product_name"]}}</small>
                                                <br>
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="col-md-3 d-none d-md-block float-left">
                                            <h4 class="mt-0 mb-1">Customer</h4>
                                            <p class="text-muted mb-2 font-13 text-truncate">
                                                <small class="mt-1 text-purple font-weight-bold">Name: {{$order["customer_name"]}}</small>
                                                <br>
                                                <small class="mt-1 text-purple font-weight-bold">Phone number: {{$order["username"]}}</small>
                                                <br>
                                                <small class="mt-1 text-purple font-weight-bold">Email: {{$order["customer_email_1"]}}</small><br>
                                                <?php
                                                    $address = $addressController->fullAddressByAssignId($order["delivery_address"]);
                                                ?>
                                                <small class="mt-1 text-orange font-weight-bold">Delivery Address: {{($address != null) ? $address["address_1"]." , ".$address["city"] :""}}</small><br>
                                            </p>
                                        </div>
                                        <div class="col-sm-6 col-md-2 float-right">
                                            <h5 class="mt-0 mb-1">Action</h5>
                                            <p class="font-13">
                                                <a href="/order/details/{{$order["order_code"].$order["id"].$order["rand_code"]}}"><button class="btn btn-success waves-effect mb-1" ><i class="far fa-eye mr-1"></i><span>View Order</span></button></a>
                                                <button class="btn btn-purple waves-effect mb-1" ><i class="far fa-eye mr-1"></i><span>Waiting</span></button>
                                                <button class="btn btn-pink waves-effect mb-1" ><i class="far fa-eye mr-1"></i><span>Make Payment</span></button>
                                                <button class="btn btn-info waves-effect waves-light mb-1" data-toggle="modal" data-target=".crm-modal-center"><i class="far fa-eye mr-1"></i><span>CRM</span></button>
                                                <button class="btn btn-primary waves-effect waves-light mb-1" ><i class="far fa-eye mr-1"></i><span>Chat</span></button>
                                                <button class="btn btn-danger waves-effect mb-1" ><i class="far fa-eye mr-1"></i><span>Cancel</span></button>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    @endforeach
                    <!-- CRM modal -->
                    <div class="modal fade crm-modal-center" tabindex="-1" role="dialog" aria-labelledby="crmModalPopup" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="crmModalPopup">Center modal</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    <!-- CRM modal -->

                    <div class="col-md-12">
                        <div class=" m-0-auto float-none w-fit-content">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item pr-2px pl-2px ">
                                        <a class="page-link" href="/dashboard/manage-product?page=2" rel="prev" aria-label="previous »">‹
                                        </a>
                                    </li>
                                    <li class="page-item  pr-2px pl-2px" aria-current="page">
                                        <a href="?page=1" <span="" class="page-link">1</a>
                                    </li>
                                    <li class="page-item  pr-2px pl-2px" aria-current="page">
                                        <a href="?page=2" <span="" class="page-link">2</a>
                                    </li>
                                    <li class="page-item active pr-2px pl-2px" aria-current="page">
                                        <a href="?page=3" <span="" class="page-link">3</a>
                                    </li>
                                    <li class="page-item  pr-2px pl-2px" aria-current="page">
                                        <a href="?page=4" <span="" class="page-link">4</a>
                                    </li>
                                    <li class="page-item  pr-2px pl-2px" aria-current="page">
                                        <a href="?page=5" <span="" class="page-link">5</a>
                                    </li>
                                    <li class="page-item  pr-2px pl-2px" aria-current="page">
                                        <a href="?page=6" <span="" class="page-link">6</a>
                                    </li>
                                    <li class="page-item  pr-2px pl-2px" aria-current="page">
                                        <a href="?page=70" <span="" class="page-link">70</a>
                                    </li>
                                    <li class="page-item pr-2px pl-2px ">
                                        <a class="page-link" href="/dashboard/manage-product?page=4" rel="next" aria-label="Next »">›</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>


                </div> <!-- container-fluid -->
            </div> <!-- content -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        <x-footer/>
    </div>
    <!-- END wrapper -->
    <!-- Footer Linked -->
<x-footer.footer-link/>
</body>
</html>
