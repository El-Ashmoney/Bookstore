<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if (Auth()->check() && (Auth::user()->role === 'user' || Auth::user()->role === 'instructor')){
            abort(403, 'Unauthorized Access');
        }else{
            $users = User::all();
            return view('admin.users', compact('users'));
        }
    }

    public function edit_user($id){
        if (Auth::user()->role === 'user' || Auth::user()->role === 'instructor'){
            abort(403, 'Unauthorized Access');
        }else{
            $user = User::find($id);
            return view('admin.edit_user', compact('user'));
        }
    }

    public function update_user(Request $request, $id){
        if (Auth::user()->role === 'user' || Auth::user()->role === 'instructor'){
            abort(403, 'Unauthorized Access');
        }else{
            $user = User::find($id);
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->role     = $request->role;
            $user->save();
            return redirect()->route('users')->with('message', 'User Updated Successfully');
        }
    }

    public function delete_user($id){
        if (Auth::user()->role === 'user' || Auth::user()->role === 'instructor'){
            abort(403, 'Unauthorized Access');
        }else{
            $user = User::find($id);
            $user->delete();
            return redirect()->back()->with('message', 'User Deleted Successfully');
        }
    }
}
