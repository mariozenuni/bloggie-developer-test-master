<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function latest(Request $request) : JsonResponse
    {
        $now = Carbon::now();
        $testimonials = Review::select('reviews.*')
                 ->whereNotNull('created_at')
                 ->where('created_at', '<', $now)
                 ->limit($request->get('limit', 3))
                 ->get();
        return response()->json($testimonials);
    }

}
