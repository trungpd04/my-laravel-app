<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::orderBy('created_at', 'desc')->take(8)->get();

        return view('customer.home', [
            'featuredProducts' => $featuredProducts
        ]);
    }
}
