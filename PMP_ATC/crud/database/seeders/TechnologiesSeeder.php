<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologiesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'technology_name' => 'PHP',
                'expertise' => 'Intermediate',
            ],
            [
                'technology_name' => 'JavaScript',
                'expertise' => 'Advanced',
            ],
            [
                'technology_name' => 'Python',
                'expertise' => 'Beginner',
            ],
        ];
        Technology::insert($data);
    }
}
