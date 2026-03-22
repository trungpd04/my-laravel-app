<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\ImageHelper;

class CustomerProductController extends Controller
{
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);

        $related = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('customer.product.detail', [
            'product' => $product,
            'related' => $related,
        ]);
    }

    public function image(string $filename)
    {
        return ImageHelper::getImage('product-images', $filename);
    }
}
