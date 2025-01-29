<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'age_category_id',
        'sales_category_id',
        'image',
        'discount',
    ];
}
