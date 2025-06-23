<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContentPillar;
use App\Models\ContentCalender;

class ContentTableSeeder extends Seeder
{
    public function run(): void
    {
        // Seed Content Pillars
        $pillars = [
            ['name' => 'Inspirasi', 'description' => 'Cerita personal, Keahlian, Good Inspirational', 'percentage' => 10, 'color' => '#fef2f2'],
            ['name' => 'Informasi', 'description' => 'Berbagai hal Baru, berita perubahan', 'percentage' => 10, 'color' => '#fecaca'],
            ['name' => 'Interaksi', 'description' => 'Kuis, tanggapan, diskusi, survei, respon games', 'percentage' => 20, 'color' => '#fca5a5'],
            ['name' => 'Edukasi', 'description' => 'How-to tips, demo tool, informasi berimbah.', 'percentage' => 30, 'color' => '#ef4444'],
            ['name' => 'Promosi', 'description' => 'produk, harga, benefit, produk, testimonial promo', 'percentage' => 30, 'color' => '#dc2626'],
        ];

        foreach ($pillars as $pillar) {
            ContentPillar::create($pillar);
        }

        // Seed Content Calendar
        $calendarItems = [
            [
                'name' => 'Close-up shot roti Ringhini - Roti Ringhini terbak...',
                'status' => 'Done',
                'category' => 'Product Highlight',
                'attachments' => '',
                'upload_for' => '',
                'reference' => 'https://www.instagram.co',
                'format' => 'Foto',
                'assignee' => 'Ryan',
            ],
            [
                'name' => 'Cara menyimpan roti agar tetap segar selama 3 ha...',
                'status' => 'Not started',
                'category' => 'Product Knowledge',
                'attachments' => '',
                'upload_for' => '',
                'reference' => 'https://www.instagram.co',
                'format' => 'Foto',
                'assignee' => 'Kelolalinga',
            ],
            [
                'name' => 'Review pelanggan seri tentang rasa dan tekstur...',
                'status' => 'Not started',
                'category' => 'Customer Testimonial',
                'attachments' => '',
                'upload_for' => '',
                'reference' => 'https://id.pinterest.com/p',
                'format' => 'Foto',
                'assignee' => 'Kelolalinga',
            ],
            [
                'name' => 'POV: Sarapan pagi - kopi di balkon dengan Ring...',
                'status' => 'Not started',
                'category' => 'Lifestyle & Moment',
                'attachments' => '',
                'upload_for' => '',
                'reference' => 'https://www.tiktok.com/@',
                'format' => 'Video',
                'assignee' => 'Kelolalinga',
            ],
            [
                'name' => 'Flash Sale Beli 5 dapat 1 gratis - Promo Terbaru!...',
                'status' => 'Done',
                'category' => 'Promo & Campaign',
                'attachments' => '',
                'upload_for' => '',
                'reference' => 'https://id.pinterest.com/p',
                'format' => 'Foto',
                'assignee' => 'Rayhani',
            ],
        ];

        foreach ($calendarItems as $item) {
            ContentCalender::create($item);
        }
    }
}