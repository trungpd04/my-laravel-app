<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function age(Request $request)
    {
        $request->validate([
            'age' => 'required|integer|min:0|max:150',
        ]);

        session()->put('age', $request->input('age'));

        return redirect()->route('home')->with('success', 'Age verified successfully');
    }
}
