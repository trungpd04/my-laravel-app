<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
class Product extends Model
{

    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, Notifiable;
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category_id',
        'created_at',
        'updated_at',
    ];
}
