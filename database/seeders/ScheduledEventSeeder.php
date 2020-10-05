<?php

namespace Database\Seeders;

use App\Models\ScheduledEvent;
use Illuminate\Database\Seeder;

class ScheduledEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScheduledEvent::factory()
            ->count(5)
            ->create();
    }
}
