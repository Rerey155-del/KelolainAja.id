<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('packages')->insert([
            // Paket Layanan Media Sosial
            [
                'name' => 'Paket Normal (Media Sosial)',
                'price' => 550000,
                'category' => 'Media Sosial',
                'description' => 'Kalender Konten, 6 Feeds (Foto), 6 Reels (Maks 30 detik), 3 Stories, 1 Platform Media Sosial (Opsional)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Paket Silver (Media Sosial)',
                'price' => 999000,
                'category' => 'Media Sosial',
                'description' => 'Kalender Konten, 14 Feeds (Foto), 8 Reels (Maks 30 detik), 6 Stories, 2 Platform Media Sosial (Opsional)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Paket Premium (Media Sosial)',
                'price' => 1500000,
                'category' => 'Media Sosial',
                'description' => 'Kalender Konten, 16 Feeds (Foto), 10 Reels (Maks 30 detik), 8 Stories, 1 Platform Media Sosial (Opsional)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Paket Layanan Desain
            [
                'name' => 'Paket Normal (Desain)',
                'price' => 350000,
                'category' => 'Desain',
                'description' => '2 Desain Logo, 5 Postingan Feed, 2 Story Highlight, 1 Banner Promo (Flyer/Poster)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Paket Silver (Desain)',
                'price' => 750000,
                'category' => 'Desain',
                'description' => '3 Desain Logo, 10 Postingan Feed, 4 Story Highlight, 2 Banner Promo, 1 Cover Facebook/LinkedIn',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Paket Premium (Desain)',
                'price' => 1200000,
                'category' => 'Desain',
                'description' => '5 Desain Logo, 12 Postingan Feed, 6 Story Highlight, 3 Banner Promo, 1 Cover Facebook/LinkedIn',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            // Paket Layanan E-Commerce
            [
                'name' => 'Paket Normal (E-Commerce)',
                'price' => 350000,
                'category' => 'E-Commerce',
                'description' => 'Pengelolaan 1 Toko Online, Upload & Optimasi 10 Produk, 3 Template Desain Promo, Balas Chat Pelanggan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Paket Silver (E-Commerce)',
                'price' => 350000,
                'category' => 'E-Commerce',
                'description' => 'Pengelolaan 2 Toko Online, Upload & Optimasi 30 Produk, 5 Template Desain Promo, Balas Chat Pelanggan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Paket Premium (E-Commerce)',
                'price' => 350000,
                'category' => 'E-Commerce',
                'description' => 'Pengelolaan 3 Toko Online, Upload & Optimasi 50 Produk, 8 Template Desain Promo, Balas Chat Pelanggan',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
