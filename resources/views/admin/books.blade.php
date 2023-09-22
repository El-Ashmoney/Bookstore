@php
    use Illuminate\Support\Str;
@endphp
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
                                <h2 class="categories_heading">Books</h2>
                                <div class="add_category text-center">
                                    <form method="POST" action="{{ url('add_book') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title text-center">Add New Book</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Title</th>
                                                                <th scope="col">Author</th>
                                                                <th scope="col">Description</th>
                                                                <th scope="col">Price</th>
                                                                <th scope="col">Category</th>
                                                                <th scope="col">Book Upload</th>
                                                                <th scope="col">Picture Upload</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control form-control-rounded" name="title" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control form-control-rounded" name="author" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control form-control-rounded" name="description" required>
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control form-control-rounded" name="price" required>
                                                                </td>
                                                                <td>
                                                                    <select name="category_id" class="form-control form-control-rounded" required>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="file"class="form-control form-control-rounded" name="book_file" accept=".pdf" required>
                                                                </td>
                                                                <td>
                                                                    <input type="file" class="form-control form-control-rounded" name="picture" required>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-light btn-round px-5"><i class="fa fa-plus"></i> Add book</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="show-books show_categories">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Books Table</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Control</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($books as $book)
                                                <tr>
                                                    <th scope="row">{{ $book->id }}</th>
                                                    <td>{{ Str::limit($book->title, 30, '...') }}</td>
                                                    <td>{{ Str::limit($book->author, 25, '...') }}</td>
                                                    <td>{{ Str::limit($book->description, 30, '...') }}</td>
                                                    <td>${{ $book->price }}</td>
                                                    <td>{{ $book->category->name }}</td>
                                                    <td>
                                                        <a href="{{ asset('storage/' . $book->book_file) }}" class="btn btn-light btn-round" download>
                                                            <i class="fa-solid fa-download"></i> Download
                                                        </a>
                                                        <a href="{{ url('edit_book',$book->id) }}" class="btn btn-light btn-round">
                                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                                        </a>
                                                        <a href="{{ url('delete_book',$book->id) }}" class="btn btn-danger btn-round" onclick="return confirm('Are You Sure!')">
                                                            <i class="fa-solid fa-trash-can"></i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination">
                                        {{ $books->onEachSide(5)->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Book Content-->
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
