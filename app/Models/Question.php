<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
       'title',
        'slug',
        'ques_body',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Answers():HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
