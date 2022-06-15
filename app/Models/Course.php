<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{

    protected $table = 'courses';
    use softDeletes;
    use HasFactory;

    protected  $guarded = BaseModel::COMMON_GUARDED_FIELDS_ONLY_SOFT_DELETE;
    public  function  trainer():BelongsTo{
        return $this->belongsTo(Trainer::class);
    }

}
