<section class="blog-post-area section-margin mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if (count($blogs) > 0)
                    @foreach ($blogs as $blog)
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset('storage/blogs/' . $blog->image) }}" alt=""
                                    style="width: 100%;">
                                <ul class="thumb-info">
                                    <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name ?? 'Admin' }}</a>
                                    </li>
                                    <li><a href="#"><i
                                                class="ti-notepad"></i>{{ $blog->created_at->format('d M Y') }}</a></li>
                                    <li><a href="#"><i
                                                class="ti-themify-favicon"></i>{{ $blog->comments()->count() }}
                                            Comments</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="{{ route('blogs.show', ['blog' => $blog->id]) }}">
                                    <h3>{{ $blog->name }}</h3>
                                </a>
                                <p>{{ Str::limit($blog->description, 150) }}</p>
                                <a class="button" href="{{ route('blogs.show', ['blog' => $blog]) }}">Read
                                    More <i class="ti-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                @endif


                <div class="row">
                    {{ $blogs->render('pagination::bootstrap-5') }}
                </div>
            </div>
            @include('theme.partials.siddebar')

</section>
