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
        User::factory()->create(['name' => 'admin', 'email' => 'admin@mail.com', 'role' => 'admin']);
        User::factory()->create(['name' => 'reception', 'email' => 'reception@mail.com', 'role' => 'reception']);

        $this->call([
            // RoomTypeSeeder::class,
            // RoomSeeder::class,
            // CustomerSeeder::class,
            // ActivitySeeder::class,
            ScheduledEventSeeder::class,

            // HotelSeeder::class,
            // BookingRecordSeeder::class,
        ]);
    }
}
