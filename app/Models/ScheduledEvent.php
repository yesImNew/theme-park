<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ScheduledEvent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
    * Caste the date field to date type
    */
    protected $casts = [
        'date' => 'date',
    ];

    public function ticketRecords()
    {
        return $this->hasMany(TicketRecord::class);
    }

    public function bookingRecords()
    {
        return $this->hasMany(BookingRecord::class);
    }

    // UTC+05:00
    public function getLocalDateAttribute() {
        return $this->date->subHours(5);
    }

}
