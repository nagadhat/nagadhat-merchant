<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.header.header-link')
    <!--login Font Icon -->
    <link rel="stylesheet" href="{{ asset('fonts/material-icon/css/material-design-iconic-font.min.css') }}">
    <!-- login Main css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="mt-lg-5 mt-2">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="text-center mb-n5 pt-4">
                    <a href="" class="logo">
                        <img src="https://nagadhat.com.bd/public/images/nagadhat-logo.png" alt=""
                            class="logo-dark mx-auto" style="height: 50px; ">
                    </a>
                    <p class="text-muted mt-2 mb-4">Welcome to merchant panel</p>
                </div>
                <div class="signin-content">
                    <div class="signin-image">
                        <figure class="d-none d-lg-block"><img src="{{ asset('images/verify-image.png') }}"
                                alt="sing up image">
                        </figure>
                        <a href="/register" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">OTP Verify</h2>
                        <form method="POST" class="register-form" id="login-form"
                            action="{{ route('merchant-update-password') }}">
                            @csrf
                            @if ($errors->any() || (isset($_GET['loginStatus']) && $_GET['loginStatus'] == 'fail'))
                                <p class="text-color-red">Your Given Information is not correct</p>
                            @endif
                            <div class="form-group">
                                <label class="label" for="your_name"><i
                                        class="fas fa-user-check text-muted"></i></label>
                                <input type="text" name="new_password" id="new_password" placeholder="New Password" />
                            </div>
                            <div class="form-group">
                                <label class="label" for="your_name"><i
                                        class="fas fa-user-check text-muted"></i></label>
                                <input type="text" name="confirm_password" id="confirm_password" placeholder="Confirm Password" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" class="form-submit" value="Verify" />
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>


    @include('components.footer.footer-link')


</body>

</html>
