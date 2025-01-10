<?php

// all information of this order is already store in $orderDetails
use App\Http\Controllers\addresses; // Use for address
use App\Http\Controllers\orders_products; // Use for order product
$addressController = new addresses();
$orderFullAddress = $addressController->fullAddressByAssignId($orderDetails["delivery_address"]);
// Get product Information
$orderProductsController = new orders_products();
$orderProductsDetailslist = $orderProductsController->getProductsDetailsListByOrderId($orderDetails["id"]);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <x-header.header-link/>
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
                        <div class="col-md-12">
                            <div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Order summaries</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Order Code: </span> </td>
                                                            <td>#{{$orderDetails["order_code"].$orderDetails["id"].$orderDetails["rand_code"]}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Customer Name: </span> </td>
                                                            <td>{{$orderDetails["customer_name"]}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Customer Username: </span> </td>
                                                            <td>{{$orderDetails["username"]}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Email: </span> </td>
                                                            <td>{{$orderDetails["customer_email_1"]}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Delivery Address: </span> </td>
                                                            <td>{{$orderFullAddress["address_1"]." , ".$orderFullAddress["city"]}}<br>{{$orderFullAddress["contact_number"]}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Order Date:</span></td>
                                                            <td>{{(isset($orderDetails["order_time"]))?$orderDetails["order_time"]:"--"}} ({{"00"}} Hours) </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Order Status:</span></td>
                                                            <td><span class="text-color-red">{{(isset($orderDetails["order_status"]))?$orderDetails["order_status"]:"--"}} </span> <button type="button" class="ml-1 btn btn-xs btn-purple waves-effect waves-light">Change</button></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Total order amount:</span></td>
                                                            <td> &#2547; {{(isset($orderDetails["total_products_price"]))?$orderDetails["total_products_price"]:"--"}} ( +  &#2547; {{(isset($orderDetails["total_delivery_charge"]))?$orderDetails["total_delivery_charge"]:"--"}} Delivery Charge)</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Payment Status:</span></td>
                                                            <td> -- </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600"><span class="h5">Delivery Note:</span> </td>
                                                            <td>{{(isset($orderDetails["delivery_note"]) && !empty($orderDetails["delivery_note"]))?$orderDetails["delivery_note"]:"--"}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <b class="fs-15">Order Details</b>
                                </div>
                                <div class="card-body pb-0">
                                    <table class="table table-borderless table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th width="30%">Product</th>
                                                <th>Variation</th>
                                                <th>Quantity</th>
                                                <th>Delivery Partner</th>
                                                <th>Price</th>
                                                <th>Refund</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(sizeof($orderProductsDetailslist))
                                            @foreach($orderProductsDetailslist as $products)
                                            <tr>
                                                <td><img class="img-fit w-60px rounded" src="{{ $imageLoadingUrl }}{{(isset($products["thumbnail_1"]) && !empty($products["thumbnail_1"]))?$products["thumbnail_1"]:"media/avatar-demo.png"}}"></td>
                                                <td>
                                                    <a href="" target="_blank">{{(isset($products["product_name"]))?$products["product_name"]:"--"}}</a>
                                                </td>
                                                <td>
                                                    AliceBlue
                                                </td>
                                                <td>
                                                    {{(isset($products["product_quantity"]))?$products["product_quantity"]:"--"}}
                                                </td>
                                                <td>
                                                    <span class="text-color-red">{{(isset($products["delivery_partner"]))?$products["delivery_partner"]:"--"}} </span> <button type="button" class="ml-1 btn btn-xs btn-purple waves-effect waves-light">Change</button>
                                                </td>
                                                <td>
                                                    &#2547; {{(isset($products["product_unit_price"]) && isset($products["product_quantity"]))?$products["product_unit_price"]*$products["product_quantity"]:"--"}}
                                                </td>
                                                <td>
                                                    <b>7 days return policy</b>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <b class="fs-15">Order Ammount</b>
                                </div>
                                <div class="card-body pb-0">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td class="w-50 fw-600">Subtotal</td>
                                                <td class="text-right">
                                                    <span class="strong-600">&#2547; {{(isset($orderDetails["total_products_price"]))?$orderDetails["total_products_price"]:"--"}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600">Shipping</td>
                                                <td class="text-right">
                                                    <span class="text-italic">&#2547; {{(isset($orderDetails["total_delivery_charge"]))?$orderDetails["total_delivery_charge"]:"--"}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600">Coupon</td>
                                                <td class="text-right">
                                                    <span class="text-italic">- &#2547; 00</span>
                                                </td>
                                            </tr>
                                            <tr class="border-top">
                                                <td class="w-50 fw-600">TOTAL</td>
                                                <td class="text-right">
                                                    <strong><span>&#2547; {{(isset($orderDetails["total_delivery_charge"]) && isset($orderDetails["total_products_price"]))?$orderDetails["total_delivery_charge"] + $orderDetails["total_products_price"]:"--"}}</span></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
