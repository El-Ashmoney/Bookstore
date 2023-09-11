<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(){
        if (Auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $categories = Category::all();
            $books = Book::all();
            return view('admin.books', compact('categories', 'books'));
        }
    }

    public function add_book(Request $request){
        if (Auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $book = new Book;
            $book->title        = $request->title;
            $book->author       = $request->author;
            $book->description  = $request->description;
            $book->price        = $request->price;
            $book->category_id  = $request->category_id;
            $book->save();
            return redirect()->back()->with('message', 'Book Added Successfully');
        }
    }
}
