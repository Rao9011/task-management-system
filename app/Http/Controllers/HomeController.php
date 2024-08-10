<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    function login()
    {
        return view('admin.Auth.login');
    }
    function signup()
    {
        return view('admin.Auth.signup');
    }

    public function register(Request $request)
    {

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        // Log the user in
        Auth::login($user);

        // Redirect to the admin dashboard
        return redirect()->route('admin.dashboard');
    }

    public function Authlogin(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to the admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // If login fails, redirect back to login with an error message
        return redirect()->route('login')->withErrors('Invalid credentials');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    public  function index()
    {
        $auth = Auth::user()->name;
        return view('admin.module.index', compact('auth'));
    }
}
