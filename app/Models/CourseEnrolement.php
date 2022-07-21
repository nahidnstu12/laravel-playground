<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseEnrolement extends Pivot
{
    use HasFactory;
    protected $table = 'course_enrolements';
    
    public function student(): HasMany
    {
        return $this->hasMany(Student::class, "student_id", "id");
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
