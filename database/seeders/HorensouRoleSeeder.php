<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Horensou\HorensouRole as Role;

class HorensouRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv_file = fopen(base_path('database/seeders/data/horensou_role.csv'), 'r');
        $first_line = true;

        while (($data = fgetcsv($csv_file, 500, ',')) !== false) {
            if (!$first_line)
            {
                Role::create([
                    'section_id' => $data['1'],
                    'user_id' => $data['2']
                ]);
            }
            $first_line = false;
        }
        fclose($csv_file);
    }
}
