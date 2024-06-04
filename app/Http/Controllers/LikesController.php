<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function like(Request $request)
    {
        $post = Posts::findOrFail($request->posts_id);

        if (!$post->likes()->where('user_id', Auth::id())->exists()) {
            Likes::create([
                'user_id' => Auth::id(),
                'posts_id' => $request->posts_id,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Post liked',
            'like_count' => $post->likes()->count(),
        ]);
    }

    public function unlike(Request $request)
    {
        $post = Posts::findOrFail($request->posts_id);

        $like = $post->likes()->where('user_id', Auth::id())->first();
        if ($like) {
            $like->delete();
        }

        return response()->json([
            'success' => true,
            'message' => 'Post unliked',
            'like_count' => $post->likes()->count(),
        ]);
    }
}
