<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['name' => 'admin', 'email' => 'admin@mail.com']);

        $this->call([
            // HotelSeeder::class,
            RoomTypeSeeder::class,
            RoomSeeder::class,
            CustomerSeeder::class,
            // BookingRecordSeeder::class,
            ActivitySeeder::class,
            ScheduledEventSeeder::class,
        ]);
    }
}
