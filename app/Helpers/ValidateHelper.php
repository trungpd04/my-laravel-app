<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
class ValidateHelper
{
    public static function validateCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'parent_id' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'is_deleted' => 'nullable|boolean',
        ]);

        $id = $request->input('id');
        if ($id) {
            $category = Category::find($id);
            if (!$category) {
                throw new \Exception('Category not found');
            }
        }

        if ($request->has('parent_id') && $request->input('parent_id') != null) {
            $parent_id = $request->input('parent_id');
            $parent_category = Category::find($parent_id);
            if (!$parent_category) {
                throw new \Exception('Parent category not found');
            }
        }

        if ($request->has('id') && $request->input('id') != null) {
            $id = $request->input('id');
            $parent_id = $request->input('parent_id');
            $category = Category::find($id);
            if (!$category) {
                throw new \Exception('Category not found');
            }

            if ($id == $parent_id) {
                throw new \Exception('Parent category cannot be the same as the current category');
            }

            if (!Category::couldCreateCycle($id, $parent_id)) {
                throw new \Exception('Parent category would create a loop');
            }
        }
    }

    public static function validateProduct(Request $request, $id = null)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'nullable|integer',
        ]);

        if ($id) {
            $product = Product::find($id);
            if (!$product) {
                throw new \Exception('Product not found');
            }
        }
    }
}