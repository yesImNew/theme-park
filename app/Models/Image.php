<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
    * Get the owning imageable model.
    */
    public function imageable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute($value)
    {
        return asset('images/' . $value);
    }
}
