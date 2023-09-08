<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        if (auth()->check() && Auth::user()->is_admin == 1){
            $categories = Category::all();
            return view('admin.categories', compact('categories'));
        }else{
            return redirect('login');
        }
    }

    public function add_category(Request $request){
        if(auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $categories = new Category;
        $categories->name = $request->name;
        $categories->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function edit_category($id){
        if (auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $categories = Category::find($id);
            return view('admin.edit_category', compact('categories'));
        }
    }

    public function update_category(Request $request, $id){
        if (Auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $categories = Category::find($id);
            $categories->name = $request->name;
            $categories->save();
            return redirect()->back()->with('message', 'Category Updated Successfully');
        }
    }

    public function delete_category($id){
        if (Auth()->check() && Auth::user()->is_admin !=1){
            abort(403, 'Unauthorized Access');
        }else{
            $categories = Category::find($id);
            $categories->delete();
            return redirect()->back()->with('message', 'Category Deleted Successfully');
        }
    }
}
