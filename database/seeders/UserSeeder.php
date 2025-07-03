<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Import model User dari App\Models
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        User::firstOrCreate(
            ['email' => 'Niranta123@outlook.com'], // Cek apakah email sudah ada
            [        
                 'user_id' => 1,
                'name' => 'Reyhan',
                'password' => Hash::make('12345678'),
            ]
        );
        User::firstOrCreate(    
            ['email' => 'SabaiMinangKabau123@gmail.com'], // Cek apakah email sudah ada
            [
                 'user_id' => 2,
                'name' => 'Rerey',
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
