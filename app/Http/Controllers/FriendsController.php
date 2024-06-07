<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendsController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::id())->get();
        $friends = Friends::where('user_id', Auth::id())->with('friend')->get()->pluck('friend');
        return view('friends', compact('users', 'friends'));
    }

    public function store(Request $request)
    {
        $userId = $request->input('user_id');
        $friendId = $request->input('friend_id');

        if (User::where('id', $userId)->exists() && User::where('id', $friendId)->exists()) {
            $friend = new Friends();
            $friend->user_id = $userId;
            $friend->friend_id = $friendId;
            $friend->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Invalid user ID or friend ID'], 422);
        }
    }

    public function destroy($id)
    {
        $friend = Friends::where('user_id', Auth::id())->where('friend_id', $id)->first();

        if ($friend) {
            $friend->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['error' => 'Friend not found'], 404);
        }
    }
}
