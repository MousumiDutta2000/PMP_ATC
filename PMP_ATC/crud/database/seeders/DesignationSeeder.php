<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'level' => 'L1A',
            ],
            [
                'level' => 'L1B',
            ],
        ];

        Designation::insert($data);
    }
}
