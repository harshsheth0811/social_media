<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::id();

        $posts = Posts::with('user')->where('user_id', $user)->latest()->get();
        $users = User::where('id', '!=', Auth::id())->get();
        return view('profile', compact('posts','users'));
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $post = Posts::find($id);

        if ($request->hasFile('post_image')) {
             $imageName = time() . '.' . $request->post_image->extension();
            $request->post_image->move(public_path('post_images'), $imageName);
            $post->post_image = $imageName;
        }

        $post->description = $request->description;
        $post->save();

        return response()->json(['success' => true, 'post' => $post]);
    }
}
