<?php

namespace App\Models;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'couponprice',
        'user_id' , 
        'used' ,
        'couponName',
        'validatedate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
