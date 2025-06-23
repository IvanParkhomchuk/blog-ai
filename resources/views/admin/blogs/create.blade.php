@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">{{ __('Create Blog') }}</h1>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.blogs.store') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ __('Title') }}
                    </label>
                    <input type="text" name="title" id="title"
                           value="{{ old('title') }}"
                           class="border border-gray-300 rounded-lg w-full px-4 py-2 focus:ring-blue-500 focus:border-blue-500"
                           required>
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
                           required>
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
                    <a href="{{ route('admin.blogs.index') }}"
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
