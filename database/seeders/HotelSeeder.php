<?php

namespace Database\Seeders;
use App\Models\Hotel;

use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    private $hotels = [
        'Apline Top',
        'Bottom Rock'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->hotels)->each(function ($name) {
            Hotel::create(['name' => $name]);
        });
    }
}
