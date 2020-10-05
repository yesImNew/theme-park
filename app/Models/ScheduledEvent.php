<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ScheduledEvent extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getDateAttribute($value)
    {
        return new Carbon($value);
    }
}
