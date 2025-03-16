<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Ensure there's no duplicate
            [
                'first_name' => 'System Admin',
                'middle_name'=> '',
                'last_name' => 'SIS',
                'password' => Hash::make('admin123'), // Change this to a secure password
                'role' => 'admin',
            ]
        );
    }
}

