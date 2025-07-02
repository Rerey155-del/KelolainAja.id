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
            'price' => 250000,
            'category' => 'Media Sosial',
            'description' => 'Konten Bebas, Konsultasi Gratis',
        ]);

        Custompackage::create([
            'name' => 'Custom Paket B',
            'price' => 350000,
            'category' => 'Iklan Digital',
            'description' => 'Termasuk copywriting dan desain iklan',
        ]);

        Custompackage::create([
            'name' => 'Custom Paket C',
            'price' => 450000,
            'category' => 'Branding',
            'description' => 'Desain logo, warna brand, dan template konten',
        ]);
    }
}
