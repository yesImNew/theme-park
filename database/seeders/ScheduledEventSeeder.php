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
        // ScheduledEvent::factory()
        //     ->count(5)
        //     ->create();

        $events = [
            [
                'date' => '2020-11-12',
                'title' => 'November 12, Public Holiday',
                'comments' => 'An unexpected holiday is always welcome. It\'s time for a celebration',
            ],
            [
                'date' => '2020-11-14',
                'title' => 'Silvery Sand Saturday',
                'comments' => 'Enjoy the nice wheather. Build a few sand castles.',
            ],
            [
                'date' => '2020-11-27',
                'title' => 'Last week of November,',
                'comments' => 'Let\'s have a beach party before november ends.',
            ],
            [
                'date' => '2020-11-21',
                'title' => 'November is almost over',
                'comments' => 'Another perfect day for a fishing trip. Special discounts of fishing related activities!',
            ],
            [
                'date' => '2020-11-21',
                'title' => 'Its DECEMBER!',
                'comments' => 'Year 2020 is almost over. It\'s time for some fun with family and friends.',
            ],
        ];

        foreach ($events as $event) {
            ScheduledEvent::create($event);
        }
    }
}
