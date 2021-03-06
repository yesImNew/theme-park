<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getNumberAttribute()
    {
        return str_pad($this->id, 5, '0', STR_PAD_LEFT);
    }

    public function ticketRecords()
    {
        return $this->hasMany(TicketRecord::class);
    }
}
