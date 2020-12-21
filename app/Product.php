<?php

namespace App;
use App\Category;
use App\Brand;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
