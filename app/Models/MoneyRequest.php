<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MoneyRequest extends Model
{
    use HasFactory;

    protected $fillable = ['auth_id','user_id','currency_id','amount','status'];
    public function getCreatedAtAttribute($value)
    {
        $carbonDate = new Carbon($value);
        return $carbonDate->diffForHumans();
    }

    //relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function authUser()
    {
        return $this->belongsTo(User::class,'auth_id','id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}

