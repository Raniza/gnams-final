<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Department::truncate();
        $csv_file = fopen(base_path('database/seeders/data/department.csv'), 'r');
        $first_line = true;

        while (($data = fgetcsv($csv_file, 500, ',')) !== false) {
            if (!$first_line)
            {
                Department::create([
                    'name' => $data['1']
                ]);
            }
            $first_line = false;
        }
        fclose($csv_file);
    }
}
