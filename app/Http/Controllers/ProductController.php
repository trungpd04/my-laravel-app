<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Helpers\ImageHelper;
use App\Helpers\ValidateHelper;

class ProductController extends Controller
{
    //
    public function createProduct(Request $request)
    {
        // Validate the request
        ValidateHelper::validateProduct($request);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        $product->image = ImageHelper::uploadImage($request, 'product-images');

        $product->save();

        return redirect('/product')->with('success', 'Product created successfully!');
    }

    public function getProduct(?string $id = '123')
    {
        $product = Product::find($id);
        return view('admin.product.detail', ['product' => $product]);
    }

    public function listProduct(Request $request)
    {
        $products = Product::orderBy('id', 'asc')->paginate(10);
        return view('admin.product.list', ['products' => $products]);
    }

    public function editProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        return view('admin.product.edit', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404, 'Product not found');
        }

        // Validate the request
        ValidateHelper::validateProduct($request, $id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                ImageHelper::deleteImage('product-images', $product->image);
            }

            $product->image = ImageHelper::uploadImage($request, 'product-images');
        }

        $product->save();

        return redirect()->route('admin.product.list')->with('success', 'Product updated successfully!');
    }

    public function getProductImage($filename)
    {
        return ImageHelper::getImage('product-images', $filename);
    }

}
