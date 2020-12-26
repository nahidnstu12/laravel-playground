<?php

namespace App;
use App\Dress;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function dress(){
        return $this->belongsTo(Dress::class);
    }
}
