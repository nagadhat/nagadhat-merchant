<?php
// We have already received $productListDetails where all the product of this vendor is stored
use App\Models\ProductCategory;
// use App\Models\categorie;
use App\Models\Category;
use App\Models\Product;
$totalAllProducts = Product::where('vendor', auth()->user()->userToVendor->id)->get();
$totalApproveProducts = Product::where('vendor', auth()->user()->userToVendor->id)
    ->where('live_status', 1)
    ->get();
$totalPendingProducts = Product::where('vendor', auth()->user()->userToVendor->id)
    ->where('live_status', 0)
    ->get();
$totalRejectProducts = Product::where('vendor', auth()->user()->userToVendor->id)
    ->where('live_status', 2)
    ->get();
$totalProductSize = sizeof($totalAllProducts);

?>
@extends('index')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <!-- Start Row -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Total Upload</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#0DA156 "
                                    data-bgColor="#0da156" value="100" data-skin="tron" data-angleOffset="180"
                                    data-readOnly=true data-thickness=".15" />
                            </div>

                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1">
                                    {{ $totalProductSize ? $totalProductSize : '0' }}
                                </h2>
                                <p class="text-muted mb-1">Revenue today</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Total Approved</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#0da156 "
                                    data-bgColor="#F9B9B9"
                                    value="{{ $totalProductSize ? round((sizeof($totalApproveProducts) * 100) / sizeof($totalAllProducts)) : 0 }}"
                                    data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                            </div>

                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{ sizeof($totalApproveProducts) }} </h2>
                                <p class="text-muted mb-1">Revenue today</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Total Pending</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#0da156 "
                                    data-bgColor="#F9B9B9"
                                    value="{{ $totalProductSize ? round((count($totalPendingProducts) * 100) / count($totalAllProducts)) : 0 }}"
                                    data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                            </div>

                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{ sizeof($totalPendingProducts) }} </h2>
                                <p class="text-muted mb-1">Revenue today</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Total Rejected</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#0da156 "
                                    data-bgColor="#F9B9B9"
                                    value="{{ $totalProductSize ? round((count($totalRejectProducts) * 100) / count($totalAllProducts)) : 0 }}"
                                    data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                            </div>

                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> {{ sizeof($totalRejectProducts) }} </h2>
                                <p class="text-muted mb-1">Revenue today</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
            <!-- start row -->
            {{ csrf_field() }}
            <!-- csrf token for ajax operation -->
            <div class="row">
                <div class="col-xl-4">
                    <a href="{{ route('create_product') }}" type="button"
                        class="btn btn-success waves-effect width-md waves-light mb-1"><i
                            class="mdi mdi-plus-circle-outline"></i> Add New</a>
                </div>
                <div class="col-xl-8">
                    <div class="product-search-box float-right w-fit-content">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." id="find-product">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fe-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row" id="single-product-show">

                    </div>
                    <!-- Start Row -->
                    @foreach ($productListDetails as $productDetails)
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box widget-user">
                                    <div class="media">
                                        <div class="avatar-lg mr-3">
                                            <img src="{{ $imageLoadingUrl . $productDetails->thumbnail_1 }}"
                                                class="img-fluid" alt="user">
                                        </div>
                                        <div class="media-body overflow-hidden">
                                            <div class="col-sm-6 float-left">
                                                <h4 class="mt-0 mb-1">{{ $productDetails->title }}</h4>
                                                <p class="text-muted mb-2 font-13 text-truncate">
                                                    <?php
                                                    $categoriesByProduct = ProductCategory::where('product_id', $productDetails->id)->get(); // Get all product categories
                                                    ?>
                                                    @foreach ($categoriesByProduct as $categoriesOfProduct)
                                                        <?php $productCategoroy = Category::where('id', $categoriesOfProduct->category_id)
                                                            ->get()
                                                            ->first(); ?>
                                                        <span type="button"
                                                            class="btn btn-xs btn-purple p-0px-3px"><?php
                                                            if ($productCategoroy != null && $productCategoroy['title'] != null) {
                                                                echo $productCategoroy['title'];
                                                            }
                                                            ?></span>
                                                    @endforeach
                                                    <br>
                                                    <small class="mt-1 text-purple font-weight-bold">SKU:
                                                        {{ $productDetails->product_sku }}</small>
                                                    <br>
                                                    <small class="mt-1 text-orange font-weight-bold">Quantity:
                                                        {{ $productDetails->quantity }}</small>
                                                    <br>
                                                    <?php
                                                    $discountPrice = $productDetails->price;
                                                    if ($productDetails->discount_amount != null || $productDetails->discount_amount != 0) {
                                                        if ($productDetails->discount_type == 'percentage') {
                                                            $discountPrice = $discountPrice - ($discountPrice * $productDetails->discount_amount) / 100;
                                                        }
                                                    }
                                                    ?>
                                                    <small class="mt-1 text-orange font-weight-bold">Price: &#2547;
                                                        {{ $discountPrice }} <del class="text-gray font-11">&#2547;
                                                            {{ $productDetails->price }}</del></small><br>
                                                    <small class="mt-1 text-purple font-weight-bold">
                                                        Product Status:
                                                        @if ($productDetails->live_status == 1)
                                                            Approved
                                                        @elseif ($productDetails->live_status == 0)
                                                            Pending
                                                        @elseif ($productDetails->live_status == 2)
                                                            Rejected
                                                        @endif
                                                    </small>
                                                </p>
                                            </div>
                                            <div class="col-md-3 d-none d-md-block float-left"
                                                style="display: none !important">
                                                <h4 class="mt-0 mb-1">Vendor</h4>
                                                <p class="text-muted mb-2 font-13 text-truncate">
                                                    <small class="mt-1 text-purple font-weight-bold">ID:
                                                        {{ $productDetails->vendor }}</small>
                                                    <br>
                                                    <small class="mt-1 text-gray font-weight-bold">Name:
                                                        {{ $productDetails->shop_name }}</small>
                                                    <br>
                                                    <small class="mt-1 text-gray font-weight-bold">Contact:
                                                        01303214079</small>
                                                </p>
                                            </div>

                                            <div class="col-sm-6 col-md-3 float-right">
                                                <h5 class="mt-0 mb-1">Action</h5>

                                                <p class="text-muted font-13 mb-1">
                                                    <a class=""
                                                        href="{{ '/dashboard/edit-product/' . $productDetails->slug }}">
                                                        <button class="mt-1 btn btn-purple waves-effect"> <i
                                                                class="fas fa-edit mr-1"></i> <span>Edit</span> </button>
                                                    </a>
                                                    {{-- <button class="mt-1 btn btn-danger waves-effect"
                                                        onclick="deleteProduct({{ $productDetails->id }})"><i
                                                            class="fas fa-trash-alt mr-1"></i><span>Delete</span></button> --}}
                                                    <a href="{{ $publicURL . '/product/' . $productDetails->slug }}"
                                                        target="_blank"><button class="mt-1 btn btn-success waves-effect">
                                                            <i class="far fa-eye mr-1"></i> <span>Preview</span>
                                                        </button></a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                    @endforeach
                    <!-- End Row -->
                    <div class="col-md-12">
                        <div class=" m-0-auto float-none w-fit-content">
                            <nav>
                                <ul class="pagination">
                                    @if ($productListDetails->hasPages())
                                        <li
                                            class="page-item pr-2px pl-2px {{ $productListDetails->currentPage() == 1 ? 'd-none' : '' }}">
                                            <a class="page-link" href="{{ $productListDetails->previousPageUrl() }}"
                                                rel="prev" aria-label="previous »">‹
                                            </a>
                                        </li>
                                        <li class="page-item {{ $productListDetails->currentPage() == 1 ? 'active' : '' }} pr-2px pl-2px"
                                            aria-current="page">
                                            <a href="?page=1"> <span class="page-link">1</span></a>
                                        </li>
                                        @for ($i = 2; $i < $productListDetails->lastPage(); $i++)
                                            @if ($i <= $productListDetails->currentPage() + 3 && $i >= $productListDetails->currentPage() - 3)
                                                <li class="page-item {{ $productListDetails->currentPage() == $i ? 'active' : '' }} pr-2px pl-2px"
                                                    aria-current="page">
                                                    <a href="?page={{ $i }}"> <span
                                                            class="page-link">{{ $i }}</span></a>
                                                </li>
                                            @else
                                            @endif
                                        @endfor
                                        <li class="page-item {{ $productListDetails->currentPage() == $productListDetails->lastPage() ? 'active' : '' }} pr-2px pl-2px"
                                            aria-current="page">
                                            <a href="?page={{ $productListDetails->lastPage() }}"> <span
                                                    class="page-link">{{ $productListDetails->lastPage() }}</span></a>
                                        </li>
                                        <li
                                            class="page-item pr-2px pl-2px {{ $productListDetails->hasMorePages() ? '' : 'd-none' }}">
                                            <a class="page-link" href="{{ $productListDetails->nextPageUrl() }}"
                                                rel="next" aria-label="Next »">›</a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
@section('scripts')
    {{-- section for script codes --}}
    <script>
        function deleteProduct(id) {
            Swal.fire({
                type: 'warning',
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this after once delete.',
                showCloseButton: true,
                showCancelButton: true,
            }).then(function(result) {
                if (result.value) {
                    console.log(result);
                    // User Click confirm to delete a product
                    $.ajax({
                        url: ("/dashboard/product/delete/" + id),
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success(response) {
                            Swal.fire(
                                'Product Delete successfully',
                                'Add more product to get more sale.',
                                'success'
                            ).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result) {
                                    window.location.replace("/dashboard/manage-product");
                                }
                            })
                        }
                    });
                }
            });
        }
    </script>
    <script>
        $("#find-product").focus(function() {
            // When User typing
            $('#find-product').keyup(function() {
                var typeValue = $(this).val();
                //console.log(typeValue);
                if (typeValue !== "") {
                    $.ajax({
                        url: "/api/admin/search/get/" + typeValue,
                        type: "GET",
                        data: "",
                        success(response) {
                            if (Object.keys(response).length) { // At least one
                                // Make ready the search result
                                let productContent = "";
                                for (let i = 0; i < Object.keys(response).length; i++) {

                                    // Make ready the product for show
                                    productContent +=
                                        "<div class='col-sm-12'> <div class='card-box widget-user'> <div class='media'> <div class='avatar-lg mr-3'> <img src='<?php echo $imageLoadingUrl; ?>" +
                                        response[i]["thumbnail_1"] +
                                        "' class='img-fluid' alt='user'> </div> <div class='media-body overflow-hidden'> <div class='col-sm-6 float-left'> <h4 class='mt-0 mb-1'>" +
                                        response[i]["title"] +
                                        "</h4> <p class='text-muted mb-2 font-13 text-truncate'> ";
                                    // for category productContent += "<span type='button' class='btn btn-xs btn-purple p-0px-3px'>"+response[0]["title"]+"</span>"
                                    productContent +=
                                        "<br> <small class='mt-1 text-purple font-weight-bold'>SKU: " +
                                        response[i]["product_sku"] +
                                        "</small> <br> <small class='mt-1 text-orange font-weight-bold'>Quantity: " +
                                        response[i]["quantity"] +
                                        "</small> <br> <small class='mt-1 text-orange font-weight-bold'>Price: " +
                                        response[i]["price"] + " <del class='text-gray font-11'>" +
                                        response[i]["discount_amount"] + " " + response[i][
                                            "discount_type"
                                        ] +
                                        "</del></small> </p> </div> <div class='col-md-3 d-none d-md-block float-left'> <h4 class='mt-0 mb-1'>Vendor</h4> <p class='text-muted mb-2 font-13 text-truncate'> <small class='mt-1 text-purple font-weight-bold'>ID: " +
                                        response[i]["vendor"] +
                                        "</small> <br> <small class='mt-1 text-gray font-weight-bold'>Name: Demo Shop</small> <br> <small class='mt-1 text-gray font-weight-bold'>Contact: 01303214079</small> </p> </div> <div class='col-sm-6 col-md-3 float-right'> <h5 class='mt-0 mb-1'>Action</h5> <p class='text-muted font-13 text-truncate mb-1'> <a href='/dashboard/edit-product/" +
                                        response[i]["slug"] +
                                        "'><button class='btn btn-purple waves-effect'> <i class='fas fa-edit mr-1'></i> <span>Edit</span> </button> </a><button class='btn btn-danger waves-effect' onclick='deleteProduct(" +
                                        response[i]["id"] +
                                        ")'><i class='fas fa-trash-alt mr-1'></i><span>Delete</span></button> <button class='btn btn-success waves-effect'> <i class='far fa-eye mr-1'></i> <span>Preview</span> </button> </p> <p class='text-muted mb-2 font-13 text-truncate mt-1'> <button class='btn btn-primary waves-effect'> <i class='far fa-check-circle mr-1'></i> <span>Approve</span> </button> <button class='btn btn-secondary waves-effect'> <i class='far fa-eye mr-1'></i> <span>Hold</span> </button> <button class='btn btn-warning waves-effect'> <i class='far fa-eye mr-1'></i> <span>Star</span> </button> </p> </div> </div> </div> </div> </div>";
                                }
                                // Show search result
                                $("#single-product-show").html(productContent);
                            } else {
                                // Nothing found
                                $("#single-product-show").html(
                                    "<div class='col-sm-12'> <div class='card-box widget-user'> <h3 class='text-center'>No product found</h3> </div> </div>"
                                );
                            }
                        }
                    });
                } else {
                    // Nothing in search box
                    $("#single-product-show").html("");
                }
            });
        });
    </script>
@endsection
