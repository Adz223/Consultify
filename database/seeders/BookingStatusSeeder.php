<?php

namespace Database\Seeders;

use App\Models\BookingStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (BookingStatus::$statuses as $name => $displayName) {
            $bookingStatus = new BookingStatus;
            $bookingStatus->name = $name;
            $bookingStatus->display_name = $displayName;
            $bookingStatus->save();
        }
    }
}
