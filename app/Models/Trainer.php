<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trainer extends Model
{
    use softDeletes;
    use HasFactory;
    protected $guarded = ['id']; //why do this?
    protected $casts = []; //why do this?
    protected $fillable = ['name'];


    public function  courses():HasMany{
        return $this->hasMany(Course::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
