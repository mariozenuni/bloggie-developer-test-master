<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Review;
class ReviewsController extends Controller
{

    public function index()
    {
        $now = Carbon::now();
        $testimonials = Review::query()
                ->whereNotNull('created_at')
                ->where('created_at', '<=', $now)
                ->orderBy('created_at', 'desc')
                ->paginate(12);

        return view('website.reviews.index')->with([
            'testimonials' => $testimonials
        ]);
    }
    
}
