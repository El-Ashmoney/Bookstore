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
                                <h2 class="categories_heading">Edit Book: ( {{ $book->title }} )</h2>
                                <div class="add_category">
                                    <form method="POST" action="{{ Route('update_book', $book->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="input-1">Title</label>
                                            <input type="text" class="form-control form-control-rounded" id="input-1" name="title" value="{{ $book->title }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-2">Author</label>
                                            <input type="text" class="form-control form-control-rounded" id="input-2" name="author" value="{{ $book->author }}" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-3">Description</label>
                                            <input type="text" class="form-control form-control-rounded" id="input-3" name="description" value="{{ $book->description }}" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-4">Price</label>
                                            <input type="number" class="form-control form-control-rounded" id="input-4" name="price" value="{{ $book->price }}" autocomplete="off" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="select-1">Category</label>
                                            <select name="category_id" class="form-control form-control-rounded" id="select-1" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ ($book->category_id == $category->id) ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-5">Upload Book</label>
                                            <input type="file" class="form-control form-control-rounded" id="input-5" name="book_file" accept=".pdf">
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-light btn-round px-5"><i class="fa-solid fa-pen-to-square"></i> Update Book</button>
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
