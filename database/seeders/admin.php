<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class admin extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'nael26nj@gmail.com'],
            [
                'name' => 'Nathan',
                'password' => Hash::make('123123!'),
                'role' => 'admin',
                'RT' => '1',
            ]
        );
    }
}
