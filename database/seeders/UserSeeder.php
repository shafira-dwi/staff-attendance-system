<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@mail.com'], // cek dulu berdasarkan email
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'),
                'role' => 'admin'
            ]
        );

        User::create([
            'name' => 'Staff 1',
            'email' => 'staff@mail.com',
            'password' => Hash::make('password'),
            'role' => 'staff',
        ]);
    }
}