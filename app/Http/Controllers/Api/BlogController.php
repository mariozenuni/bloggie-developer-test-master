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
        $todayDate = date('Y-m-d');
        $blogs = Blog::select('blogs.*')
           ->whereNotNull(['published_at','featured_at'])
            ->where('published_at', '<', $todayDate)
            ->where('featured_at', '<',  $todayDate)
            ->where(function ($subquery) use ( $todayDate) {
                return $subquery->where('expired_at', '>', $todayDate)
                ->orWhereNull('expired_at');
            })
            ->orderBy('featured_at', 'desc')
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
