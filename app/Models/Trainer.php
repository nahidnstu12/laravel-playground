<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use softDeletes;
    use HasFactory;
    protected $guarded = ['id'];
    public function  courses(){
        return $this->hasMany(Course::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
