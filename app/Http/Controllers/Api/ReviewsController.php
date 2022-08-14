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
        $testimonials = Review::whereNotNull('created_at')
                 ->where('created_at', '<=', $now)
            ->orderBy('created_at', 'desc')
            ->limit($request->get('limit', 3))
           ->get();
        return response()->json($testimonials);
    }

}
