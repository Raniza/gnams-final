<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            [
                'position' => 'Director', // 1
            ],
            [
                'position' => 'General Manager', // 2
            ],
            [
                'position' => 'Manager', // 3
            ],
            [
                'position' => 'Supervisor', // 4
            ],
            [
                'position' => 'Staff', // 5
            ],
            [
                'position' => 'General Foreman', // 6
            ],
            [
                'position' => 'Foreman', // 7
            ],
            [
                'position' => 'Admin', // 8
            ],
        ];

        foreach ($positions as $key => $value) {
            Position::create($value);
        }
    }
}
