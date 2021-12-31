<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $password = Hash::make($request->password);

        $checkUser = User::where('email', $request->email)->first();

        if(!$checkUser){
            $new_user = new User();
            $new_user->username = $request->username;
            $new_user->email = $request->email;
            $new_user->password = $password;
            $new_user->save();
            
            return view('login')->with('loginSuccess', 'Username has added');
        };

        return back()->with('failRegister', 'Email/Username not available');

        // $credentials = $request->validate([
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password'=> 'required'
        // ]);





    }
}
