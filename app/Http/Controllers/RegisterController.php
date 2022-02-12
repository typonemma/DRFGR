<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRegister;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(StoreRegister $request)
    {
        $validatedUser = $request->validated();
        $validatedUser['password'] = Hash::make($validatedUser['password']);
        $validatedUser['role_id'] = "0404";
        User::create($validatedUser);
        return redirect('/login')->with('success','Registration was successful! Please login');
    }
}
