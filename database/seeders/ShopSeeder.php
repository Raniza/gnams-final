<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Shop;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csv_file = fopen(base_path('database/seeders/data/shop.csv'), 'r');
        $first_line = true;

        while (($data = fgetcsv($csv_file, 500, ',')) !== false) {
            if (!$first_line)
            {
                Shop::create([
                    'section_id' => $data['1'],
                    'name' => $data['2']
                ]);
            }
            $first_line = false;
        }
        fclose($csv_file);
    }
}
