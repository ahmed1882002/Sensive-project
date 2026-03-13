@extends('master')
@section('active-home', 'active')
@section('title', 'My Blogs')

@section('content')
    @include('theme.partials.hero', ['title' => 'My Dashboard'])

    <section class="blog-post-area section-margin mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2>Manage My Blogs</h2>
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Create New Blog</a>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Comments</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($blogs as $index => $blog)
                                <tr>
                                    <td>{{ $blogs->firstItem() + $index }}</td>
                                    <td>
                                        <img src="{{ asset("storage/blogs/$blog->image") }}" alt="blog image" width="80"
                                            class="rounded">
                                    </td>
                                    <td>
                                        <a href="{{ route('blogs.show', ['blog' => $blog->id]) }}" target="_blank">
                                            {{ $blog->name }}
                                        </a>
                                    </td>
                                    <td>{{ $blog->category->name }}</td>
                                    <td>{{ $blog->comments()->count() }}</td>
                                    <td>{{ $blog->created_at->format('d M Y') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('blogs.edit', ['blog' => $blog]) }}"
                                                class="btn btn-sm btn-info mr-2">Edit</a>
                                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">You have not created any blogs yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $blogs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
