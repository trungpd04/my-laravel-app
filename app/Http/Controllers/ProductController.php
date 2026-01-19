<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function createProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('/product');
    }

    public function getProduct(?string $id='123')
    {
        $product = Product::find($id);
        return view('product.detail', ['product' => $product]);
    }

    public function listProduct()
    {
        $products = Product::all();
        return view('product.list', ['products' => $products]);
    }

    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('product.edit', ['product' => $product]);
    }
}
