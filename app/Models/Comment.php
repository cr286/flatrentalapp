<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\Apartment;
use APP\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'description',
        'user_id' ,
        'apartment_id'  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }
}
