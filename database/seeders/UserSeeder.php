<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data user untuk disisipkan
        $users = [
            [
                'user_id' => 1,
                'name' => 'NIRANTA',
                'email' => 'Niranta123@outlook.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'user_id' => 2,
                'name' => 'Rerey',
                'email' => 'SabaiMinangKabau123@gmail.com',
                'password' => Hash::make('12345678'),
            ],
        ];

        // Simpan ke database jika belum ada
        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], // cek unik berdasarkan email
                $user
            );
        }
    }
}
