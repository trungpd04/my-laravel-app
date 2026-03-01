<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class ImageHelper
{
    public static function uploadImage(Request $request, $path)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();

                // Store image in storage/app/private/product-images
                $image->move(storage_path('app/private/' . $path), $imageName);

                // Save the image URL path to database
                return '/' . $path . '/' . $imageName;
            }
        } catch (\Exception $e) {
            Log::error('Error uploading image: ' . $e->getMessage());
            return null;
        }
    }

    public static function getImage($path, $filename)
    {
        $path = storage_path('app/private/' . $path . '/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }

    public static function deleteImage($path, $filename)
    {
        try {
            $oldImagePath = str_replace('/' . $path . '/', '', $filename);
            $oldImageFullPath = storage_path('app/private/' . $path . '/' . $oldImagePath);
            if (file_exists($oldImageFullPath)) {
                unlink($oldImageFullPath);
            }
        } catch (\Exception $e) {
            Log::error('Error deleting image: ' . $e->getMessage());
        }
    }
}