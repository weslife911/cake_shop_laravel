<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = [
        "blogTitle",
        "category_id",
        "image",
        "introductionText",
        "mainImage",
        "mainContent",
        "serves",
        "prepTime",
        "cookTime",
        "ingredients",
        "directions",
        "blogTags"
    ];

    protected $casts = [
        'ingredients' => 'array',
        'directions' => 'array',
    ];
}
