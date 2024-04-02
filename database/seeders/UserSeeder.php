<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $users = [
            [
                'name' => 'Chet Sovisoth',
                'email' => 'chet.sovisoth.' . date('Y') . '@attendin.com',
                'password' => Hash::make('AttendIn2024@!'),
            ],
            [
                'name' => 'Chean Botum',
                'password' => Hash::make('AttendIn2024@!'),
                'email' => 'chean.botum.' . date('Y') . '@attendin.com',
            ],
            [
                'name' => 'Eong Koungmeng',
                'password' => Hash::make('AttendIn2024@!'),
                'email' => 'eong.koungmeng.' . date('Y') . '@attendin.com',
                'user_type' => "admin",
            ]
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
