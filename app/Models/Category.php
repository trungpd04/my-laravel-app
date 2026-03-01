<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'image',
        'parent_id',
        'is_active',
        'is_deleted',
    ];

    public static function existParent($parent_id)
    {
        return Category::where('parent_id', $parent_id)->exists();
    }

    public static function couldCreateCycle($category_id, $new_parent_id)
    {
        if ($category_id === $new_parent_id) {
            return true;
        }

        $visited = [];
        $currentId = $new_parent_id;

        while ($currentId !== null) {
            if (in_array($currentId, $visited, true)) {
                return true;
            }
            $visited[] = $currentId;

            if ($currentId === $category_id) {
                return true;
            }

            $current = Category::query()->select(['id', 'parent_id'])->find($currentId);
            if (!$current) {
                return false;
            }

            $currentId = $current->parent_id;
        }

        return false;
    }
}
