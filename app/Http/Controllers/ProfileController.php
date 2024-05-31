<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::id();

        $posts = Posts::with('user')->where('user_id', $user)->latest()->get();
        return view('profile', compact('posts'));
    }
}
