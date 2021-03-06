<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'token',
        'is_verified','role', 'status'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'email';
    }
    public function setPasswordAttribute($value)
    {
       $this->attributes['password'] = bcrypt($value);
    }

    //scopes
    public function scopeIsActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeIsVerified($query){
        return $query->where('is_verified',1);
    }
    public function scopeIsMerchant($query)
    {
        return $query->where('role', 'merchant');
    }

}
