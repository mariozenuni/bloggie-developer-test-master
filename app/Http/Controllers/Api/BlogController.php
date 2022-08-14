<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function featured(Request $request) : JsonResponse
    {
        $now = Carbon::now();
        $blogs = Blog::whereNotNull('featured_at')
            ->where('featured_at', '<=', $now)
            ->where('published_at', '<=', $now)
            ->where(function ($subquery) use ($now) {
                return $subquery->where('expired_at', '>', $now)->orWhereNull('expired_at');
            })
            ->orderBy('published_at', 'desc')
            ->limit($request->get('limit', 3))
            ->get();

        return response()->json($blogs);
    }

    public function latest(Request $request) : JsonResponse
    {
        $todayDate = date('Y-m-d');
        $blogs = Blog::select('blogs.*')
                 ->whereNotNull('published_at')
                 ->where('published_at', '<', $todayDate)
                 ->where(function ($subquery) use ($todayDate) {
                return $subquery->where('expired_at', '>', $todayDate)
                ->orWhereNull('expired_at');
            })
             ->orderBy('published_at','desc')
            ->limit($request->get('limit', 3))
            ->get();
        return response()->json($blogs);
    }
    

}
