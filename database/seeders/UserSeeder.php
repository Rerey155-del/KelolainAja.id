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
            ['email' => 'Reyhanganteng@gmail.com'], // Cek apakah email sudah ada
            [
               
                'name' => 'Reyhan',
                'password' => Hash::make('Reyhanmaulana123'),
            ]
        );
        User::firstOrCreate(
            ['email' => 'Rerey@gmail.com'], // Cek apakah email sudah ada
            [
                
                'name' => 'Rerey',
                'password' => Hash::make('Reyhanmaulana123'),
            ]
        );
    }
}
