<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Section;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Section::truncate();
        $csv_file = fopen(base_path('database/seeders/data/section.csv'), 'r');
        $first_line = true;

        while (($data = fgetcsv($csv_file, 500, ',')) !== false) {
            if (!$first_line)
            {
                Section::create([
                    'department_id' => $data['1'],
                    'name' => $data['2']
                ]);
            }
            $first_line = false;
        }
        fclose($csv_file);
    }
}
