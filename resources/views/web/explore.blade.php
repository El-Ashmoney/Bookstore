<section class="bg-secondary">
    <div class="container">
        <div class="row g-3">
            <h1 class="header-title-explore display-4 header text-start mb-5"> EXPLORE EDUPRIX | Bookstore</h1>
            @foreach ($categories as $category)
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-hover h-100">
                        <div class="card-body d-flex align-items-center px-4 px-lg-2 px-xl-4">
                            <div class="d-flex align-items-center">
                                <div class="icon-box">
                                    <img class="eduprix-icon" src="web/assets/img/icons/data-science.png" alt="explore" />
                                    <img class="eduprix-icon-hover" src="web/assets/img/icons/data-science.svg" alt="explore" />
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="fs-lg-1 text-light mb-0">{{ $category->name }}</h4>
                                    <a class="stretched-link explore-link" href="{{ route('categories.books', $category->id) }}">
                                        @if ($category->books_count === 1)
                                            {{ $category->books_count }} Book
                                        @else
                                            {{ $category->books_count }} Books
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- end of .container-->
</section>
