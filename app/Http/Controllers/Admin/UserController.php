<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        if (Auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $users = User::all();
            return view('admin.users', compact('users'));
        }
    }

    public function edit_user($id){
        if (Auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $user = User::find($id);
            return view('admin.edit_user', compact('user'));
        }
    }

    public function update_user(Request $request, $id){
        if (auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $user = User::find($id);
            $user->name     = $request->name;
            $user->email    = $request->email;
            $user->is_admin = $request->userType;
            $user->save();
            return redirect()->back()->with('message', 'User Updated Successfully');
        }
    }

    public function delete_user($id){
        if (auth()->check() && Auth::user()->is_admin != 1){
            abort(403, 'Unauthorized Access');
        }else{
            $user = User::find($id);
            $user->delete();
            return redirect()->back()->with('message', 'User Deleted Successfully');
        }
    }
}
