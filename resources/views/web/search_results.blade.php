<!DOCTYPE html>
@php
    use Illuminate\Support\Str;
@endphp
<html lang="en-US" dir="ltr">
    <head>
        <base href="/publc">
        @include('web.css')
    </head>
    <body>
        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <main>
            @include('web.search')
            <!-- ============================================-->

            <section class="py-6">
                <div class="container">
                    <div class="row">
                        @if(session()->has('message'))
                            <div class="session_message alert alert-success text-center" style="background-color: #003294 !important; color: #007bff!important">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="color: #007bff!important">x</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <h1 class="header-title display-4 header text-start mb-5 text-uppercase">Search Results for "{{ $query }}"</h1>
                        @foreach ($books as $book)
                            <div class="col-sm-6 col-lg-3 mb-4">
                                <div class="card border-0 h-100">
                                    <div class="position-relative">
                                        <img class="w-100" src="{{ asset('storage/' . $book->picture) }}" alt="Book Image" />
                                        <div class="course-logo">
                                            <img style="width: 60px; position: relative; bottom: -10px" src="{{ asset('storage/' . $book->category->picture) }}" alt="Category Image" />
                                        </div>
                                        <div class="ps-6">
                                            <span class="badge bg-primary rounded-0" style="padding: 11.1px 21px">
                                                @if ($book->price == 0)
                                                    Free
                                                @else
                                                    {{ $book->price }}
                                                @endif
                                            </span>
                                            <span class="badge bg-primary rounded-0" style="padding: 11.1px 21px">
                                                Rating: {{ $book->rating }} ({{ $book->rating_count }} ratings)
                                            </span>
                                        </div>
                                    </div>
                                    <div class="card-body px-0 py-3">
                                        <h5 class="mb-0 font-sans-serif fw-bold fs-md-0 fs-lg-1">{{ $book->title }}</h5>
                                        <p class="text-muted fs--1 stretched-link text-decoration-none" href="#!">{{ Str::limit($book->description, 40, '...') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-9 mb-4">
                                <div>
                                    <p class="text-uppercase text-secondary fw-normal my-3">
                                        Title:
                                    </p>
                                    <p>{{ $book->title }}</p>
                                </div>
                                <div>
                                    <p class="text-uppercase text-secondary fw-normal my-3">
                                        Author:
                                    </p>
                                    <p>{{ $book->author }}</p>
                                </div>
                                <div class="description">
                                    <p class="text-uppercase text-secondary fw-normal my-3">Description:</p> {{ $book->description }}
                                </div>
                                <div class="raiting">
                                    <p class="text-uppercase text-secondary fw-normal my-3">Rating:</p>
                                    @if (Auth::user())
                                        <form action="{{ route('rate.book', ['bookId' => $book->id]) }}" method="POST">
                                            @csrf
                                            <select name="rating" class="btn btn-light btn-round my-3">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <button type="submit" class="btn btn-light btn-round my-3">Rate</button>
                                        </form>
                                    @else
                                        <p>
                                            Please
                                            <a href="{{ Route('login') }}" class="">Login</a>
                                            or
                                            <a href="{{ Route('register') }}" class="">Register</a>
                                            to Rate this book
                                        </p>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <a href="{{ asset('storage/' . $book->book_file) }}" class="download-btn btn btn-light btn-round my-3" download>
                                        <i class="fa-solid fa-download"></i> Download
                                    </a>
                                </div>
                            </div>
                            <hr class="rounded">
                        @endforeach
                    </div>
                </div>
                <!-- end of .container-->
            </section>

            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web.newsletter')
            <!-- <section> close ============================-->
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web.education')
            <!-- <section> close ============================-->
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            @include('web/footer')
            <!-- <section> close ============================-->
            <!-- ============================================-->
        </main>
        <!-- ===============================================-->
        <!--    End of Main Content-->
        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->
        @include('web.script')
    </body>
</html>
