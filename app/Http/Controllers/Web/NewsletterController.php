<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscriptions,email',
        ]);

        \App\Models\NewsletterSubscription::create([
            'email' => $request->email,
        ]);

        return back()->with('message', 'Subscribed successfully!');
    }
}
