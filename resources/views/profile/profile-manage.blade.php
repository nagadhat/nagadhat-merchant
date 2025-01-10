@extends('index')
@section('head')
    @php
    use App\Models\address_assign;
    // head office
    if ($userDetails->head_office_address) {
        $headOffice = address_assign::find($userDetails->head_office_address)->addressAndAssign;
    }
    // warehouse 1
    if ($userDetails->warehouse_address_1) {
        $warehouse1 = address_assign::find($userDetails->warehouse_address_1)->addressAndAssign;
    }
    // warehouse 2
    if ($userDetails->warehouse_address_2) {
        $warehouse2 = address_assign::find($userDetails->warehouse_address_2)->addressAndAssign;
    }
    // warehouse 3
    if ($userDetails->warehouse_address_3) {
        $warehouse3 = address_assign::find($userDetails->warehouse_address_3)->addressAndAssign;
    }
    // warehouse 4
    if ($userDetails->warehouse_address_4) {
        $warehouse4 = address_assign::find($userDetails->warehouse_address_4)->addressAndAssign;
    }
    // warehouse 5
    if ($userDetails->warehouse_address_5) {
        $warehouse5 = address_assign::find($userDetails->warehouse_address_5)->addressAndAssign;
    }
    // return 1
    if ($userDetails->return_address_1) {
        $returnaddress1 = address_assign::find($userDetails->return_address_1)->addressAndAssign;
    }
    // return 2
    if ($userDetails->return_address_2) {
        $returnaddress2 = address_assign::find($userDetails->return_address_2)->addressAndAssign;
    }
    @endphp
@endsection

@section('content')
    <div class=" p-2 rounded">
        <h2 class="card-title">PROFILE</h2>
        @if ($userDetails->status == 0)
            <p><i class="fas fa-star-of-life text-danger"></i> Required Fields</p>
        @endif
        {{-- <div class="progress m-3">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"
                aria-valuemin="0" aria-valuemax="100" style="width: 50%"></div>
        </div> --}}

        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                        aria-controls="pills-home" aria-selected="true">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-shop-tab" data-toggle="pill" href="#pills-shop" role="tab"
                        aria-controls="pills-shop" aria-selected="false">My Shop</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="pills-kyc-tab" data-toggle="pill" href="#pills-kyc" role="tab"
                        aria-controls="pills-kyc" aria-selected="false">Update KYC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-bank-tab" data-toggle="pill" href="#pills-bank" role="tab"
                        aria-controls="pills-bank" aria-selected="false">Bank Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                        aria-controls="pills-profile" aria-selected="false">Business Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-address-tab" data-toggle="pill" href="#pills-address" role="tab"
                        aria-controls="pills-address" aria-selected="false">Business Address</a>
                </li>

            </ul>
            <div class="tab-content bg-white" id="pills-tabContent">
                {{-- general info --}}
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <strong class="form-control mb-2 text-success">Seller Account</strong>
                    <form method="post" action="{{ route('update_general') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="row form-group">
                            <label class="col-md-4" for="validationCustom01">Seller ID:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="validationCustom01"
                                    value="{{ $userDetails->id }}" readonly>
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4" for="validationCustom02">Owner's Name:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="validationCustom02"
                                    value="{{ $userDetails->owner_name }}" name="owner_name" required>
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4" for="validationCustom04">Phone Number:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="validationCustom04"
                                    value="{{ $userDetails->username }}" readonly>
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4" for="validationCustom03">Email Address:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="validationCustom03"
                                    value="{{ $userDetails->vendorToUser->email }}" name="email" required>
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <strong class="form-control mb-2 text-success">Responsible Person</strong>
                        <div class="row form-group">
                            <label class="col-md-4">Responsible Person's Full Name: @if (!$userDetails->responsible_person_full_name)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                    value="{{ $userDetails->responsible_person_full_name }}"
                                    name="responsible_person_full_name" required>
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4">Responsible Person's Phone Number:
                                @if (!$userDetails->responsible_person_phone)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="responsible_person_phone"
                                    value="{{ $userDetails->responsible_person_phone }}" required>
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4">Responsible Person's Email: @if (!$userDetails->responsible_person_email)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                    value="{{ $userDetails->responsible_person_email }}" name="responsible_person_email"
                                    required>
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>


                        {{-- <div class="row form-group">
                            <label class="col-md-4" for="validationCustom04">State:</label>
                            <div class="col-md-8">
                                <select class="custom-select" id="validationCustom04" required>
                                    <option selected disabled value="">Choose...</option>
                                    <option>...</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div> --}}
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>


                {{-- business info --}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    {{-- <h4>Bank Info</h4> --}}
                    <form method="post" action="{{ route('update_business') }}" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        <div class="row form-group">
                            <label class="col-md-4">Business Type: </label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="shop_type"
                                    value="{{ $userDetails->shop_type }}" readonly>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4">Business Product Type: </label>
                            <div class="col-md-8">
                                <select class="custom-select" name="business_product_type">
                                    <option selected disabled value="">Choose...</option>
                                    @foreach ($allCategories as $cat)
                                        <option @if ($cat->title == $userDetails->business_product_type) selected @endif value="{{ $cat->title }}">{{ $cat->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4">Business Registration Number: </label>
                            <div class="col-md-8">
                                <input type="number" class="form-control"
                                    value="{{ $userDetails->business_reg_number }}" name="business_reg_number"
                                    placeholder="Enter Registration Number">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4">Business TIN:</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" value="{{ $userDetails->business_tin }}"
                                    name="business_tin" placeholder="Enter TIN (Taxpayer Identification Number)">
                            </div>
                        </div>


                        <div class="tab-pane pb-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Upload Visiting Card Copy: </label>
                                    <input type="file" class="dropify" data-max-file-size="1M"
                                        name="business_visiting_card"
                                        {{ $userDetails->business_visiting_card ? "data-default-file=$imageLoadingUrl" . $userDetails->business_visiting_card : '' }}>
                                </div>
                            </div>
                        </div>


                        @if ($userDetails->business_document)
                            {{-- <iframe src="{{ $imageLoadingUrl. $userDetails->business_document }}#toolbar=0"
                                width="100%" height="500px"></iframe> --}}
                            <label>Business Document Copy:</label>
                            <p>Your web browser doesn't have a PDF plugin.
                                Instead you can <a href="{{ $imageLoadingUrl . $userDetails->business_document }}">click
                                    here to
                                    download the PDF file. </a></p>
                        @endif
                        <label>Upload Business Document:(pdf/doc)</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile02" name="business_document"
                                    data-max-file-size="1M" aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                            </div>
                        </div>





                        <button class="btn btn-primary" type="submit">Update Info</button>
                    </form>
                </div>

                {{-- business address --}}
                <div class="tab-pane fade" id="pills-address" role="tabpanel" aria-labelledby="pills-address-tab">
                    <form method="post" action="{{ route('update_business_address') }}"
                        enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-group">
                            <h3>Office Address:</h3>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Address</label>
                                    <input type="text" @if($userDetails->head_office_address) value="{{ $headOffice->address_1 }}" @endif class="form-control" name="office_address"
                                        placeholder="Enter House#, Road#, Sector#, etc">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control" @if($userDetails->head_office_address) value="{{ $headOffice->city }}" @endif name="office_city" placeholder="Enter City">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Post Code</label>
                                    <input type="text" class="form-control" @if($userDetails->head_office_address) value="{{ $headOffice->postal_code }}" @endif name="office_zip"
                                        placeholder="Enter Post Code">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <h3>Warehouse Address:</h3>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Address 1</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_1) value="{{ $warehouse1->address_1 }}" @endif name="warehouse_1_address"
                                        placeholder="Enter House#, Road#, Sector#, etc">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_1) value="{{ $warehouse1->city }}" @endif name="warehouse_1_city"
                                        placeholder="Enter City">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Post Code</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_1) value="{{ $warehouse1->postal_code }}" @endif name="warehouse_1_zip"
                                        placeholder="Enter Post Code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Address 2</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_2) value="{{ $warehouse2->address_1 }}" @endif name="warehouse_2_address"
                                        placeholder="Enter House#, Road#, Sector#, etc">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control"  @if($userDetails->warehouse_address_2) value="{{ $warehouse2->city }}" @endif name="warehouse_2_city"
                                        placeholder="Enter City">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Post Code</label>
                                    <input type="text" class="form-control"  @if($userDetails->warehouse_address_2) value="{{ $warehouse2->postal_code }}" @endif name="warehouse_2_zip"
                                        placeholder="Enter Post Code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Address 3</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_3) value="{{ $warehouse3->address_3 }}" @endif name="warehouse_3_address"
                                        placeholder="Enter House#, Road#, Sector#, etc">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_3) value="{{ $warehouse3->city }}" @endif name="warehouse_3_city"
                                        placeholder="Enter City">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Post Code</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_3) value="{{ $warehouse3->postal_code }}" @endif name="warehouse_3_zip"
                                        placeholder="Enter Post Code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Address 4</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_4) value="{{ $warehouse4->address_4 }}" @endif name="warehouse_4_address"
                                        placeholder="Enter House#, Road#, Sector#, etc">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_4) value="{{ $warehouse4->city }}" @endif name="warehouse_4_city"
                                        placeholder="Enter City">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Post Code</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_4) value="{{ $warehouse4->postal_code }}" @endif name="warehouse_4_zip"
                                        placeholder="Enter Post Code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Address 5</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_5) value="{{ $warehouse5->address_5 }}" @endif name="warehouse_5_address"
                                        placeholder="Enter House#, Road#, Sector#, etc">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_5) value="{{ $warehouse5->city }}" @endif name="warehouse_5_city"
                                        placeholder="Enter City">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Post Code</label>
                                    <input type="text" class="form-control" @if($userDetails->warehouse_address_5) value="{{ $warehouse5->postal_code }}" @endif name="warehouse_5_zip"
                                        placeholder="Enter Post Code">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <h3>Return Address:</h3>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Address 1</label>
                                    <input type="text" class="form-control" @if($userDetails->return_address_1) value="{{ $returnaddress1->address_1 }}" @endif name="return_address_1"
                                        placeholder="Enter House#, Road#, Sector#, etc">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control" @if($userDetails->return_address_1) value="{{ $returnaddress1->city }}" @endif name="return_city_1"
                                        placeholder="Enter City">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Post Code</label>
                                    <input type="text" class="form-control" @if($userDetails->return_address_1) value="{{ $returnaddress1->postal_code }}" @endif name="return_zip_1"
                                        placeholder="Enter Post Code">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom03">Address 2</label>
                                    <input type="text" class="form-control" @if($userDetails->return_address_2) value="{{ $returnaddress2->address_1 }}" @endif name="return_address_2"
                                        placeholder="Enter House#, Road#, Sector#, etc">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">City</label>
                                    <input type="text" class="form-control" @if($userDetails->return_address_2) value="{{ $returnaddress2->city }}" @endif name="return_city_2"
                                        placeholder="Enter City">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Post Code</label>
                                    <input type="text" class="form-control" @if($userDetails->return_address_2) value="{{ $returnaddress2->postal_code }}" @endif name="return_zip_2"
                                        placeholder="Enter Post Code">
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Update Address</button>
                    </form>
                </div>

                {{-- kyc --}}
                <div class="tab-pane fade" id="pills-kyc" role="tabpanel" aria-labelledby="pills-kyc-tab">
                    {{-- <h4>KYC</h4> --}}
                    <form method="post" action="{{ route('update_kyc') }}" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        <div class="row form-group">
                            <label class="col-md-4">NID No: @if (!$userDetails->responsible_person_nid)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                            <div class="col-md-8">
                                <input type="number" name="responsible_person_nid"
                                    value="{{ $userDetails->responsible_person_nid }}" @if ($userDetails->responsible_person_nid) readonly @endif
                                    class="form-control" required placeholder="Enter NID Number">
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane pb-4">
                            <div class="row">
                                <div class="col-6">
                                    <label>NID front: @if (!$userDetails->responsible_person_nid_front)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                                    <input type="file" class="dropify" data-max-file-size="1M"
                                        name="responsible_person_nid_front"
                                        {{ $userDetails->responsible_person_nid_front ? "disabled data-default-file=$imageLoadingUrl" . $userDetails->responsible_person_nid_front : '' }}>
                                </div>
                                <div class="col-6">
                                    <label>NID back: @if (!$userDetails->responsible_person_nid_front)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                                    <input type="file" class="dropify" data-max-file-size="1M"
                                        name="responsible_person_nid_back"
                                        {{ $userDetails->responsible_person_nid_back ? "disabled data-default-file=$imageLoadingUrl" . $userDetails->responsible_person_nid_back : '' }}>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4">Trade License No: @if (!$userDetails->trade_license)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control" name="trade_license"
                                    value="{{ $userDetails->trade_license }}" @if ($userDetails->trade_license) readonly @endif required
                                    placeholder="Enter Trade Licence Number">
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>





                        {{-- display pdf file --}}
                        @if ($userDetails->shop_type == 'Business')
                            @if ($userDetails->trade_license_file)
                                <label>Trade License Copy:</label>
                                <p>Your web browser doesn't have a PDF plugin.
                                    Instead you can <a
                                        href="{{ $imageLoadingUrl . $userDetails->trade_license_file }}">click
                                        here to
                                        download the PDF file. </a></p>
                            @else
                                <label>Upload Trade License:(pdf/doc) @if (!$userDetails->trade_license_file)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01"
                                            name="trade_license_file" data-max-file-size="1M"
                                            aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                            @endif
                        @endif

                        {{-- <div class="row form-group">
                            <label class="col-md-4" for="validationCustom07">Shop Based On:</label>
                            <div class="col-md-8">
                                <select class="custom-select" id="validationCustom07" required>
                                    <option disabled>Select Location</option>
                                    <option @if ($userDetails->location == 'Barisal') selected @endif value="Barisal">Barisal</option>
                                    <option @if ($userDetails->location == 'Chittagong') selected @endif value="Chittagong">Chittagong</option>
                                    <option @if ($userDetails->location == 'Dhaka') selected @endif value="Dhaka">Dhaka</option>
                                    <option @if ($userDetails->location == 'Khulna') selected @endif value="Khulna">Khulna</option>
                                    <option @if ($userDetails->location == 'Mymensingh') selected @endif value="Mymensingh">Mymensingh</option>
                                    <option @if ($userDetails->location == 'Rajshahi') selected @endif value="Rajshahi">Rajshahi</option>
                                    <option @if ($userDetails->location == 'Rangpur') selected @endif value="Rangpur">Rangpur</option>
                                    <option @if ($userDetails->location == 'Sylhet') selected @endif value="Sylhet">Sylhet</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div> --}}


                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>

                {{-- shop info --}}
                <div class="tab-pane fade" id="pills-shop" role="tabpanel" aria-labelledby="pills-shop-tab">
                    {{-- <h4>Shop Info</h4> --}}
                    <form method="post" action="{{ route('update_shop') }}" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        <div class="row form-group">
                            <label class="col-md-4" for="validationCustom05">Shop ID:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="validationCustom05"
                                    value="{{ $userDetails->slug }}" readonly>
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4" for="validationCustom06">Shop Name:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="validationCustom06"
                                    value="{{ $userDetails->shop_name }}" name="shop_name" required>
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>



                        <div class="row form-group">
                            <label class="col-md-4" for="validationCustom07">Shop Based On:</label>
                            <div class="col-md-8">
                                <select class="custom-select" id="validationCustom07" name="location" required>
                                    <option disabled>Select Location</option>
                                    <option @if ($userDetails->location == 'Barisal') selected @endif value="Barisal">Barisal</option>
                                    <option @if ($userDetails->location == 'Chittagong') selected @endif value="Chittagong">Chittagong</option>
                                    <option @if ($userDetails->location == 'Dhaka') selected @endif value="Dhaka">Dhaka</option>
                                    <option @if ($userDetails->location == 'Khulna') selected @endif value="Khulna">Khulna</option>
                                    <option @if ($userDetails->location == 'Mymensingh') selected @endif value="Mymensingh">Mymensingh</option>
                                    <option @if ($userDetails->location == 'Rajshahi') selected @endif value="Rajshahi">Rajshahi</option>
                                    <option @if ($userDetails->location == 'Rangpur') selected @endif value="Rangpur">Rangpur</option>
                                    <option @if ($userDetails->location == 'Sylhet') selected @endif value="Sylhet">Sylhet</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid state.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane pb-4">
                            <div class="row">
                                <div class="col-md-2">
                                    <label>Shop logo:</label>
                                    <input type="file" class="dropify" data-max-file-size="1M" name="logo"
                                        {{ $userDetails->logo ? "data-default-file=$imageLoadingUrl" . $userDetails->logo : '' }}>
                                </div>
                                <div class="col-md-10">
                                    <label>Shop Banner:</label>
                                    <input type="file" class="dropify" data-max-file-size="1M" name="banner"
                                        {{ $userDetails->banner ? "data-default-file=$imageLoadingUrl" . $userDetails->banner : '' }}>
                                </div>
                            </div>
                        </div>



                        {{-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div> --}}
                        <button class="btn btn-primary" type="submit">Update Shop</button>
                    </form>
                </div>

                {{-- bank info --}}
                <div class="tab-pane fade" id="pills-bank" role="tabpanel" aria-labelledby="pills-bank-tab">
                    {{-- <h4>Bank Info</h4> --}}
                    <form method="post" action="{{ route('update_bank') }}" enctype="multipart/form-data"
                        class="needs-validation" novalidate>
                        @csrf
                        <div class="row form-group">
                            <label class="col-md-4">Account Holder Name: @if (!$userDetails->bank_account_name)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="bank_account_name"
                                    value="{{ $userDetails->bank_account_name }}" required
                                    placeholder="Enter Account Holder Name">
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4">Account Number: @if (!$userDetails->bank_account_number)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control"
                                    value="{{ $userDetails->bank_account_number }}" name="bank_account_number" required
                                    placeholder="Enter Account Number">
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4">Branch Name: @if (!$userDetails->bank_account_branch)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control"
                                    value="{{ $userDetails->bank_account_branch }}" name="bank_account_branch" required
                                    placeholder="Enter Brunch Name">
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="col-md-4">Routing Number:</label>
                            <div class="col-md-8">
                                <input type="number" class="form-control"
                                    value="{{ $userDetails->bank_account_routing }}" name="bank_account_routing"
                                    placeholder="Enter Rounting Number">
                                <div class="invalid-feedback">
                                    Invalid info.
                                </div>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane pb-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Upload cheque Copy: @if (!$userDetails->bank_check)<i class="fas fa-star-of-life text-danger"></i>@endif</label>
                                    <input type="file" class="dropify" data-max-file-size="1M" name="bank_check"
                                        {{ $userDetails->bank_check ? "data-default-file=$imageLoadingUrl" . $userDetails->bank_check : '' }}>
                                </div>
                            </div>
                        </div>



                        {{-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                                <label class="form-check-label" for="invalidCheck">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div> --}}
                        <button class="btn btn-primary" type="submit">Update Shop</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="p-5">

        </div>
    </div>

    <div class="container">

    </div>




@endsection

@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    {{-- function to stay on same tab after form submition --}}
    <script>
        $(document).ready(function() {
            $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#pills-tab a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>


@endsection
