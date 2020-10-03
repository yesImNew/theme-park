<?php

namespace Database\Seeders;

use App\Models\ScheduledEvents;
use Illuminate\Database\Seeder;

class ScheduledEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScheduledEvents::factory()
            ->count(5)
            ->create();
    }
}
