<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image'
    ];
}
