<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseLessons extends Model
{
    use HasFactory;
    protected $fillable = [ 'lesson_title', 'lesson_duration'];

//    public function  courseLesson():BelongsTo{
//        return $this->belongsTo(CourseLessons::class);
//    }
    public function  courseChapter():BelongsTo{
        return $this->belongsTo(CourseChapter::class);
    }
}
