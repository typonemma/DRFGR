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
        return view('login', ['title' => 'Login Admin']);
    }
    public function authenticate(StoreLogin $request)
    {
        $validatedUser = $request->validated();
        if(Auth::attempt($validatedUser)){
            if(auth()->user()->role_id == '0202'){
                $request->session()->regenerate();
                return redirect()->intended('/dashboardadmin');
            }else if(auth()->user()->role_id == '0404'){
                $request->session()->regenerate();
                return redirect()->intended('/dashboarduser');
            }else if(auth()->user()->role_id == '0101'){
                $request->session()->regenerate();
                return redirect()->intended('/dashboardgl');
            }
            else{
                
                return back()->with('loginError','Role not allowed');
            }
        }
        return back()->with('loginError','Invalid credentials');
    }
    // END LOGIN ADMIN

    // LOGIN GL
    public function indexGL()
    {
        return view('login', ['title' => 'Login GL']);
    }
    // END LOGIN GL

    // LOGIN USERS
    public function indexUser()
    {
        return view('login', ['title' => 'Login User']);
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
