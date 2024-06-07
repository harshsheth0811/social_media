<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Posts;

class CommentsController extends Controller
{
    public function index($postId)
    {
        $post = Posts::find($postId);
        if ($post) {
            $comments = $post->comments()->with('user')->get();
            return response()->json(['success' => true, 'comments' => $comments]);
        } else {
            return response()->json(['success' => false, 'message' => 'Post not found.']);
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|max:255',
        ]);

        $comment = new Comments();
        $comment->post_id = $validated['post_id'];
        $comment->user_id = auth()->id();
        $comment->content = $validated['content'];
        $comment->save();

        $comment->load('user');

        return response()->json(['success' => true, 'comment' => $comment]);
    }
}
