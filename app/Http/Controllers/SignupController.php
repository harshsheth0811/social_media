<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($request->hasFile('profile_picture')) {
            $profileImage = $request->file('profile_picture');
            $imageName = time() . '_' . $profileImage->getClientOriginalName();
            $profileImage->move(public_path('profile_picture'), $imageName);
        } else {
            $imageName = null;
        }

        $user = $request->all();

        User::create([
            'username' => $user['username'],
            'email' => $user['email'],
            'profile_picture' => $imageName,
            'password' => Hash::make($user['password']),
        ]);

        return redirect('/login')->with('Success', 'You are Registered!, Now You are Login');
    }
}
