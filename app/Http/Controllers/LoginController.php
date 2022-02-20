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
            if(auth()->user()->role_id == 0202){
                $request->session()->regenerate();
                return redirect()->intended('/dashboardadmin');
            }else{
                return back()->with('loginError','Role not allowed');
            }
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
            if(auth()->user()->role_id == 0101){
                $request->session()->regenerate();
                return redirect()->intended('/dashboardgl');
            }
            return back()->with('loginError','Role not allowed');
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
            if(auth()->user()->role_id == 0404){
                $request->session()->regenerate();
                return redirect()->intended('/dashboarduser');
            }
            return back()->with('loginError','Role not allowed');
        } else {
            return back()->with('loginError','Invalid credentials');
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
