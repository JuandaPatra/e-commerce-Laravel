<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        // return $user;

        return view('profile', compact('user'));
    }

    public function edit(Request $request)
    {
        // return $request;
        $user = User::where('id', Auth::user()->id)->first();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->update();

        return redirect('profile');
        



        
    }
}
