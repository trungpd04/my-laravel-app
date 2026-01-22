<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        if (!Hash::check($password, $user->password)) {
            return redirect()->back()->with('error', 'Invalid password');
        }

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Login successful');
    }

    public function register(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        if ($user) {
            return redirect()->back()->with('error', 'User already exists');
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('auth.login')->with('success', 'Register successful');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout successful');
    }
}
