<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function register(Request $request)
    {

        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|min:6|confirmed',
            'mobile_phone'        => 'required|string|max:20',
        ]);

        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password),
            'mobile_phone' => $request->mobile_phone,
            'role'         => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }




    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->with(
            'error',
            'Invalid email or password.'
        );
    }
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home')->with('error', 'You are already logged in.');
        }
        return view('user.login');
    }



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken(); 

        return redirect('/login');
    }
}
