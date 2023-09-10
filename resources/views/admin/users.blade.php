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
                                <h2 class="categories_heading">Users</h2>
                                {{-- <div class="add_category text-center">

                                </div> --}}
                                <div class="show_categories">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Users Table</h5>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">User Name</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">User Type</th>
                                                            <th scope="col">Control</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($users as $user)
                                                            <tr>
                                                                <th scope="row">{{ $user->id }}</th>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td>
                                                                    @if ($user->is_admin == 0)
                                                                        <p style="color: #FFF">Normal user</p>
                                                                    @elseif($user->is_admin == 1)
                                                                        <p style="color: #ffd32a">Admin</p>
                                                                    @elseif($user->is_admin == 2)
                                                                        <p style="color: #0be881">Instructor</p>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if(in_array(Auth::user()->is_admin, [0, 2]))
                                                                        <small style="color: red">Unauthorized</small>
                                                                    @else
                                                                        <a href="{{ url('edit_user',$user->id) }}" class="btn btn-light btn-round px-5">
                                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                                        </a>
                                                                        <a href="{{ url('delete_user',$user->id) }}" class="btn btn-danger btn-round px-5" onclick="return confirm('Are You Sure!')">
                                                                            <i class="fa-solid fa-trash-can"></i> Delete
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
