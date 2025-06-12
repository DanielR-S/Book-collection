<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use app\Http\Requests\StoreReviewRequest;

class ReviewController extends Controller
{
    public function index() {
        return StoreReviewRequest::collection(Review::all());
    }

    // public function store(StoreReviewRequest $request, $book_id) {
    //     $review = Review::create($request->validated());

    //     $reviews = Review::all();

    //     $validated->book_id = $book->id;
    //     return StoreReviewRequest::collection($reviews);
    // }


}
