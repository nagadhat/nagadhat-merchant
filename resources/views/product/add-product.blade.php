@extends('index')
<?php
// All color is store in $allColor array
// All brand is store in $allBrand array
// All Categories is store in $allCategories array
// All size is store in $allSize array
?>
@section('head')
    {{-- head section for styling --}}
@endsection
@section('content')
    <form action="{{ route('create_product') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-9">
                        <div class="card">
                            <div class="card-body p-0">
                                <div id="progressbarwizard">
                                    <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-1">
                                        <li class="nav-item">
                                            <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <i class="mdi mdi-account-circle mr-1"></i>
                                                <span class="d-none d-sm-inline">Description</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#profile-tab-2" data-toggle="tab"
                                                class="nav-link rounded-0 pt-2 pb-2">
                                                <i class="mdi mdi-face-profile mr-1"></i>
                                                <span class="d-none d-sm-inline">Media</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#finish-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                <i class="mdi mdi-checkbox-marked-circle-outline mr-1"></i>
                                                <span class="d-none d-sm-inline">Finish</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content border-0 mb-0 p-2">
                                        <div id="bar" class="progress mb-3 mt-0" style="height: 7px;">
                                            <div
                                                class="bar progress-bar progress-bar-striped progress-bar-animated bg-success">
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="account-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <div class="card-box">
                                                                <div class="dropdown float-right">
                                                                    <a href="#"
                                                                        class="dropdown-toggle arrow-none card-drop"
                                                                        data-toggle="dropdown" aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </a>
                                                                    <div class="dropdown-menu dropdown-menu-right">
                                                                        <!-- item-->
                                                                        <a href="javascript:void(0);"
                                                                            class="dropdown-item">Action</a>
                                                                        <!-- item-->
                                                                        <a href="javascript:void(0);"
                                                                            class="dropdown-item">Another action</a>
                                                                        <!-- item-->
                                                                        <a href="javascript:void(0);"
                                                                            class="dropdown-item">Something else</a>
                                                                        <!-- item-->
                                                                        <a href="javascript:void(0);"
                                                                            class="dropdown-item">Separated link</a>
                                                                    </div>
                                                                </div>

                                                                <h2 class="mt-0 mb-3 text-center">Product Information
                                                                </h2>
                                                                <p class="text-center">
                                                                    Please input information correctly.<br>
                                                                    Note: All the (<span
                                                                        class="text-color-red">*</span>) field have
                                                                    to fill-up correctly, Either your product will
                                                                    not submit to store.
                                                                </p>

                                                                {{-- <div class="form-group">
                                                                    <label for="productName">Product Name <span
                                                                            class="text-color-red">*</span></label>
                                                                    <input type="text" name="product_name" required
                                                                        placeholder="e.g: Realme 5i Smartphone"
                                                                        class="form-control" id="productName">
                                                                </div> --}}
                                                                <div class="form-group">
                                                                    <label for="title">Product Name <span
                                                                            class="text-color-red">*</span></label>
                                                                    <input type="text" name="title" required
                                                                        placeholder="e.g: Realme 5i Smartphone"
                                                                        class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="productShortDescription">Short
                                                                        Description (Max: 250 words)
                                                                        <span class="text-color-red">*</span></label>
                                                                    <!-- Start bubble-editor-->
                                                                    <div id="bubble-editor" style="height: 100px;"
                                                                        onchange="bubbleEditorInput()">
                                                                    </div>
                                                                    <textarea name="short_description"
                                                                        class="d-none"
                                                                        id="bubble-editor-input"></textarea>
                                                                    <!-- end bubble-editor-->
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="productFullDescription">Full Description
                                                                        (Max: 1500 words)
                                                                        <span class="text-color-red">*</span></label>
                                                                    <!-- Start Snow-editor-->
                                                                    <div id="snow-editor-full" style="height: 300px;">
                                                                    </div>
                                                                    <textarea name="full_description"
                                                                        class="d-none"
                                                                        id="snow-editor-full-input"></textarea>
                                                                    <!-- end Snow-editor-->
                                                                </div>
                                                                <div class="form-group">
                                                                    <h5 class="mt-3">Categories<span
                                                                            class="text-color-red">*</span></h5>
                                                                    <select name="categories[]"
                                                                        class="select2 select2-multiple"
                                                                        multiple="multiple" multiple
                                                                        data-placeholder="Select at least one...">
                                                                        <optgroup label="All Categories">
                                                                            @if (isset($categories)) &&
                                                                                @foreach ($categories as $category)
                                                                                    <option
                                                                                        value="{{ $category->id }}">
                                                                                        {{ $category->title }}
                                                                                    </option>
                                                                                @endforeach
                                                                            @endif
                                                                        </optgroup>
                                                                    </select>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <h5>Manufacturer/Brand</h5>
                                                                        <select name="brand"
                                                                            class="form-control select2">
                                                                            <option value="0">Select</option>
                                                                            <optgroup label="All Brand">
                                                                                @if (isset($brands))
                                                                                    @foreach ($brands as $brand)
                                                                                        <option
                                                                                            value="{{ $brand->id }}">
                                                                                            {{ $brand->title }}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <h5>Model</h5>
                                                                        <input type="text" class="form-control"
                                                                            name="model">
                                                                        <span class="font-13 text-muted">e.g:
                                                                            Skl52F</span>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <h5>SKU <span class="text-color-red">*</span>
                                                                        </h5>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ Str::random(5) }}" name="sku">
                                                                        <span class="font-13 text-muted">This is a auto
                                                                            generated SKU</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <h5>Product Type</h5>
                                                                        <select name="product_type"
                                                                            class="form-control" id="productType"
                                                                            onchange="productTypeChange()">
                                                                            <option>Select</option>
                                                                            <option value="single" selected>Single
                                                                            </option>
                                                                            <option value="variation">Variation</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <h5>Price</h5>
                                                                        <div
                                                                            class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                                            <span
                                                                                class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                                                                <span
                                                                                    class="input-group-text bg-primary text-white">৳</span>
                                                                            </span>
                                                                            <input id="demo2" type="number" value="0"
                                                                                name="single_price"
                                                                                class="form-control">
                                                                        </div>
                                                                        <span class="font-13 text-muted">Write only
                                                                            amount. Don't use coma or other
                                                                            symbol</span>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <h5>Quantity</h5>
                                                                        <div
                                                                            class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                                            <input id="demo2" type="number" value="0"
                                                                                name="single_quantity"
                                                                                class="form-control">
                                                                        </div>
                                                                        <span class="font-13 text-muted">Write only
                                                                            amount. Don't use coma or other
                                                                            symbol</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row d-none" id="productVariation">
                                                                    <div class="col-md-12">
                                                                        <h3 class="text-center p-3">Variation</h3>
                                                                    </div>

                                                                    @for ($i = 0; $i < 10; $i++)
                                                                        <div class="col-md-12"
                                                                            id="add-product-quantity-block">
                                                                            <div class="row">
                                                                                <div class="col-md-3">
                                                                                    <h5>Product Size</h5>
                                                                                    <select class="form-control select2"
                                                                                        name="variation_{{ $i }}_size">
                                                                                        <option>Select</option>
                                                                                        <optgroup label="All Size">
                                                                                            @foreach ($sizes as $size)
                                                                                                <option
                                                                                                    value="{{ $size['id'] }}">
                                                                                                    {{ $size['size_name'] }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <h5>Product Color</h5>
                                                                                    <select class="form-control select2"
                                                                                        name="variation_{{ $i }}_color">
                                                                                        <option>Select</option>
                                                                                        <optgroup label="All Color">
                                                                                            @foreach ($colors as $color)
                                                                                                <option
                                                                                                    value="{{ $color['id'] }}">
                                                                                                    {{ $color['color_name'] }}
                                                                                                </option>
                                                                                            @endforeach
                                                                                        </optgroup>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <h5>Quantity</h5>
                                                                                    <input id="demo3" type="number"
                                                                                        value=""
                                                                                        name="variation_{{ $i }}_quantity"
                                                                                        class="form-control">
                                                                                    <span
                                                                                        class="font-13 text-muted">Write
                                                                                        only amount. Don't use coma or
                                                                                        other symbol</span>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <h5>Price</h5>
                                                                                    <div
                                                                                        class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                                                        <span
                                                                                            class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                                                                            <span
                                                                                                class="input-group-text bg-primary text-white">৳</span>
                                                                                        </span>
                                                                                        <input id="demo2" type="number"
                                                                                            value="0"
                                                                                            name="variation_{{ $i }}_price"
                                                                                            class="form-control">
                                                                                    </div>
                                                                                    <span
                                                                                        class="font-13 text-muted">Write
                                                                                        only amount. Don't use coma or
                                                                                        other symbol</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endfor
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h3 class="text-center p-3">Pricing</h3>
                                                                    </div>

                                                                    <div class="col-md-4">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>

                                        <div class="tab-pane" id="profile-tab-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h2 class="mt-0 mb-3 text-center">Product
                                                        Images</h2>
                                                    <p class="text-center">
                                                        Please lmages for better sale.<br>
                                                        Note: All the (<span class="text-color-red">*</span>) field
                                                        have to fill-up correctly, Either your product will not submit
                                                        to store.
                                                    </p>
                                                    <h5>Cover/Main Images *</h5>
                                                    <input type="file" class="dropify" name="cover_image">
                                                    <h5>Others Images</h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="file" class="dropify"
                                                                data-max-file-size="1M" name="images_1">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="file" class="dropify"
                                                                data-max-file-size="1M" name="images_2">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="file" class="dropify"
                                                                data-max-file-size="1M" name="images_3">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-4">
                                                            <input type="file" class="dropify"
                                                                data-max-file-size="1M" name="images_4">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="file" class="dropify"
                                                                data-max-file-size="1M" name="images_5">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="file" class="dropify"
                                                                data-max-file-size="1M" name="images_6">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3 mb-3">
                                                        <div class="col-md-4">
                                                            <input type="file" class="dropify"
                                                                data-max-file-size="1M" name="images_7">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="file" class="dropify"
                                                                data-max-file-size="1M" name="images_8">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="file" class="dropify"
                                                                data-max-file-size="1M" name="images_9">
                                                        </div>
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>

                                        <div class="tab-pane" id="finish-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3 class="text-center">You don't need to do anything here.</h3>
                                                    <h4 class="text-center">Click Add Product button to save the
                                                        product</h4>
                                                    <div class="">
                                                        <input type="submit"
                                                            class="btn btn-success btn-rounded width-md waves-effect waves-light d-block m-0-auto"
                                                            value="Add Product">
                                                    </div>
                                                </div> <!-- end col -->
                                            </div> <!-- end row -->
                                        </div>

                                        <ul class="list-inline mb-0 wizard">
                                            <li class="previous list-inline-item">
                                                <a href="javascript: void(0);" class="btn btn-secondary">Previous</a>
                                            </li>
                                            <li class="next list-inline-item float-right">
                                                <a href="javascript: void(0);" class="btn btn-secondary">Next</a>
                                            </li>
                                        </ul>

                                    </div> <!-- tab-content -->
                                </div> <!-- end #progressbarwizard-->

                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col -->
                    <div class="col-md-3">
                        <!-- Shipping Configuration -->
                        <div class="row d-none">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Shipping Configuration</h4>
                                        <div class="switchery-demo mb-2">
                                            <span class="mr-1">Free Shipping</span>
                                            <input type="checkbox" id="switchery-freeShipping" />
                                            <input type="hidden" name="freeShipping" value="0" id="freeShippingInput">
                                        </div>
                                        <div class="form-group mb-2">
                                            <span class="mr-1">Or Flat Rate</span>
                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                <span
                                                    class="input-group-addon bootstrap-touchspin-prefix input-group-prepend">
                                                    <span class="input-group-text bg-primary text-white">৳</span>
                                                </span>
                                                <input id="demo2" type="number" value="60" name="flatDeliveryCrg"
                                                    class=" form-control">
                                            </div>
                                        </div>
                                        <div class="switchery-demo mb-2">
                                            <span class="mr-1">Cash on Delivery</span>
                                            <input type="checkbox" id="switchery-cod" />
                                            <input type="hidden" name="cashOnDelivery" value="0" id="codInput">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Shipping Configuration -->
                        <!-- Product Video -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Product Video</h4>
                                        <span>Video Platform</span>
                                        <select class="custom-select mt-1" name="videoPlatForm">
                                            <option value="notSelect" selected>Select Video Platform</option>
                                            <option value="Youtube">Youtube</option>
                                        </select>
                                        <div class="form-group mt-1">
                                            <span>Video Link</span>
                                            <input type="text" class="form-control mt-1" id="product-video"
                                                placeholder="Enter video link" name="videoLink">
                                            <small class="form-text text-muted">Please don't use any short link
                                                here</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Product Video -->
                        <!-- Offer and discount -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Offer and Discount</h4>
                                        <span>Discount Type</span>
                                        <select class="custom-select mt-1" name="discountType">
                                            <option selected value="notSelect">Select a option</option>
                                            <option value="percentage">Percentage</option>
                                            <option value="flat">Flat</option>
                                        </select>
                                        <div class="form-group mt-1">
                                            <span>Discount Number</span>
                                            <input type="number" class="form-control mt-1" id="discount"
                                                placeholder="Discount number" name="discountAmount" value="0">
                                            <small class="form-text text-muted">Percentage will automatically convert
                                                in number(TK).</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end Offer and discount -->
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script type="text/javascript">
        var switcheryFreeShipping = document.querySelector('#switchery-freeShipping');
        var switchry = new Switchery(switcheryFreeShipping, {
            size: 'small'
        });
        switcheryFreeShipping.onchange = function() {
            if (switcheryFreeShipping.checked) {
                $("#freeShippingInput").val(1);
            } else {
                $("#freeShippingInput").val(0);
            }
        };
        var switcheryCod = document.querySelector('#switchery-cod');
        var switchry = new Switchery(switcheryCod, {
            size: 'small'
        });
        switcheryCod.onchange = function() {
            if (switcheryCod.checked) {
                $("#codInput").val(1);
            } else {
                $("#codInput").val(0);
            }
        };
    </script>
@endsection
