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
        $books              = Book::all();
        $categories         = Category::withCount('books')->get();
        $users              = User::all();
        $usersCount         = User::where('role', '=', 'user')->count();
        $instructorCount    = User::where('role', '=', 'instructor')->count();
        $recentBooks        = Book::orderBy('created_at', 'desc')->limit(8)->get();
        $topRatedBooks      = Book::orderBy('rating', 'desc')->limit(8)->get();
        $topBooks           = Book::where('rating', '=', 5)->count();
        return view('web.index', compact('books', 'categories', 'users', 'recentBooks', 'topRatedBooks', 'topBooks', 'usersCount', 'instructorCount'));
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

}
