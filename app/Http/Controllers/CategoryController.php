<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Helpers\ImageHelper;
use App\Helpers\ValidateHelper;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('admin.category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        ValidateHelper::validateCategory($request);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->image = ImageHelper::uploadImage($request, 'category-images');
        $category->parent_id = $request->parent_id;
        $category->is_active = $request->is_active;
        $category->is_deleted = $request->is_deleted;

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category = Category::find($id);
        $categories = Category::all();
        return view('admin.category.edit', ['category' => $category, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        ValidateHelper::validateCategory($request);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        if ($request->hasFile('image')) {
            ImageHelper::deleteImage('category-images', $category->image);
            $category->image = ImageHelper::uploadImage($request, 'category-images');
        }
        $category->parent_id = $request->parent_id;
        $category->is_active = $request->is_active;
        $category->is_deleted = $request->is_deleted;
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.category.index')->with('error', 'Category not found');
        }
        $category->is_deleted = 1;
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'Category deleted successfully!');
    }

    public function getCategoryImage($filename)
    {
        return ImageHelper::getImage('category-images', $filename);
    }
}
