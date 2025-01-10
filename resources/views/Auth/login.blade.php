<?php
session(['createAccountDestination' => url()->previous()]); // Set settion for destination where user will redirect after create an account
?>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.header.header-link')

    <!-- material icons css -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- sweetalert --}}
    @include('sweet::alert')

    <div class="mt-lg-5 mt-2">
        <!-- Sing in form -->
        <section class="sign-in">
            <div class="container">
                <div class="text-center mb-n5 pt-4">
                    <a href="" class="logo">
                        <img src="{{ asset('images/merchant-panel-logo.png') }}" alt=""
                            class="logo-dark mx-auto" style="height: 70px; ">
                    </a>
                    <p class="text-muted mt-2 mb-4">Welcome to merchant panel</p>
                </div>
                <div class="signin-content">
                    <div class="signin-image">
                        <figure class="d-none d-lg-block">
                            <img src="{{ asset('images/signin-image.jpg') }}" alt="sing up image">
                        </figure>
                        <a href="#" onclick="showSignUpForm()" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{ route('sign_in') }}">
                            @csrf
                            @if ($errors->any() || (isset($_GET['loginStatus']) && $_GET['loginStatus'] == 'fail'))
                                <p class="text-color-red">Your Given Information is not correct</p>
                            @endif
                            <div class="form-group">
                                <label class="label" for="your_name"><i
                                        class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="emailaddress"
                                    placeholder="Enter Phone Number" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <a href="{{ route('forget-password') }}">Forget Password?</a>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label class="label" for="remember-me"
                                    class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit"
                                    value="Sign In" />
                                <strong class="text-muted"> / </strong>
                                <input type="button" name="signin" onclick="showSignUpForm()" class="form-submit"
                                    value="Sign Up" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Sign up form -->
        <section class="sign-up d-none">
            <div class="container">
                <div class="text-center mb-n5 pt-4">
                    <a href="" class="logo">
                        <img src="{{ asset('images/merchant-panel-logo.png') }}" alt=""
                            class="logo-dark mx-auto" style="height: 70px; ">
                    </a>
                    <p class="text-muted mt-2 mb-4">Welcome to merchant panel</p>
                </div>
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="{{ route('sign_up') }}" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label class="text-muted"><i class="zmdi zmdi-account material-icons-name mr-2"></i>
                                    <span>Account Type *</span>
                                </label>
                            </div>
                            <div class="row ml-0 mt-n3 mb-4 border-bottom border-dark">
                                <div class="col ">
                                    <input type="radio" required name="shop_type" value="Individual"
                                        class="agree-term" />
                                    <label for="agree-term"
                                        class="label-agree-term"><span><span></span></span>Individual</label>
                                </div>
                                <div class="col ">
                                    <input type="radio" required name="shop_type" value="Business"
                                        class="agree-term" />
                                    <label for="agree-term"
                                        class="label-agree-term"><span><span></span></span>Business</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="text-muted"><i class="zmdi zmdi-account material-icons-name mr-2"></i>
                                    Your Location *
                                </label>
                                <select class="custom-select" name="location" required>
                                    <option>Select Location</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Sylhet">Sylhet</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="label text-muted"><i
                                        class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="shop_name" required placeholder="Shop Name *" />
                            </div>
                            <div class="form-group">
                                <label class="label text-muted"><i
                                        class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="users_name" required placeholder="Owner's Name *" />
                            </div>
                            <div class="form-group">
                                <label class="label text-muted"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="phone_number" required placeholder="Phone Number *" />
                            </div>
                            <div class="form-group">
                                <label class="label text-muted"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" required placeholder="Your Email *" />
                            </div>
                            <div class="form-group">
                                <label class="label text-muted"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pasword" required placeholder="Password *" />
                            </div>
                            <div class="form-group">
                                <label class="label text-muted"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" required
                                    placeholder="Repeat your password *" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" required id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>By
                                    Continuing
                                    you agree to NagadHat's <a href="{{ $publicURL }}/terms-conditions-vendor"
                                        class="term-service">Terms and
                                        Conditions</a></label>
                                {{-- <span>Affiliate ID: nagadhat</span> --}}
                                <div class="text-danger" id="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>


                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" name="reg_btn" id="signup-btn"
                                    value="Register" />
                                <strong class="text-muted"> / </strong>
                                <input type="button" onclick="showSignInForm()" class="form-submit"
                                    value="Login" />
                            </div>
                            {{-- <div class="form-group form-button">
                                <a href="#" onclick="showSignInForm()" class="signup-image-link">Login</a>
                            </div> --}}
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure class="d-none d-lg-block"><img src="images/signup-image.jpg" alt="sing up image">
                        </figure>
                        <a href="#" onclick="showSignInForm()" class="signup-image-link">I am already a member
                            ?</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('components.footer.footer-link')

    <script>
        // if checked the checkbox then remove invalid
        $('#signup-btn').submit(function(e) {
            if (!$('#agree-term').is(':checked')) {
                e.preventDefault();
                $('#invalid-feedback').removeClass('d-none');
            }
        });

        // if get 'register' param with the url
        var getLink = window.location.href;
        if ((getLink.includes("register"))) {
            showSignUpForm();
        }

        // function to show sign-up section
        function showSignUpForm() {
            $('.sign-in').addClass('d-none');
            $('.sign-up').removeClass('d-none');
        }
        // function to show sign-in section
        function showSignInForm() {
            $('.sign-in').removeClass('d-none');
            $('.sign-up').addClass('d-none');
        }
    </script>
</body>

</html>
