<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseLessons extends Model
{
    use HasFactory;
    public function  courseLesson():BelongsTo{
        return $this->hasMany(CourseLessons::class);
    }
    public function  courseChapter():HasMany{
        return $this->hasMany(CourseChapter::class);
    }
}
