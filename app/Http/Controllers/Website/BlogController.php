<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $todayDate = date('Y-m-d');
        $blogs = Blog::select('blogs.*')
                ->whereNotNull('published_at')
                ->where('published_at', '<',$todayDate)
                ->orderBy('published_at', 'desc')
                ->paginate(12);

        return view('website.blog.index')->with([
            'blogs' => $blogs
        ]);
    }
    
    public function show(Blog $blog)
    {
        return view('website.blog.show')->with([
            'blog' => $blog
        ]);
    }

}
