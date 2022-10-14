<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModelUtil
{
    const STATUS_FAIL = 0;
    const STATUS_TRUE = 1;

    const USER      = 'App\Models\Entities\User';           //會員
    const PURCHASER = 'App\Models\Entities\Purchaser';      //訪客
}
