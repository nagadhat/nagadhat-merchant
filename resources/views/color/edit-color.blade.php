<?php
// All the information of this color is already store in $colorDetails boject

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
                <!-- All form information -->
                <form action="/color/edit-color/{{$colorDetails["id"]}}/save" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-9">
                            <div class="card-box">
                                <h4 class="header-title">Edit Color</h4>
                                <p class="sub-header">
                                    Please add <code>Color Name</code> and <code>Color Code</code> for every color.
                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-2">
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Color Name <span class="text-color-red">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="colorName" id="simpleinput" class="form-control" value="{{$colorDetails["color_name"]}}" placeholder="Color Name..." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Color Code</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="colorCode" id="simpleinput" class="form-control" value="{{$colorDetails["color_code"]}}" placeholder="Color Code...">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-success btn-rounded width-md waves-effect waves-light float-right w-fit-content">Edit Color</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-3">

                                    </div>
                                </div>
                                <!-- end row -->

                            </div> <!-- end card-box -->
                        </div><!-- end col -->
                        <div class="col-3 d-none">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Others Configuration</h4>
                                            <div class="switchery-demo mb-2">
                                                <span class="mr-1">Active status</span>
                                                <input type="checkbox" id="switchery-active-status"/>
                                                <input type="hidden" name="activeStatus" value="0" id="active-status-input">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /All form information -->
                </form>

                <!-- content -->
            </div> 
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        <x-footer/>
    </div>
    <!-- END wrapper -->
    <!-- Footer Linked -->
<x-footer.footer-link/>
<script type="text/javascript">
    var switcheryFreeShipping = document.querySelector('#switchery-active-status');
    var switchry = new Switchery(switcheryFreeShipping, {size: 'small'});
    switcheryFreeShipping.onchange = function () {
        if (switcheryFreeShipping.checked) {
            $("#active-status-input").val(1);
        } else {
            $("#active-status-input").val(0);
        }
    };
</script>
</body>
</html>