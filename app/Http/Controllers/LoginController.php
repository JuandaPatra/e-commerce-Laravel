<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password'=> 'required'
        ]);
 
        if(Auth::attempt($credentials))
        {

            if(Auth::user()->username== 'admin')
            {
                return redirect('/admin');
            }

            $request->session()->regenerate();
            return redirect()->intended('/');
 
        }
        else
        {
 
            return back()->with('loginError', "login failed");
 
        }
 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');    }
}
