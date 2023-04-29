<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Horensou\HorensouPriority;

class HorensouPrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = [
            [
                'code' => 1, 
                'desc' => 'Chokotei (Stop mendadak dengan kerusakan)',
                'priority' => 'Standard'
            ],
            [
                'code' => 2, 
                'desc' => 'Ada kemungkinan timbul NG',
                'priority' => 'Segera'
            ],
            [
                'code' => 3, 
                'desc' => 'Kemungkinan timbul NG besar',
                'priority' => 'Secepatnya'
            ],
            [
                'code' => 4, 
                'desc' => 'Timbul NG',
                'priority' => 'Urgent'
            ],
        ];

        foreach ($priorities as $key => $value) {
            HorensouPriority::create($value);
        }
    }
}
