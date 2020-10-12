<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRecord extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function event()
    {
        return $this->belongsTo(ScheduledEvent::class, 'scheduled_event_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    /**
     * Returns the date of the event
     */
    public function getDateAttribute()
    {
        return $this->event->date->toFormattedDateString();
    }
}
