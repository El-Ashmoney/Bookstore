<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.css')
    </head>
    <body class="bg-theme bg-theme1">
        <!-- Start wrapper-->
        <div id="wrapper">
            <!--Start sidebar-wrapper-->
            @include('admin.sidebar')
            <!--End sidebar-wrapper-->

            <!--Start topbar header-->
            @include('admin.header')
            <!--End topbar header-->

            <div class="clearfix"></div>

            <div class="content-wrapper">
                <div class="container-fluid">
                    <!--Start Dashboard Content-->
                    @include('admin.body')
                    <!--End Dashboard Content-->

                    <!--start overlay-->
                    <div class="overlay toggle-menu"></div>
                    <!--end overlay-->
                </div>
                    <!-- End container-fluid-->
            </div>
            <!--End content-wrapper-->

            <!--Start Back To Top Button-->
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
            <!--End Back To Top Button-->

            <!--Start footer-->
            @include('admin.footer')
            <!--End footer-->

            <!--start color switcher-->
            @include('admin.switcher')
            <!--end color switcher-->
        </div><!--End wrapper-->
        @include('admin.script')
    </body>
</html>
