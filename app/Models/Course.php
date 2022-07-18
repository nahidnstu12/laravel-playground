<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{

    protected $table = 'courses';
    use softDeletes;
    use HasFactory;


    public  function  trainer():BelongsTo
    {
        return $this->belongsTo(Trainer::class);
    }

    public  function  courseChapters():HasMany
    {
        return $this->hasMany(CourseChapter::class);
    }

    public function students():BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'course_enrolments', 'course_id', 'student_id')->withPivot('tsp_approval', 'enrolment_date', 'row_status')->withTimestamps();
    }

}
