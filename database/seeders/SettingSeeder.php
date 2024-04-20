<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting;
        $setting->email = "raheelqazi326@gmail.com";
        $setting->mail_email = "raheelqazi326@gmail.com";
        $setting->contact = "12345678";
        $setting->address = "abc";
        $setting->city = "Karachi";
        $setting->state = "Sindh";
        $setting->country = "Pakistan";
        $setting->about_us = 'abc';
        $setting->consultation_price = 1;
        $setting->save();
    }

}
