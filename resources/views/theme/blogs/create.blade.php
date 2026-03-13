@extends('master')
@section('title', 'Add New Blog')

@section('content')
    @include('theme.partials.hero', ['title' => 'Add New Blog'])

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=DM+Sans:wght@300;400;500&display=swap');

        .blog-form-section {
            min-height: 70vh;
            display: flex;
            align-items: center;
            padding: 60px 0;
            background: linear-gradient(135deg, #fafaf8 0%, #f0ede6 100%);
        }

        .blog-form-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 50px 48px;
            box-shadow:
                0 2px 4px rgba(0, 0, 0, 0.04),
                0 12px 40px rgba(0, 0, 0, 0.08),
                0 0 0 1px rgba(0, 0, 0, 0.04);
            max-width: 640px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }

        .blog-form-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #c9a96e, #e8c97a, #c9a96e);
        }

        .blog-form-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .blog-form-subtitle {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: #999;
            margin-bottom: 36px;
            font-weight: 300;
        }

        .blog-form-card .form-group {
            margin-bottom: 22px;
            position: relative;
        }

        .blog-form-card label {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            font-weight: 500;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            display: block;
            margin-bottom: 8px;
        }

        .blog-form-card .form-control {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            color: #1a1a1a;
            background: #fafaf8;
            border: 1.5px solid #e8e4dc;
            border-radius: 10px;
            padding: 13px 16px;
            width: 100%;
            transition: all 0.25s ease;
            outline: none;
            appearance: none;
        }

        .blog-form-card .form-control:focus {
            border-color: #c9a96e;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(201, 169, 110, 0.12);
        }

        .blog-form-card .form-control::placeholder {
            color: #bbb;
            font-weight: 300;
        }

        .blog-form-card textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* File input */
        .file-input-wrapper {
            position: relative;
        }

        .file-input-wrapper input[type="file"] {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: #555;
            background: #fafaf8;
            border: 1.5px dashed #d8d2c8;
            border-radius: 10px;
            padding: 13px 16px;
            width: 100%;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .file-input-wrapper input[type="file"]:hover,
        .file-input-wrapper input[type="file"]:focus {
            border-color: #c9a96e;
            background: #fffdf8;
            outline: none;
        }

        /* Select */
        .blog-form-card select.form-control {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23999' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            padding-right: 40px;
            cursor: pointer;
        }

        /* Divider */
        .form-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e8e4dc, transparent);
            margin: 8px 0 26px;
        }

        /* Submit button */
        .btn-submit-blog {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            color: #fff;
            background: linear-gradient(135deg, #1a1a1a 0%, #3a3a3a 100%);
            border: none;
            border-radius: 10px;
            padding: 15px 32px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-submit-blog::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #c9a96e, #e8c97a);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .btn-submit-blog:hover::after {
            opacity: 1;
        }

        .btn-submit-blog span {
            position: relative;
            z-index: 1;
        }

        .btn-submit-blog:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(201, 169, 110, 0.35);
        }

        .btn-submit-blog:active {
            transform: translateY(0);
        }

        /* Error messages */
        .blog-form-card .text-danger {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            color: #e05252 !important;
            margin-top: 5px;
            display: block;
        }

        /* Alert */
        .blog-form-card .alert-success {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.88rem;
            background: #f0faf4;
            border: 1px solid #a8ddb8;
            color: #2d7a47;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 26px;
        }
    </style>

    <section class="blog-form-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-7">
                    <div class="blog-form-card">

                        @if (session('success_store_blog'))
                            <div class="alert alert-success">
                                {{ session('success_store_blog') }}
                            </div>
                        @endif

                        <h2 class="blog-form-title">New Blog Post</h2>
                        <p class="blog-form-subtitle">Fill in the details below to publish your article</p>

                        <form action="{{ route('blogs.store') }}" method="post" enctype="multipart/form-data"
                            novalidate="novalidate">
                            @csrf

                            <div class="form-group">
                                <label for="name">Title</label>
                                <input class="form-control" name="name" id="name" type="text"
                                    value="{{ old('name') }}" placeholder="Enter blog title">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description / Content</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Write your blog content here...">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Cover Image</label>
                                <div class="file-input-wrapper">
                                    <input name="image" type="file" accept="image/*">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select class="form-control" name="category_id" id="category_id">
                                    <option value="">Select a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-divider"></div>

                            <button type="submit" class="btn-submit-blog">
                                <span>Publish Blog Post →</span>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
