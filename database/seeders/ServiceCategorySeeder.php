<?php

namespace Database\Seeders;

use App\Models\ServiceCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (ServiceCategory::$categories as $name) {
            $bookingStatus = new ServiceCategory;
            $bookingStatus->name = $name;
            $bookingStatus->save();
        }
    }
}
