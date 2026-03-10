<section class="blog-post-area section-margin mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if (count($blogs) > 0)
                    @foreach ($blogs as $blog)
                        <div class="single-recent-blog-post">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset("storage/blogs/$blog->image") }}" alt="">
                                <ul class="thumb-info">
                                    <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                    <li><a href="#"><i
                                                class="ti-notepad"></i>{{ $blog->created_at->format('d M Y') }}</a></li>
                                    <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="blog-single.html">
                                    <h3>{{ $blog->name }}</h3>
                                </a>
                                <p>{{ $blog->description }}

                                </p>
                                <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
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
