<!DOCTYPE html>
<html lang="en">

<head>
    <x-header.header-link />
</head>

<body class="user-auth">
    {{-- sweetalart --}}
    @include('sweet::alert')
    {{-- pc view --}}
    <section class="d-none d-lg-block">
        <x-header />
        <section class="gry-bg py-5 bg-ash">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 mx-auto">
                            <div class="card">
                                <div class="text-center pt-4">
                                    <h1 class="h4 fw-600">
                                        Forgot Password?
                                    </h1>
                                </div>
                                {{-- to displays error or success message end --}}
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger alert-dismissible d-flex justify-content-between m-2"
                                            role="alert">
                                            <p>{{ $error }}</p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endforeach
                                @endif
                                {{-- to displays error or success message end --}}
                                <div class="px-4 py-3 py-lg-4">
                                    <div class="">
                                        <form class=" form-default" role="form"
                                            action="{{ route('submit_password_reset_request') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <div class="user-input-wrp">
                                                    <br />
                                                    <input type="text" class="inputText" name="username" required />
                                                    <span class="floating-label fw-600"><i class="fas fa-phone-alt" style="color: #44bc9d"></i> Your Phone Number</span>
                                                    <p class="fs-11 text-color-red fw-600">Please enter valid Mobile
                                                        number</p>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit"
                                                    class="btn bg-brand-color text-white btn-block fw-600">Get
                                                    Code</button>
                                            </div>
                                        </form>

                                        <div class="mb-3">
                                            <a href="/users/login"><i
                                                    class="las la-long-arrow-alt-left text-color-blue"></i><span
                                                    class="text-color-blue"> Back</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-footer />
    </section>


    {{-- mobile view --}}
    <section class="d-lg-none">
        <div class="limiter">
            <div class="container-login100">
                <div class="d-flex align-items-center pb-5 pt-5 m-0">
                    <a class="a d-block" href="{{ URL::route('websiteUrl') }}">
                        <img src="{{ asset('public/images/nagadhat-logo.png') }}" alt="Nagadhat Header Logo"
                            class="p-0" height="40">
                    </a>
                </div>

                <div class="container">
                    <form class="login100-form validate-form flex-sb flex-w" action="{{ route('submit_password_reset_request') }}"
                        method="POST">
                        @csrf
                        <span class="login100-form-title p-b-10">
                            Forgot Password?
                        </span>

                        <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter valid Mobile number">
                            <input class="input input100 phone" type="text" required name="username" placeholder="Your Phone Number">
                            <span class="focus-input100"></span>
                        </div>


                        <div class="container-login100-form-btn p-b-90">
                            <button type="submit" class="button login100-form-btn">
                                Get Code
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <a href="/users/login" class="a d-flex justify-content-between pt-2 pr-3 pl-3 pb-2 fixed-bottom"
                style="background-color: #ffffff">
                <h5 class="text-muted">Back </h5>
                <span><i class="las la-long-arrow-alt-left fa-2x" style="color: #44bc9d"></i></span>
            </a>
        </div>
    </section>
    <!-- SCRIPTS -->
    <x-footer.footer-link />

</body>

</html>
