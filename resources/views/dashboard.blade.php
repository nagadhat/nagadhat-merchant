@extends('index')
@section('head')
    {{-- marquee styling --}}
    <style>
        .ticker {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            height: 30px;
            margin-bottom: 4%;
        }

        .news {
            width: 76%;
            background: #ffffff;
            padding: 0 2%
        }

        .title {
            width: 20%;
            text-align: center;
            background: #c81c1c;
            position: relative;
        }

        .title h5 {
            font-size: 20px;
            margin: 8% 0;
        }

        .news marquee {
            font-size: 18px;
            margin-top: 0.8%;
        }

        .news-content {
            padding-top: 10px;
        }

        .news-content p {
            margin-right: 41px;
            display: inline;
            color: #c81c1c;
        }

    </style>
@endsection

@section('content')
    {{-- account completion message --}}
    @if ($userDetails->status == 0)
        <a href="{{ route('show_profile_page') }}">
            {{-- <div class="title">
                <h5 class="text-white">Important !</h5>
            </div>
            <div class="news">
                <marquee class="news-content">
                    <p>Complete your account setup to get verified and start selling. </p>
                    <p>Without providing your authentic information you can't add products. </p>
                    <p>Your account will be verified soon. </p>
                </marquee>
            </div> --}}

            <div>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);"
                        class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                    <strong><i class="fas fa-exclamation-triangle"></i> Important!</strong>
                    <marquee>
                        <p style="font-family: Impact; font-size: 18pt">Complete your account setup to get verified and
                            start selling. Without providing your authentic information you can't add products. </p>
                    </marquee>
                </div>
            </div>
        </a>
    @endif
    {{-- end account completion message --}}
    <div class="rounded bg-white p-3">
        <div class="progress mb-2">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
        </div>
        <div class="alert alert-info" role="alert">
            Your Profile is 75% complete. Please complete your profile !
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-xl-5 col-lg-6">

            <div class="row">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customers
                            </h5>
                            <h3 class="mt-3 mb-3">36,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>
                                    5.27%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Orders</h5>
                            <h3 class="mt-3 mb-3">5,543</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>
                                    1.08%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

            <div class="row ">
                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-currency-usd widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Revenue</h5>
                            <h3 class="mt-3 mb-3">$6,254</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i>
                                    7.00%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->

                <div class="col-lg-6">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-pulse widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Growth">Earning</h5>
                            <h3 class="mt-3 mb-3">+ 30.56%</h3>
                            <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i>
                                    4.87%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div> <!-- end row -->

        </div> <!-- end col -->

        <div class="col-xl-7 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <a href="" class="btn btn-sm btn-link float-end">Export
                        <i class="mdi mdi-download ms-1"></i>
                    </a>
                    <h4 class="header-title mt-2 mb-3">Top Selling Products</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Marco Lightweight Shirt</h5>
                                        <span class="text-muted font-13">25 March 2018</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$128.50</h5>
                                        <span class="text-muted font-13">Price</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">37</h5>
                                        <span class="text-muted font-13">Quantity</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$4,754.50</h5>
                                        <span class="text-muted font-13">Amount</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Half Sleeve Shirt</h5>
                                        <span class="text-muted font-13">17 March 2018</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$39.99</h5>
                                        <span class="text-muted font-13">Price</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">64</h5>
                                        <span class="text-muted font-13">Quantity</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$2,559.36</h5>
                                        <span class="text-muted font-13">Amount</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Lightweight Jacket</h5>
                                        <span class="text-muted font-13">12 March 2018</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$20.00</h5>
                                        <span class="text-muted font-13">Price</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">184</h5>
                                        <span class="text-muted font-13">Quantity</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$3,680.00</h5>
                                        <span class="text-muted font-13">Amount</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Marco Shoes</h5>
                                        <span class="text-muted font-13">05 March 2018</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$28.49</h5>
                                        <span class="text-muted font-13">Price</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">69</h5>
                                        <span class="text-muted font-13">Quantity</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">$1,965.81</h5>
                                        <span class="text-muted font-13">Amount</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection
