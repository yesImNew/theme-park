<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Get the customer's phone number.
    *
    * @param string $value
    * @return string
    */
    public function getPhoneNoAttribute($value)
    {
        if (preg_match('/(\d{3})(\d{4})/', $value, $matches)) {
            return '+960 ' . $matches[1] . '-' . $matches[2];
        }

        return $value;
    }

    public function bookings()
    {
        return $this->hasMany(BookingRecord::class);
    }

    public function getSignedUpAttribute()
    {
        return $this->user()->exists();
    }


}
