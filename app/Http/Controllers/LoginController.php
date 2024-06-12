<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function googlelogin()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('google_id', $googleUser->getId())->first();
            if (!$user) {
                // If user does not exist, create a new profile
                $newUser = User::create([
                    'username' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'profile_picture' => $googleUser->getAvatar() ?: null,
                    'google_id' => $googleUser->getId(),
                ]);
                Auth::login($newUser);
                return redirect()->intended('/');
            } else {
                // If user exists, log them in
                Auth::login($user);
                return redirect()->intended('/');
            }
        } catch (\Exception $e) {
            Log::error('Something went wrong: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function googlelogincallback()
    {
        return Socialite::driver('google')->redirect();
    }
    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credential)) {
            Session::regenerate();
            return redirect()->intended('/');
        }
        return redirect()->intended('login')->with('error', 'Email or Password does not Match');
    }
}
