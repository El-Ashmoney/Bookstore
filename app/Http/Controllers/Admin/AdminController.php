<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(auth()->check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'instructor')){
            return view('admin.index');
        }else{
            abort(403, 'Unauthorized Access');
        }
    }

    public function search(Request $request){
        $query = $request->input('query');
        $book = Book::all();
        $books = Book::where('title', 'LIKE', "%{$query}%")
            ->orWhere('author', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(9);
        return view('admin.search_results', ['books' => $books, 'query' => $query, compact('book')]);
    }
}
