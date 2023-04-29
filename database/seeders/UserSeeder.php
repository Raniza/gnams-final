<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::truncate();
        $csv_file = fopen(base_path('database/seeders/data/user.csv'), 'r');
        $first_line = true;

        while (($data = fgetcsv($csv_file, 500, ',')) !== false) {
            if (!$first_line)
            {
                User::create([
                    'nik' => $data['1'],
                    'name' => $data['2'],
                    'email' => $data['3'],
                    'position_id' => $data['4'],
                    'department_id' => $data['5'],
                    'section_id' => $data['6'],
                    'shop_id' => $data['7'],
                    'password' => bcrypt(12345678),
                    'is_admin' => $data['11'],
                ]);
            }
            $first_line = false;
        }
        fclose($csv_file);
    }
}
