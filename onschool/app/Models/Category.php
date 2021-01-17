<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $tables = ['categories'];
    protected $guard = ['id'];
    protected $fillable = ['name', 'font'];
    protected $date = ['created_at', 'updated_at'];
    
}
