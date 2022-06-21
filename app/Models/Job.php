<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public const JOB_CATEGORY = [
        'Accounting'=>1,
        'Engineering'=>2,
        'Garments'=>3,
        'Marketing'=>4,
        ];
    public const JOB_STATUS = [
        'draft'=>1,
        'published'=>2,
        'expired'=>3,
        'archived'=>4
    ];
    public const SALARY_INFO = [
        'show_salary'=>1,
        'show_nothing'=>2,
        'negotiable'=>3
    ];

    public function jobCategory():array{
        return [
            self::JOB_CATEGORY['Accounting'] => 'Accounting',
            self::JOB_CATEGORY['Engineering'] => 'Engineering',
            self::JOB_CATEGORY['Garments'] => 'Garments',
            self::JOB_CATEGORY['Marketing'] => 'Marketing',
        ];
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);

    }
}
