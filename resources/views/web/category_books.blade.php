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
                        <h1 class="header-title display-4 header text-start mb-5 text-uppercase"> Books in ({{ $category->name }}) category</h1>
                        @if ($books->count())
                            @foreach ($books as $book)
                                <div class="col-sm-6 col-lg-3 mb-4">
                                    <div class="card border-0 h-100">
                                        <div class="position-relative">
                                            <img class="w-100" src="web/assets/img/gallery/art-masterclass.png" alt="courses" />
                                            <div class="course-logo">
                                                <img src="web/assets/img/gallery/moma.png" alt="logo" />
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
                                            <a class="text-muted fs--1 stretched-link text-decoration-none" href="{{ Route('book.details', $book->id) }}">{{ Str::limit($book->description, 40, '...') }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-uppercase text-secondary fw-normal my-3">There's no books in this category</p>
                        @endif
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
