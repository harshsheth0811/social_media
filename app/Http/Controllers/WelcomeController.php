<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $posts = Posts::with('user')->latest()->get();
        return view('welcome', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'post_images' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('post_images')) {
            $postImage = $request->file('post_images');
            $imageName = time() . '_' . $postImage->getClientOriginalName();
            $postImage->move(public_path('post_images'), $imageName);
        } else {
            $imageName = null;
        }

        $post = Posts::create([
            'description' => $request->description,
            'post_image' => $imageName,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json([
            'success' => true,
            'post' => $post->load('user'),
            'post_image_url' => $imageName ? asset('post_images/' . $imageName) : null
        ]);
    }
}