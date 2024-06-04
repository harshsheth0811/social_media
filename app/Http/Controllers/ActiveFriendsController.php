<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActiveFriendsController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('leftside', compact('users'));
    }
}
