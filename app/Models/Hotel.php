<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function bookings()
    {
        return $this->hasMany(BookingRecord::class);
    }

     /**
     * Get the hotel's image.
     */
     public function image()
     {
        return $this->morphOne('App\Models\Image', 'imageable');
     }
}
