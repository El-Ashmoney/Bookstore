<?php

namespace App\Http\Controllers\Admin;

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
}
