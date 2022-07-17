<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseChapter extends Model
{
    use HasFactory;
    public function  course():BelongsTo{
        return $this->hasMany(Course::class);
    }

    public function  courseLessons():HasMany{
        return $this->hasMany(CourseLessons::class);
    }
}
