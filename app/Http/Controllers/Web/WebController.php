<?php

namespace App\Http\Controllers\Web;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    public function index(){
        $books                      = Book::all();
        $categories                 = Category::withCount('books')->get();
        $users                      = User::all();
        $allUsers                   = User::count();
        $formattedAllUsersCount     = number_format($allUsers);
        $usersCount                 = User::where('role', '=', 'user')->count();
        $formattedUsersCount        = number_format($usersCount);
        $instructorCount            = User::where('role', '=', 'instructor')->count();
        $formattedInstructorCount   = number_format($instructorCount);
        $recentBooks                = Book::orderBy('created_at', 'desc')->limit(8)->get();
        $topRatedBooks              = Book::orderBy('rating', 'desc')->limit(8)->get();
        $topBooks                   = Book::where('rating', '=', 5)->count();
        $formattedTopBooks          = number_format($topBooks);
        return view('web.index',
            compact(
                'books',
                'categories',
                'users',
                'recentBooks',
                'topRatedBooks',
                'formattedAllUsersCount',
                'formattedUsersCount',
                'formattedInstructorCount',
                'formattedTopBooks'
            )
        );
    }

    public function showCategoryBooks($id){
        $category   = Category::findOrFail($id);
        $books      = $category->books;
        return view('web.category_books', compact('category', 'books'));
    }

    public function bookDetails($id){
        $book = Book::findOrFail($id);
        return view('web.book_details', compact('book'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $book = Book::all();
        $books = Book::where('title', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(4);
        return view('web.search_results', ['books' => $books, 'query' => $query, compact('book')]);
    }

}
