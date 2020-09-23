<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    /**
    * Get the user's full name.
    *
    * @return string
    */
    public function getNumberAttribute()
    {
        return str_pad($this->id, 2, '0', STR_PAD_LEFT);
    }
}
