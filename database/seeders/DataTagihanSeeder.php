<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataTagihan;

class DataTagihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataTagihan::create(
            [
                'billing_start_date' => '2024-01-01',
                'due_date' => '2024-01-31',
                'paid_date' => null,
                'total_amount' => 100000,
                'user_id' => 2,
            ]
        );
    }
}
