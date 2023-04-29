<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Horensou\HorensouCategory;

class HorensouCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Safety'],
            ['name' => 'Quality'],
            ['name' => 'Delivery'],
            ['name' => 'Rusak'],
            ['name' => 'Lain-lain'],
        ];

        foreach ($categories as $key => $value) {
            HorensouCategory::create($value);
        }
    }
}
