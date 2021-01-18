<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait, HasFactory, Notifiable, SoftDeletes;

    protected $guard = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'username', 'email', 'phone', 'password', 'image', ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [ 'password', 'remember_token', ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [ 'email_verified_at' => 'datetime', ];

    public function getCreatedAtAttribute($date)
    {
        // return Carbon::createFromDate($date)->format('j F Y | H:i');
        // return Carbon::createFromDate($date)->format('l j F Y H:i:s');
        return Carbon::createFromDate($date)->diffForHumans();
    }

    public function setPasswordAttribute($value) {
        return $this->attributes['password'] = Hash::make($value);
    } // Auto Hash Password

    public function scopeSearch($query, $request) {
        return $query->where($request['column'], 'like', "%" . $request['text'] . "%");
    } // Todo Some Query

    public function scopeAutoComplete ($query, $value) {
        return $query->select('username')->where('username', 'like', "%{$value}%");
    } // Todo Some Query

    public function getImagePathAttribute()
    {
        if($this->image == 'default.png')
        {
            return asset('uploads/default/' . $this->image);
        }
        return asset('uploads/images/users/' . $this->image);
    } // To Return The Image Path
}
