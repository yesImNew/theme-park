<?php

namespace Database\Seeders;

use App\Models\BookingRecord;
use Illuminate\Database\Seeder;

class BookingRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookingRecord::factory()
            ->count(10)
            ->create();
    }
}
