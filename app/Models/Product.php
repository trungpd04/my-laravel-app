<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='products';
    protected $primaryKey='id';
    public $incrementing=true;
    public $timestamps=true;
    
    protected $fillable=[
        'name',
        'price',
        'description',
        'image',
        'category_id',
        'created_at',
        'updated_at',
    ];
}
