<?php

namespace App\Models;

class BaseModel
{
    public const ROW_STATUS_ACTIVE = '1';
    public const ROW_STATUS_INACTIVE = '0';
    public const ROW_STATUS_DELETED = '99';

    public const USER_TYPES = [
        'SUPER' => 1,
        'YOUTH' => 2,
        'EMPLOYER' => 3,
        'TSP' => 4,
    ];
}
