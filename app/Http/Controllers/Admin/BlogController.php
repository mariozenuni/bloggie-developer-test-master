<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\BlogStoreRequest;
use App\Http\Requests\Admin\Blog\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function create(Blog $blog)
    {
        return view('admin.blog.create');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.edit')->with([
            'blog' =>  $blog
        ]);
    }

    public function index(Request $request)
    {
        $blogs = Blog::query();

        if ($request->get('search')) {
            $blogs->where('title', 'like', '%' . $request->get('search') . '%');
        }

        $blogs = $blogs
            ->orderBy('title', 'asc')
            ->paginate();

        return view('admin.blog.index')->with([
            'blogs' => $blogs
        ]);
    }

    public function store(BlogStoreRequest $request)
    {
        $blog = Blog::create($request->validated());

        return redirect(route('admin.blog.edit', $blog))->with([
            'success' => 'Successfully Created a new Blog Post.'
        ]);
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $blog->update($request->validated());
        $blog->refresh();

        return redirect(route('admin.blog.edit', $blog))->with([
            'success' => 'Successfully Edited the Blog Post.'
        ]);
    }
}
