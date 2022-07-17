<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    public function courses():BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_enrolments', 'student_id', 'course_id'  )->withPivot('id as enrolment_id', 'tsp_approval',  'enrolment_date', 'row_status')->withTimestamps();
    }
}
