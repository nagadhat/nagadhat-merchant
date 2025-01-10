<!DOCTYPE html>
<html lang="en">

<head>
    <x-header.header-link />
    {{-- section for styling codes --}}
    @yield('head')
</head>

<body>
    {{-- sweetalert --}}
    @include('sweet::alert')
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Topbar Start -->
        <x-header :userDetails="$userDetails" />
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <x-fragment.common-fragment.left-sidebar :userDetails="$userDetails" />
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page pt-2">

            {{-- section for content codes --}}
            @yield('content')

        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        <x-footer />
    </div>
    <!-- END wrapper -->
    <!-- Footer Linked -->
    <x-footer.footer-link />


    {{-- section for script codes --}}
    @yield('scripts')
</body>

</html>
