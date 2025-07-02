<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Custompackage;

class CustompackageSeeder extends Seeder
{
    public function run(): void
    {
        Custompackage::create([
            'name' => 'Custom Paket A',
            'price' => 250000,
            'category' => 'Media Sosial',
            'description' => 'Konten Bebas, Konsultasi Gratis',
        ]);
    }
}
