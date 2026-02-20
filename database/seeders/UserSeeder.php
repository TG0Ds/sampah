<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'john@gmail.com'],
            [
                'name' => 'john',
                'password' => Hash::make('123123!'),
                'role' => 'warga',
                'RT' => '1',
            ],
        );
    }
}
