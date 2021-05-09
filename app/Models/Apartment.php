<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Booking;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartmentName',
        'location',
        'longitude',
        'latitude',
        'purpose',
        'description',
        'price',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
