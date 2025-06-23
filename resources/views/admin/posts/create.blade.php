@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ __('Create Post') }}</h1>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="blog" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Blog') }}
                    </label>

                        <select class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500" name="blog_id" id="blog_id">
                            <option value="" disabled {{ old('blog_id') ? '' : 'selected' }}>{{ __('Choose a Blog') }}</option>
                            @foreach($blogs as $blog)
                                <option value="{{ $blog->id }}" {{ old('blog_id') == $blog->id ? 'selected' : '' }}>{{ $blog->title }}</option>
                            @endforeach
                        </select>
                        @error('blog_id')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror

                    @error('blog')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Title') }}
                    </label>
                    <input type="text" name="title" id="title"
                           value="{{ old('title') }}"
                           class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                    @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Slug') }}
                    </label>
                    <input type="text" name="slug" id="slug"
                           value="{{ old('slug') }}"
                           class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                    @error('slug')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Description') }}
                    </label>
                    <textarea name="description" id="description"
                              class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                              rows="5">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('admin.posts.index') }}"
                       class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit"
                            class="bg-blue-600 px-4 py-2 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                        {{ __('Create') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 300,
                tabsize: 2,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
