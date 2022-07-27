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
    protected $fillable = ['enrolment_date', 'tsp_approval'];

    public const ENROLEMENT_STATUS = [
        'Pending' => 0,
        'Approve' => 1,
        'Reject' => 2
    ];

    public static function enrolementStatus(): array
    {
        return [
            self::ENROLEMENT_STATUS['Pending'] => 'Pending',
            self::ENROLEMENT_STATUS['Approve'] => 'Approve',
            self::ENROLEMENT_STATUS['Reject'] => 'Reject',
        ];
    }

    public function student(): BelongsTo
    {
//        return $this->hasMany(Student::class, "student_id", "id");
        return $this->belongsTo(Student::class,"student_id", "id");
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
