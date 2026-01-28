<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'mssv' => 'nullable|string|max:20',
            'lopmonhoc' => 'nullable|string|max:100',
            'gioitinh' => 'nullable|string|in:Nam,Nữ,Khác',
        ]);

        if ($request->input('password') !== $request->input('password_confirmation')) {
            return redirect()->back()->with('error', 'Passwords do not match')->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'mssv' => $request->input('mssv'),
            'lopmonhoc' => $request->input('lopmonhoc'),
            'gioitinh' => $request->input('gioitinh'),
        ]);

        return redirect()->route('auth.login')->with('success', 'Register successful');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout successful');
    }
}
