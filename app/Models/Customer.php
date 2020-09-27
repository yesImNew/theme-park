<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\matches;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
    * Get the user's first name.
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
}
