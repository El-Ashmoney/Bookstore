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
                    <!--Start Category Content-->
                    <section class="categories container">
                        <div class="row">
                            <div class="col-lg-12">
                                @if(session()->has('message'))
                                    <div class="session_message alert alert-success text-center">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <h2 class="categories_heading">Categories</h2>
                                <div class="add_category">
                                    <form method="POST" action="{{ url('add_category') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="input-6">Category Name</label>
                                            <input type="text" class="form-control form-control-rounded" id="input-6" name="name" placeholder="Enter Category Name" required>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-light btn-round px-5"><i class="fa fa-plus"></i> Add Category</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="show_categories">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Categories Table</h5>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Category Name</th>
                                                            <th scope="col">Control</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($categories as $category)
                                                            <tr>
                                                                <th scope="row">{{ $category->id }}</th>
                                                                <td>{{ $category->name }}</td>
                                                                <td>
                                                                    @if(Auth::user()->role !== 'admin')
                                                                        <small style="color: red">Unauthorized</small>
                                                                    @else
                                                                        <a href="{{ Route('edit_category',$category->id) }}" class="btn btn-light btn-round px-5">
                                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                                        </a>
                                                                        <a href="{{ Route('delete_category',$category->id) }}" class="btn btn-danger btn-round px-5" onclick="return confirm('Are You Sure!')">
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
                    <!--End Category Content-->

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
