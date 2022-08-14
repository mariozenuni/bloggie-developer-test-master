<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Review\ReviewPostRequest;
use App\Http\Requests\Admin\Review\ReviewUpdateRequest;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

    public function create(Review $review)
    {
       return view('admin.reviews.create');
    }

     public function edit(Review $review)
      {
         return view('admin.reviews.edit')->with([
             'review' =>  $review
         ]);
    }

    public function index(Request $request)
    {
        $reviews = Review::query();

        if ($request->get('search')) {
                     $reviews->where('message', 'like', '%' . $request->get('search') . '%');
                 }
                   $reviews = $reviews
                      ->orderBy('message', 'asc')
                      ->paginate(12);
             
                   return view('admin.reviews.index')->with([
                         'reviews' => $reviews,
                    ]);         
           
    }

      public function store(ReviewPostRequest $request)
     {
        $review = Review::create($request->validated());

        return redirect(route('admin.reviews.edit', $review))->with([
           'success' => 'Successfully Created a new Customer Review.'
       ]);
     }

     public function update(ReviewUpdateRequest $request, Review $review)
     {
         $review->update($request->validated());
         $review->refresh();

        return redirect(route('admin.reviews.edit', $review))->with([
             'success' => 'Successfully Edited the Customer Review.'
         ]);
     }
}
