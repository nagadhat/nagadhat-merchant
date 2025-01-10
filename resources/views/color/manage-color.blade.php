<?php

// Get all brands 
use App\Http\Controllers\productsVariationColor;

$colorController = new productsVariationColor();
$allColorDetailsList = $colorController->allColorList();
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
                        <div class="col-sm-12">
                            <span class="h3 p-2">All Brand</span>
                        </div>
                    </div>
                    <div class="row mt-2 mb-1">
                        <div class="col-md-6">
                            <a href="/color/add-color" type="button" class="btn btn-success waves-effect width-md waves-light mb-1"><i class="mdi mdi-plus-circle-outline"></i> Add New</a>
                        </div>
                    </div>
                    <div class="row ">
                        @foreach($allColorDetailsList as $color)
                        <div class="col-xl-3 col-md-6">
                            <div class="card-box widget-user p-1">
                                <div class="dropdown float-right">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-vertical"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- item-->
                                        <a href="/color/edit-color/{{$color["id"]}}" class="dropdown-item">Edit</a>
                                        <!-- item-->
                                        <button onclick="deleteVariationColor({{$color['id']}})" class="dropdown-item">Delete</button>
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item">View</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="avatar-lg mr-3">
                                        <div class="w-10" style="border: 1px solid;height:70px;background: {{$color["color_code"]}}">

                                        </div>
                                    </div>
                                    <div class="media-body overflow-hidden">
                                        <h5 class="mt-2 mb-1">{{$color["color_name"]}}</h5>
                                        <p class="text-muted mb-2 font-13 text-truncate"></p>
                                        <small class="text-warning" style="color:{{$color["color_code"]}} !important"><b>{{$color["color_code"]}}</b></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
<script>
    function deleteVariationColor(colorId){
        $.ajax({
            url: "/api/admin/color/delete",
            type: "post",
            data:{
                "_token":"{{csrf_token()}}",
                "colorId": colorId
            },
            success(response){
                if(response){
                    // Successfully delete
                    Swal.fire(
                        'Color Delete successfully',
                        'Add more product to get more sale.',
                        'success'
                        ).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result) {
                                window.location.replace("/color/manage-color");
                            }
                         });
                }
            }
        });
    }
</script>
</body>
</html>