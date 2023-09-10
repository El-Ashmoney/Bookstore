<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="/public">
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
                    <!--Start User Content-->
                    <section class="categories container">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(session()->has('message'))
                                    <div class="session_message alert alert-success text-center">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <h2 class="categories_heading">Edit User: ( {{ $user->name }} )</h2>
                                <div class="add_category">
                                    <form method="POST" action="{{ url('update_user', $user->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="input-6">user Name</label>
                                            <input type="text" class="form-control form-control-rounded" id="input-6" name="name" value="{{ $user->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-7">Email</label>
                                            <input type="text" class="form-control form-control-rounded" id="input-7" name="email" value="{{ $user->email }}" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-6">user Type</label>
                                            <input type="text" class="form-control form-control-rounded" id="input-6" name="userType" value="{{ $user->is_admin }}" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-light btn-round px-5"><i class="fa-solid fa-pen-to-square"></i> Update User</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--End User Content-->

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
