<section class="pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-6">
                    <h1 class="header-title display-4 header text-center">RECENT BOOKS</h1>
                </div>
                <div class="row">
                    @foreach ($recentBooks as $recentBook)
                        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                            <div class="card border-100 h-100 shadow">
                                <div class="card-body p-4 h-100">
                                    <img class="w-100" src="web/assets/img/gallery/art-craft.png" alt="" />
                                    <div class="d-flex justify-content-between mt-3 border-bottom border-100 py-2">
                                        <span class="badge bg-soft-info rounded-1 text-info fw-normal p-2">{{ $recentBook->category->name }}</span>
                                        <p class="mb-0 text-500">{{ \Carbon\Carbon::parse($recentBook->created_at)->format('d M Y') }}
                                        </p>
                                    </div>
                                    <h3 class="fw-normal fs-lg-1 fs-xxl-2 lh-sm mt-3">{{ $recentBook->title }}</h3>
                                    <a class="text-secondary stretched-link" href="{{ Route('book.details', $recentBook->id) }}">Full Article</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-sm-end justify-content-center">
            <a class="link fw-normal fs-2" href="{{ Route('all.books') }}"> See all </a>
        </div>
    </div>
    <!-- end of .container-->
</section>
