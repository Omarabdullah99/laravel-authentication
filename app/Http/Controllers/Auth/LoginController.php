<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // 1. validate the requested data
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        // 2. authenticate
        $user = User::where('email', $request->email)->first();

        if (! $user || ! password_verify($request->input('password'), $user->password)) {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }

        Auth::login($user, $request->boolean('remember'));

        // 3. redirect to dashboard
        return redirect()->route('dashboard');
    }
}
