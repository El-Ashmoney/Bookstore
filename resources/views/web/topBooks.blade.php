@php
    use Illuminate\Support\Str;
@endphp
<section class="py-6">
    <div class="container">
        <div class="row">
            <h1 class="header-title display-4 header text-start mb-5 text-uppercase"> Top Rated Books</h1>
            @foreach ($topRatedBooks as $topRatedBook)
                @if ($topRatedBook->rating >= 4)
                    <div class="col-sm-6 col-lg-3 mb-4">
                        <div class="card border-0 h-100">
                            <div class="position-relative">
                                <img class="w-100" src="{{ asset('storage/' . $topRatedBook->picture) }}" alt="Book Image" />
                                <div class="course-logo">
                                    <img style="width: 60px; position: relative; bottom: -10px" src="{{ asset('storage/' . $topRatedBook->category->picture) }}" alt="Category Image" />
                                </div>
                                <div class="ps-6">
                                    <span class="badge bg-primary rounded-0" style="padding: 11.1px 21px">
                                        @if ($topRatedBook->price == 0)
                                            Free
                                        @else
                                            {{ $topRatedBook->price }}
                                        @endif
                                    </span>
                                    <span class="badge bg-primary rounded-0" style="padding: 11.1px 21px">
                                        Rating: {{ $topRatedBook->rating }} ({{ $topRatedBook->rating_count }} ratings)
                                    </span>
                                </div>
                            </div>
                            <div class="card-body px-0 py-3">
                                <h5 class="mb-0 font-sans-serif fw-bold fs-md-0 fs-lg-1">{{ $topRatedBook->title }}</h5>
                                <a class="text-muted fs--1 stretched-link text-decoration-none" href="{{ Route('book.details', $topRatedBook->id) }}">
                                    {{ Str::limit($topRatedBook->description, 40, '...') }}
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="d-flex justify-content-sm-end justify-content-center">
            <a class="link fw-normal fs-2" href="{{ Route('all.rated.books') }}"> See all </a>
        </div>
    </div>
    <!-- end of .container-->
</section>
