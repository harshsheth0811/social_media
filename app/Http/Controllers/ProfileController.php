<?php

namespace App\Http\Controllers;

use App\Models\Friends;
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
        $friends = Friends::where('user_id', Auth::id())->pluck('friend_id')->toArray();
        $notification = auth()->user()->notifications;
        return view('profile', compact('posts', 'users', 'friends', 'notification'));
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

    public function upd_profile(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $user = User::find($id);

        if ($request->hasFile('profile_picture')) {
            $imageName = time() . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('profile_picture'), $imageName);
            $user->profile_picture = $imageName;
        }

        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return response()->json(['success' => true, 'user' => $user]);
    }
}
