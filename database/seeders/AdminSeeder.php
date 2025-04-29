<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // Import model User dari App\Models
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'iniakunsaya123@outlook.com'], // Cek apakah email sudah ada
            [
                'name' => 'saya',
                'password' => Hash::make('password123'),
            ]
        );

        // Admin::firstOrCreate(
        //     ['email' => 'Reyhanganteng@gmail.com'], // Cek apakah email sudah ada
        //     [
        //         'name' => 'Reyhan',
        //         'password' => Hash::make('Reyhanganteng@gmail.com'),
        //     ]
        // );
        // Admin::firstOrCreate(
        //     ['email' => 'Rerey@gmail.com'], // Cek apakah email sudah ada
        //     [
        //         'name' => 'Rerey',
        //         'password' => Hash::make('Reyhanmaulana123'),
        //     ]
        // );
    }

}
