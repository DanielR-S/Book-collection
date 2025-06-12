<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Review;

class BookController extends Controller
{
    public function index() {

        return BookResource::collection(Book::all());

    // return BookResource::collection(Book::all());
    }

    public function indexByBookId(Book $book) {

        return $book->reviews;

    // return BookResource::collection(Book::all());
    }


public function store(StoreBookRequest $request,) {
    $book = Book::create($request->validated());

    $books = Book::all();


    return BookResource::collection($books);
}

public function update(StoreBookRequest $request, Book $book) {
    $book->update($request->validated());

    $books = Book::all();
    return BookResource::collection($books);
}

public function destroy(Book $book) {
    $book->delete();
    return response()->json(['message' => 'Boek succesvol verwijderd']);
}

    public function show() {


        $authors = author::all();

        $books = book::all();

        $reviews = review::all();
        return [$authors, BookResource::collection($books)];
    }

}


