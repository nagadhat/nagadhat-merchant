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
                <form action="/size/add-size/add" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-9">
                            <div class="card-box">
                                <h4 class="header-title">Add New Size</h4>
                                <p class="sub-header">
                                    Please add <code>Size Name</code> and <code>Size Code</code> for every size.
                                </p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-2">
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Size Name <span class="text-color-red">*</span></label>
                                                <div class="col-md-10">
                                                    <input type="text" name="sizeName" id="simpleinput" class="form-control" placeholder="Size Name..." required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Size Code</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="sizeCode" id="simpleinput" class="form-control" placeholder="Size Code...">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-success btn-rounded width-md waves-effect waves-light float-right w-fit-content">Add Color</button>
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