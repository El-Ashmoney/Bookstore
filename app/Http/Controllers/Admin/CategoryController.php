<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        if (Auth::user()->role === 'admin' || Auth::user()->role === 'instructor'){
            $categories = Category::paginate(3);
            return view('admin.categories', compact('categories'));
        }else{
            return redirect('login');
        }
    }

    public function add_category(Request $request){
        if(auth()->check() && Auth::user()->role === 'user'){
            abort(403, 'Unauthorized Access');
        }else{
            $categories = new Category;
            $categories->name = $request->name;
            if ($request->hasFile('picture')) {
                $path = $request->file('picture')->store('pictures', 'public');
                $categories->picture = $path;  // or $category->picture = $path;
            }
            $categories->save();
            return redirect()->back()->with('message', 'Category Added Successfully');
        }
    }

    public function edit_category($id){
        if (auth()->check() && Auth::user()->role === 'user'){
            abort(403, 'Unauthorized Access');
        }else{
            $categories = Category::find($id);
            return view('admin.edit_category', compact('categories'));
        }
    }

    public function update_category(Request $request, $id){
        $request->validate([
            'picture' => 'sometimes|image|max:2048'  // max size of 2MB for the image
        ]);
        if (Auth()->check() && Auth::user()->role === 'user'){
            abort(403, 'Unauthorized Access');
        }else{
            $categories = Category::find($id);
            $categories->name = $request->name;
            // Handling the picture upload
            if ($request->hasFile('picture')) {
                // If there's an existing picture, delete it
                if ($categories->picture) {
                    Storage::disk('public')->delete($categories->picture);
                }
                $picturePath = $request->file('picture')->store('category_pictures', 'public');
                $categories->picture = $picturePath;
            }

            $categories->save();
            return redirect()->route('categories')->with('message', 'Category Updated Successfully');
        }
    }

    public function delete_category($id){
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
}
