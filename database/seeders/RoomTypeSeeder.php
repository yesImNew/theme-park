<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Deluxe', 'Luxury', 'Ocean View', 'Garden view', 'Single', 'Double'];

        foreach ($types as $type) {
            RoomType::create(['name' => $type]);
        }
    }
}
