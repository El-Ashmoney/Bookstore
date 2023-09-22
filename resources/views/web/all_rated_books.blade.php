<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        @include('web.css')
    </head>
    <body>
        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->
        <main>
            @include('web.search')
            @include('web.learn')
            <!-- ============================================-->
            <!-- <section> begin ============================-->
            <section class="pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-6">
                                <h1 class="header-title display-4 header text-center">ALL RATED BOOKS</h1>
                            </div>
                            <div class="row">
                                @foreach ($books as $book)
                                    @if ($book->rating >= 4)
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
                                                    <a class="text-muted fs--1 stretched-link text-decoration-none" href="{{ Route('book.details', $book->id) }}">
                                                        {{ Str::limit($book->description, 40, '...') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of .container-->
            </section>
            <!-- <section> close ============================-->
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
