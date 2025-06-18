<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use Illuminate\Http\Request;
use App\Models\Review;
use App\Http\Resources\ReviewResource;
use App\Models\Book;


class ReviewController extends Controller
{
    public function index() {
        return ReviewResource::collection(Review::all());
    }

    
   public function destroy(Review $review) {
        $review->delete();
        return response()->json(['message' => 'Review succesvol verwijderd']);
    }

    
    public function update(StoreReviewRequest $request, Review $review) {
        $review->update($request->validated());

        $reviews = Review::all();
        return ReviewResource::collection($reviews);
    }

    // public function store(StoreReviewRequest $request,) {
    //     $review = Review::create($request->validated());

    //     $reviews = Review::all();

    //     $validated->book_id = $book->id;
    //     return StoreReviewRequest::collection($reviews);
    // }

    public function store(StoreReviewRequest $request) {
        $review = Review::create($request->validated());

        $reviews = Review::all();
        return ReviewResource::collection($reviews);
    }
}
