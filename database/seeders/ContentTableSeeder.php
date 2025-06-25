<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContentPillar;
use App\Models\ContentCalendar; // Perbaiki dari ContentCalender ke ContentCalendar

class ContentTableSeeder extends Seeder
{
    public function run(): void
{
    $users = User::all(); // Ambil semua user

    $pillars = [
        ['name' => 'Inspirasi', 'description' => 'Cerita personal, Keahlian, Good Inspirational', 'percentage' => 10, 'color' => '#fef2f2', 'user_id' => $users->first()->id],
        ['name' => 'Informasi', 'description' => 'Berbagai hal Baru, berita perubahan', 'percentage' => 10, 'color' => '#fecaca', 'user_id' => $users->first()->id],
        ['name' => 'Interaksi', 'description' => 'Kuis, tanggapan, diskusi, survei, respon games', 'percentage' => 20, 'color' => '#fca5a5', 'user_id' => $users->last()->id], // User berbeda
        ['name' => 'Edukasi', 'description' => 'How-to tips, demo tool, informasi berimbah.', 'percentage' => 30, 'color' => '#ef4444', 'user_id' => $users->first()->id],
        ['name' => 'Promosi', 'description' => 'produk, harga, benefit, produk, testimonial promo', 'percentage' => 30, 'color' => '#dc2626', 'user_id' => $users->last()->id], // User berbeda
    ];

    foreach ($pillars as $pillar) {
        ContentPillar::create($pillar);
    }

    $calendarItems = [
        [
            'name' => 'Close-up shot roti Ringhini - Roti Ringhini terbak...',
            'status' => 'Done',
            'category' => 'Product Highlight',
            'attachments' => '',
            'upload_for' => '',
            'reference' => 'https://www.instagram.com',
            'format' => 'Foto',
            'assignee' => 'Ryan',
            'user_id' => $users->first()->id,
        ],
        [
            'name' => 'Cara menyimpan roti agar tetap segar selama 3 ha...',
            'status' => 'Not started',
            'category' => 'Product Knowledge',
            'attachments' => '',
            'upload_for' => '',
            'reference' => 'https://www.instagram.com',
            'format' => 'Foto',
            'assignee' => 'Kelolalinga',
            'user_id' => $users->last()->id, // User berbeda
        ],
        [
            'name' => 'Review pelanggan seri tentang rasa dan tekstur...',
            'status' => 'Not started',
            'category' => 'Customer Testimonial',
            'attachments' => '',
            'upload_for' => '',
            'reference' => 'https://id.pinterest.com/pin/123',
            'format' => 'Foto',
            'assignee' => 'Kelolalinga',
            'user_id' => $users->first()->id,
        ],
        [
            'name' => 'POV: Sarapan pagi - kopi di balkon dengan Ring...',
            'status' => 'Not started',
            'category' => 'Lifestyle & Moment',
            'attachments' => '',
            'upload_for' => '',
            'reference' => 'https://www.tiktok.com/@user123',
            'format' => 'Video',
            'assignee' => 'Kelolalinga',
            'user_id' => $users->last()->id, // User berbeda
        ],
        [
            'name' => 'Flash Sale Beli 5 dapat 1 gratis - Promo Terbaru!...',
            'status' => 'Done',
            'category' => 'Promo & Campaign',
            'attachments' => '',
            'upload_for' => '',
            'reference' => 'https://id.pinterest.com/pin/456',
            'format' => 'Foto',
            'assignee' => 'Rayhani',
            'user_id' => $users->first()->id,
        ],
    ];

    foreach ($calendarItems as $item) {
        ContentCalendar::create($item);
    }
}
}