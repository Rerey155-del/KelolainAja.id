<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Custompackage;

class CustompackageSeeder extends Seeder
{
    public function run(): void
    {
        Custompackage::create([
            'name' => 'Custom 1',
            'price' => 600000,
            'category' => 'Media Sosial',
            'description' => 'Kalender Konten, 8 Feed(foto), 3 Reels(max 30 sec), 4 Stories(foto),1 Platform Media Sosial ',
        ]);

        Custompackage::create([
           'name' => 'Custom 2',
            'price' => 1100000,
            'category' => 'Media Sosial',
            'description' => 'Kalender Konten, 14 Feed(foto), 6 Reels(max 30 sec), 4 Stories(foto),2 Platform Media Sosial ',
        ]);

        Custompackage::create([
             'name' => 'Custom 3',
            'price' => 1700000,
            'category' => 'Media Sosial',
            'description' => 'Kalender Konten, 16 Feed(foto), 6 Reels(max 30 sec), 6 Stories(foto),2 Platform Media Sosial ',
        ]);
    }
}
