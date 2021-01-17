<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashSafe extends Model
{
    protected $tables = ['chashsafes'];
    protected $guard = ['id'];
    protected $fillable = ['wages', 'purchases', 'sales', 'pettycash', 'time'];
    protected $date = ['created_at', 'updated_at'];
}
