@extends('master')
@section('title', 'Edit Blog')

@section('content')
    @include('theme.partials.hero', ['title' => 'Edit Blog'])

    <section class="section-margin mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h4>Update: {{ $blog->name }}</h4>
                        </div>
                        <div class="card-body p-4">
                            <form action="{{ route('blogs.update', ['blog' => $blog]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Title -->
                                <div class="form-group mb-3">
                                    <label for="name" class="font-weight-bold">Blog Title</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ old('name', $blog->name) }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Category -->
                                <div class="form-group mb-3">
                                    <label for="category_id" class="font-weight-bold">Category</label>
                                    <select name="category_id" id="category_id" class="form-control" required>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group mb-3">
                                    <label for="description" class="font-weight-bold">Content</label>
                                    <textarea name="description" id="description" rows="8" class="form-control" required>{{ old('description', $blog->description) }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Existing Image Display -->
                                @if ($blog->image)
                                    <div class="mb-3">
                                        <label class="font-weight-bold d-block">Current Image</label>
                                        <img src="{{ asset('storage/blogs/' . $blog->image) }}" alt="Current Image"
                                            width="200" class="img-thumbnail">
                                    </div>
                                @endif

                                <!-- Image Upload -->
                                <div class="form-group mb-4">
                                    <label for="image" class="font-weight-bold">Update Image (Optional)</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror   
                                    <small class="text-muted d-block mt-1">Leave blank to keep the current image. Max
                                        2MB.</small>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Cancel</a>
                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
