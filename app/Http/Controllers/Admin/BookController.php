<?php

namespace App\Http\Controllers\admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'book_file' => 'required|mimes:pdf|max:40960'  // max size of 10MB for the PDF
        ]);
        if (Auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $book = new Book;
            $book->title        = $request->title;
            $book->author       = $request->author;
            $book->description  = $request->description;
            $book->price        = $request->price;
            $book->category_id  = $request->category_id;
            if ($request->hasFile('book_file')) {
                $bookFile = $request->file('book_file');
                $filename = time() . '.' . $bookFile->getClientOriginalExtension();
                $bookFile->storeAs('books', $filename, 'public');  // Store in 'books' directory inside 'storage/app/public'
                $book->book_file = 'books/' . $filename;
            }
            $book->save();
            return redirect()->back()->with('message', 'Book Added Successfully');
        }
    }

    public function edit_book($id){
        if (Auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $book = Book::find($id);
            $categories = Category::all();
            return view('admin.edit_book', compact('book', 'categories'));
        }
    }

    public function update_book(Request $request, $id){
        $request->validate([
            'book_file' => 'sometimes|mimes:pdf|max:40960'  // max size of 10MB for the PDF
        ]);
        if (Auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $book = Book::find($id);
            $book->title        = $request->title;
            $book->author       = $request->author;
            $book->description  = $request->description;
            $book->price        = $request->price;
            $book->category_id  = $request->category_id;
            if ($request->hasFile('book_file')) {
                // If there's an existing book file, delete it
                if ($book->book_file) {
                    Storage::disk('public')->delete($book->book_file);
                }
                $bookFile = $request->file('book_file');
                $filename = time() . '.' . $bookFile->getClientOriginalExtension();
                $bookFile->storeAs('books', $filename, 'public');  // Store in 'books' directory inside 'storage/app/public'
                $book->book_file = 'books/' . $filename;
            }
            $book->save();
            return redirect()->route('books')->with('message', 'Book Updated Successfully');
        }
    }

    public function delete_book($id){
        $book = Book::find($id);
        // Delete the book's PDF file from storage if it exists
        if ($book->book_file) {
            Storage::disk('public')->delete($book->book_file);
        }
        $book->delete();
        return redirect()->back()->with('message', 'Book Deleted Successfully');
    }
}
