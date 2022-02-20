<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreLogin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // LOGIN ADMIN
    public function index()
    {
        return view('login');
    }
    public function authenticateAdmin(StoreLogin $request)
    {
        $validatedUser = $request->validated();
        if(Auth::attempt($validatedUser)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboardadmin');
        }
        return back()->with('loginError','Invalid credentials');
    }
    // END LOGIN ADMIN

    // LOGIN GL
    public function indexGL()
    {
        return view('loginGL');
    }
    public function authenticateGL(StoreLogin $request)
    {
        $validatedUser = $request->validated();
        if(Auth::attempt($validatedUser)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboardgl');
        }
        return back()->with('loginError','Invalid credentials');
    }
    // END LOGIN GL

    // LOGIN USERS
    public function indexUser()
    {
        return view('loginuser');
    }
    public function authenticateUser(StoreLogin $request)
    {
        $validatedUser = $request->validated();
        if (Auth::attempt($validatedUser)) {
            return redirect('/dashboarduser');
        } else {
            return redirect('/login')->with('error', 'Invalid credentials');
        }
    }
    // END LOGIN USERS

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
