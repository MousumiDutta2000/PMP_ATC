<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectItemStatus;

class ProjectItemStatusesSeeder extends Seeder
{
    public function run()
    {

        $data = [
            [
                'status' => 'Under discussion',
            ],
            [
                'status' => 'Under development',
            ],
            [
                'status' => 'In queue',
            ],
            [
                'status' => 'Not Started',
            ],
            [
                'status' => 'Pending',
            ],
            [
                'status' => 'Delay',
            ],

        ];

        ProjectItemStatus::insert($data);
    }
}
