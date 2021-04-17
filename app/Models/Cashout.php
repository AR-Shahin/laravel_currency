<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cashout extends Model
{
    use HasFactory;
    protected $fillable = ['auth_id', 'merchant_id', 'currency_id', 'amount'];

    public function merchant(){
        return $this->belongsTo(User::class,'merchant_id','id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'auth_id');
    }
    public function getCreatedAtAttribute($value)
    {
        $carbonDate = new Carbon($value);
        return $carbonDate->diffForHumans();
    }
}
