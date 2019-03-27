<?php

use App\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            'blog_name' => 'Feras Blog',
            'blog_email' => 'Feras@gmail.com',
            'phone_number' => '00 92 10 10 100',
            'address' => 'Libya'
        ]);
    }
}
