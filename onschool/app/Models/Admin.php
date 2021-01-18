<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, LaratrustUserTrait, SoftDeletes;

    protected $guard    = 'admin';
    protected $fillable = ['name', 'email', 'password',];
    protected $hidden   = ['password', 'remember_token',];
    protected $casts    = ['email_verified_at' => 'datetime',];

    public function getImagePathAttribute()
    {
        if($this->image == 'admin.jpg')
        {
            return asset('uploads/default/' . $this->image);
        }
        return asset('uploads/images/admins/' . $this->image);
    } // To Return The Image Path
}
