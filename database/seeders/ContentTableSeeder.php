<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContentPillar;
use App\Models\ContentCalendar;
use App\Models\User;

class ContentTableSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan ada pengguna dengan user_id 1 (Reyhan)
        $user1 = User::firstOrCreate(
            ['user_id' => 1],
            ['name' => 'Reyhan', 'email' => 'reyhan@example.com', 'password' => bcrypt('password')]
        );

        // Buat pengguna kedua sebagai contoh (opsional)
        $user2 = User::firstOrCreate(
            ['user_id' => 2],
            ['name' => 'User2', 'email' => 'user2@example.com', 'password' => bcrypt('password')]
        );

        // Seed Content Pillars
        $pillars = [
            ['name' => 'Inspirasi', 'description' => 'Cerita personal, Keahlian, Good Inspirational', 'percentage' => 10, 'color' => '#fef2f2', 'user_id' => $user1->user_id],
            ['name' => 'Informasi', 'description' => 'Berbagai hal Baru, berita perubahan', 'percentage' => 10, 'color' => '#fecaca', 'user_id' => $user1->user_id],
            ['name' => 'Interaksi', 'description' => 'Kuis, tanggapan, diskusi, survei, respon games', 'percentage' => 20, 'color' => '#fca5a5', 'user_id' => $user2->user_id], // User berbeda
            ['name' => 'Edukasi', 'description' => 'How-to tips, demo tool, informasi berimbah.', 'percentage' => 30, 'color' => '#ef4444', 'user_id' => $user1->user_id],
            ['name' => 'Promosi', 'description' => 'produk, harga, benefit, produk, testimonial promo', 'percentage' => 30, 'color' => '#dc2626', 'user_id' => $user2->user_id], // User berbeda
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
                'attachments' => 'images/roti_ringhini.jpg',
                'upload_for' => '',
                'reference' => 'https://www.instagram.com',
                'format' => 'Foto',
                'assignee' => 'Ryan',
                'user_id' => $user1->user_id,
            ],
            [
                'name' => 'Cara menyimpan roti agar tetap segar selama 3 ha...',
                'status' => 'Not started',
                'category' => 'Product Knowledge',
                'attachments' => 'images/tips_roti.jpg',
                'upload_for' => '',
                'reference' => 'https://www.instagram.com',
                'format' => 'Foto',
                'assignee' => 'Kelolalinga',
                'user_id' => $user2->user_id, // User berbeda
            ],
            [
                'name' => 'Review pelanggan seri tentang rasa dan tekstur...',
                'status' => 'Not started',
                'category' => 'Customer Testimonial',
                'attachments' => 'images/review_pelanggan.jpg',
                'upload_for' => '',
                'reference' => 'https://id.pinterest.com/pin/123',
                'format' => 'Foto',
                'assignee' => 'Kelolalinga',
                'user_id' => $user1->user_id,
            ],
            [
                'name' => 'POV: Sarapan pagi - kopi di balkon dengan Ring...',
                'status' => 'Not started',
                'category' => 'Lifestyle & Moment',
                'attachments' => 'images/sarapan_pagi.jpg',
                'upload_for' => '',
                'reference' => 'https://www.tiktok.com/@user123',
                'format' => 'Video',
                'assignee' => 'Kelolalinga',
                'user_id' => $user2->user_id, // User berbeda
            ],
            [
                'name' => 'Flash Sale Beli 5 dapat 1 gratis - Promo Terbaru!...',
                'status' => 'Done',
                'category' => 'Promo & Campaign',
                'attachments' => 'images/flash_sale.jpg',
                'upload_for' => '',
                'reference' => 'https://id.pinterest.com/pin/456',
                'format' => 'Foto',
                'assignee' => 'Rayhani',
                'user_id' => $user1->user_id,
            ],
        ];

        foreach ($calendarItems as $item) {
            ContentCalendar::create($item);
        }
    }
}