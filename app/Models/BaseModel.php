<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    public const ROW_STATUS_INACTIVE = 0;
    public const ROW_STATUS_ACTIVE = 1;
    public const ROW_STATUS_PENDING = 2;
    public const ROW_STATUS_REJECT = 3;

    public const ROW_STATUSES = [
        self::ROW_STATUS_ACTIVE,
        self::ROW_STATUS_INACTIVE,
        self::ROW_STATUS_PENDING,
        self::ROW_STATUS_REJECT,
    ];

    public const ROW_ORDER_ASC = 'ASC';
    public const ROW_ORDER_DESC = 'DESC';

    public const REQUIRED = 'REQUIRED';
    public const DUPLICATE = 'DUPLICATED';

    public const ADMIN_CREATED_USER_DEFAULT_PASSWORD = "121212aA";

    public const PASSWORD_MIN_LENGTH = 8;
    public const PASSWORD_MAX_LENGTH = 20;

    public const SYSTEM_USER = 1;
    public const INSTITUTE_USER = 2;

    public const Users = [
        self::SYSTEM_USER,
        self::INSTITUTE_USER
    ];
}
 