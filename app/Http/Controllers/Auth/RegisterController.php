<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {

        //validated input
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        //database e data save
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),

        ]);

        // redirect to dashboard
        return redirect()->route('dashboard');
    }
}
