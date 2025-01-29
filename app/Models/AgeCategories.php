<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgeCategories extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image'
    ];
}
