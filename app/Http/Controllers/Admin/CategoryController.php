<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        if (Auth::user()->is_admin == 1){
            $categories = Category::all();
            return view('admin.categories', compact('categories'));
        }else{
            return redirect('login');
        }
    }

    public function add_category(Request $request){
        if(Auth::user()->is_admin != 1){
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
}
