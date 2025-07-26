<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    //
    protected $fillable = [
        "name",
        "price",
        "category_id",
        "description",
        "image"
    ];

    function category() {
        return $this->belongsTo(Category::class, "category_id");
    }
}
