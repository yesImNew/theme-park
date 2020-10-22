<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketRecord extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $with = ['activity'];

    public function event()
    {
        return $this->belongsTo(ScheduledEvent::class, 'scheduled_event_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function getNumberAttribute()
    {
        return str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }
}
