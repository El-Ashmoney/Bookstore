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
                                <h1 class="header-title display-4 header text-center">ALL BOOKS</h1>
                            </div>
                            <div class="row">
                                @foreach ($books as $book)
                                    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                                        <div class="card border-100 h-100 shadow">
                                            <div class="card-body p-4 h-100">
                                                <img class="w-100" src="{{ asset('storage/' . $book->picture) }}" alt="Book Image" />
                                                <div class="d-flex justify-content-between mt-3 border-bottom border-100 py-2">
                                                    <span class="badge bg-soft-info rounded-1 text-info fw-normal p-2">{{ $book->category->name }}</span>
                                                    <p class="mb-0 text-500">{{ \Carbon\Carbon::parse($book->created_at)->format('d M Y') }}
                                                    </p>
                                                </div>
                                                <h3 class="fw-normal fs-lg-1 fs-xxl-2 lh-sm mt-3">{{ $book->title }}</h3>
                                                <a class="text-secondary stretched-link" href="{{ Route('book.details', $book->id) }}">Full Article</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="pagination">
                                    {{ $books->onEachSide(5)->links() }}
                                </div>
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
