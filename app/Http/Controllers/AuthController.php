<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $password = $request->password;
        $email = $request->email;
        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        if (Hash::check($password, $user->password)) {
            Auth::login($user);
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Invalid password');
        }
    }

    public function register(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        return redirect()->route('login');
    }
    
    public function profile() {
        
        return response()->json([
            'message' => 'Profile fetched successfully',
            'data' => Auth::user(),
        ]);
    }
}
