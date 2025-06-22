<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogStoreRequest;
use App\Http\Requests\Admin\Blog\BlogUpdateRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::all();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create() {
        return view('admin.blogs.create');
    }

    public function store(BlogStoreRequest $request) {
        Blog::create($request->validated());

        return redirect()->route('admin.blogs.index')->with('success', __('Blog created successfully!'));
    }

    public function edit(Blog $blog) {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(BlogUpdateRequest $request, Blog $blog) {
        $blog->update($request->validated());

        return redirect()->route('admin.blogs.index')->with('success', __('Blog updated successfully!'));
    }

    public function destroy(Blog $blog) {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', __('Blog deleted successfully!'));
    }
}
