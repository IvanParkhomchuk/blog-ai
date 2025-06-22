<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\PostStoreRequest;
use App\Http\Requests\Admin\Post\PostUpdateRequest;
use App\Models\Blog;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        $blogs = Blog::all();

        return view('admin.posts.create', compact('blogs'));
    }

    public function store(PostStoreRequest $request) {
        Post::create($request->validated());

        return redirect()->route('admin.posts.index')->with('success', __('Post created successfully!'));
    }

    public function edit(Post $post) {
        $blogs = Blog::all();

        return view('admin.posts.edit', compact('post', 'blogs'));
    }

    public function update(PostUpdateRequest $request, Post $post) {
        $post->update($request->validated());

        return redirect()->route('admin.posts.index')->with('success', __('Post updated successfully!'));
    }

    public function destroy(Post $post) {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', __('Post deleted successfully!'));
    }
}
