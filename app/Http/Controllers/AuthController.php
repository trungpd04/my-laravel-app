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

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('admin.product.list')->with('success', 'Login successful');
        }

        return redirect()->back()->with('error', 'Invalid email or password');
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

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'mssv' => $request->input('mssv'),
            'lopmonhoc' => $request->input('lopmonhoc'),
            'gioitinh' => $request->input('gioitinh'),
        ]);

        if ($user) {
            return redirect()->route('admin.auth.login')->with('success', 'Register successful');
        }

        return redirect()->route('admin.auth.register')->with('error', 'Register failed');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.auth.login')->with('success', 'Logout successful');
    }
}
