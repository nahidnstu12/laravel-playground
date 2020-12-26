<?php

namespace App;
use App\Brand;
use Illuminate\Database\Eloquent\Model;

class Dress extends Model
{
    public function brand(){
        return $this->hasMany(Brand::class);
    }
}
