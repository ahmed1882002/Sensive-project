@extends('master')
@section('title', 'single_Page')

@section('content')
    @include('theme.partials.hero', ['title' => $blog->name])
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="main_blog_details">
                        <img class="img-fluid" src="{{ asset('storage/blogs/' . $blog->image) }}" alt=""
                            style="width: 100%;">
                        <a href="#">
                            <h4>{{ $blog->name }}</h4>
                        </a>
                        <div class="user_details">
                            <div class="float-right mt-sm-0 mt-3">
                                <div class="media">
                                    <div class="media-body">
                                        <h5>{{ $blog->user->name ?? 'Admin' }}</h5>
                                        <p>{{ $blog->created_at->format('d M, Y h:i a') }}</p>
                                    </div>
                                    <div class="d-flex">
                                        <img width="42" height="42"
                                            src="{{ $blog->user && $blog->user->image ? asset('storage/' . $blog->user->image) : asset('assets/img/avatar.png') }}"
                                            alt="" class="rounded-circle" style="object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p>{!! nl2br(e($blog->description)) !!}</p>
                    </div>

                    <div class="comments-area">
                        <h4>{{ $blog->comments->count() }} Comments</h4>
                        @foreach ($blog->comments as $comment)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ $comment->user && $comment->user->image ? asset('storage/' . $comment->user->image) : asset('assets/img/avatar.png') }}"
                                                width="50" height="50" class="rounded-circle"
                                                style="object-fit: cover;">
                                        </div>
                                        <div class="desc">
                                            <h5><a href="#">{{ $comment->user->name ?? 'User' }}</a></h5>
                                            <p class="date">{{ $comment->created_at->format('F j, Y \a\t g:i a') }}</p>
                                            <p class="comment">
                                                {{ $comment->comment }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="comment-form">
                        <h4>Leave a Reply</h4>
                        @auth
                            <form method="POST" action="{{ route('comments.store', ['blog' => $blog->id]) }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="comment" placeholder="Messege" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Messege'" required></textarea>
                                    @error('comment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="button submit_btn">Post Comment</button>
                            </form>
                        @else
                            <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
                        @endauth
                    </div>
                </div>

                @include('theme.partials.siddebar')
            </div>
    </section>

@endsection
