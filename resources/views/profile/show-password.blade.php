<!DOCTYPE html>
<html lang="en">

<head>
    <x-header.header-link />
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <x-header />
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <x-fragment.common-fragment.left-sidebar />
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page pt-2">
            <div class="content">
                <x-simple-alert />
                <!-- Start Content-->
                <!-- All form information -->
                <form action="{{ route('update_password') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mb-3 text-center">Update Password</h2>
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-2">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="" class="form-label">
                                                            Current Password
                                                            <span class="text-color-red">*</span>
                                                        </label>
                                                        <input type="password" name="current_password" id="id_password"
                                                            class="form-control" required>
                                                        <i class="fas fa-eye float-right position-relative mt-n3 mr-2"
                                                            id="togglePassword" style="cursor: pointer;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="" class="form-label">
                                                            New Password
                                                            <span class="text-color-red">*</span>
                                                        </label>
                                                        <input type="password" name="new_password" id="nPassword"
                                                            class="form-control" required>
                                                        <i class="fas fa-eye float-right position-relative mt-n3 mr-2"
                                                            id="sPassword" style="cursor: pointer;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="" class="form-label">
                                                            Re-enter Password
                                                            <span class="text-color-red">*</span>
                                                        </label>
                                                        <input type="password" name="new_password_confirmation"
                                                            id="cPassword_2" class="form-control" required>
                                                        <i class="fas fa-eye float-right position-relative mt-n3 mr-2"
                                                            id="cPassword" style="cursor: pointer;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success rounded-pill">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div> <!-- end card-box -->
                        </div><!-- end col -->
                    </div>
                    <!-- /All form information -->
                </form>

                <!-- content -->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        <x-footer />
    </div>
    <!-- END wrapper -->
    <!-- Footer Linked -->
    <x-footer.footer-link />

    {{-- <script>
        $(function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#id_password');

            togglePassword.addEventListener('click', function(e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fas fa-eye-slash');
            });
        })
    </script>
    <script>
        $(function() {
            const togglePassword = document.querySelector('#sPassword');
            const password = document.querySelector('#nPassword');

            togglePassword.addEventListener('click', function(e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fas fa-eye-slash');
            });
        })
    </script>
    <script>
        $(function() {
            const togglePassword = document.querySelector('#cPassword');
            const password = document.querySelector('#cPassword_2');

            togglePassword.addEventListener('click', function(e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye slash icon
                this.classList.toggle('fas fa-eye-slash');
            });
        })
    </script> --}}
    <script>
        $(function() {
            function togglePasswordVisibility(toggleId, passwordId) {
                const togglePassword = document.querySelector(`#${toggleId}`);
                const password = document.querySelector(`#${passwordId}`);

                togglePassword.addEventListener('click', function(e) {
                    // Toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    // Toggle the eye slash icon
                    this.classList.toggle('fas fa-eye-slash');
                });
            }

            // Call the function for each pair of toggle and password elements
            togglePasswordVisibility('togglePassword', 'id_password');
            togglePasswordVisibility('sPassword', 'nPassword');
            togglePasswordVisibility('cPassword', 'cPassword_2');
        });
    </script>

</body>

</html>
