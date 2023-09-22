<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function rateBook(Request $request, $bookId){
        $book = Book::findOrFail($bookId);
        $currentRating = $request->input('rating');

        // Ensure the rating is between 1 and 5
        if($currentRating < 1 || $currentRating > 5) {
            return back()->with('error', 'Invalid rating value.');
        }

        // Check if user already rated the book
        $existingRating = DB::table('book_ratings')->where('book_id', $bookId)->where('user_id', auth()->id())->first();

        if($existingRating) {
            // Update rating
            DB::table('book_ratings')->where('id', $existingRating->id)->update(['rating' => $currentRating]);
        } else {
            // Create new rating
            DB::table('book_ratings')->insert([
                'book_id' => $bookId,
                'user_id' => auth()->id(),
                'rating' => $currentRating,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            $book->increment('rating_count');
        }

        // Update the overall rating for the book
        $book->rating = DB::table('book_ratings')->where('book_id', $bookId)->avg('rating');
        $book->save();

        return back()->with('message', 'Thank you for your rating!');
    }

    public function allBooks(){
        $books = Book::paginate(4);
        return view('web.all_books', compact('books'));
    }

    public function allRatedBooks(){
        $books = Book::paginate(4);
        return view('web.all_rated_books', compact('books'));
    }

}
