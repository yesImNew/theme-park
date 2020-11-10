<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use function PHPUnit\Framework\isNull;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'date',
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function bookings()
    {
        return $this->hasManyThrough(BookingRecord::class, Customer::class);
    }

    public function getIsCustomerAttribute()
    {
        return $this->role == 'customer';
    }

    public function getIsAdminAttribute()
    {
        return $this->role == 'admin';
    }
}
