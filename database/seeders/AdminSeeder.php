<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Abdullatif Jarkas',
            'email' => 'abdullatif.jarkas1@gmail.com',
            'password' => Hash::make('12345678'),
            'is_admin' => true,
        ]);
    }
}
