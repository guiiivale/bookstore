<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyBookRequest;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function store(StoreBookRequest $request)
    {
        try{
            $book = Book::create($request->validated());
        }
        catch(\Exception $e) {
            return response()->json(
                $response = [
                    'message' => 'Book not created',
                    'success' => false,
                ]
            );
        }

        return response()->json([
            'data' => $book,
            'message' => 'Book created successfully',
        ]);
    }

    public function index()
    {
        $books = Book::all();

        if(!$books) return response()->json(
            $response = [
                'message' => 'No books found',
                'success' => false,
            ]
        );

        return response()->json($books);
    }

    public function update(UpdateBookRequest $request)
    {
        $data = $request->validated();
        $book = Book::find($data['id']);
        if(!$book) {
            return response()->json(
                $response = [
                    'message' => 'Book not found',
                    'success' => false,
                ]
            );
        }
        $book->update($data);

        return response()->json($book);
    }

    public function destroy(DestroyBookRequest $request)
    {
        $data = $request->validated();
        $book = Book::find($data['id']);
        if(!$book) {
            return response()->json(
                $response = [
                    'message' => 'Book not found',
                    'success' => false,
                ]
            );
        }
        $book->delete();
        

        return response()->json(
            $response = [
                'message' => 'Book deleted successfully',
                'success' => true,
            ]
        );
    }
}
