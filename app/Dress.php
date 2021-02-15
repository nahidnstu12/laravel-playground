<?php

namespace App;

// use App\Brand;
use Illuminate\Database\Eloquent\Model;

class Dress extends Model
{
    protected $fillable = ['dress_name','quantity','prices','status','user_id','brand_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function user()
    {
        return $this->belongsTo(App\User::class);
    }
}
