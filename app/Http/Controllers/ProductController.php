<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    //
    public function createProduct(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'nullable|integer',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store image in storage/app/private/product-images
            $image->move(storage_path('app/private/product-images'), $imageName);

            // Save the image URL path to database
            $product->image = '/product/image/' . $imageName;
        }

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'nullable|integer',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->category_id = $request->category_id;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image) {
                $oldImagePath = str_replace('/product/image/', '', $product->image);
                $oldImageFullPath = storage_path('app/private/product-images/' . $oldImagePath);
                if (file_exists($oldImageFullPath)) {
                    unlink($oldImageFullPath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store image in storage/app/private/product-images
            $image->move(storage_path('app/private/product-images'), $imageName);

            // Save the image URL path to database
            $product->image = '/product/image/' . $imageName;
        }

        $product->save();

        return redirect()->route('admin.product.list')->with('success', 'Product updated successfully!');
    }

    public function getProductImage($filename)
    {
        $path = storage_path('app/private/product-images/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
}
