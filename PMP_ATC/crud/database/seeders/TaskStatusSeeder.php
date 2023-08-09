<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskStatus;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskStatus::create([
            'status' => 'To do',
            'level' => 0,
        ]);

        TaskStatus::create([
            'status' => 'Under Discussion',
            'level' => 1,
        ]);

        TaskStatus::create([
            'status' => 'Under Design',
            'level' => 2,
        ]);

        TaskStatus::create([
            'status' => 'In Queue',
            'level' => 3,
        ]);

        TaskStatus::create([
            'status' => 'Under Development',
            'level' => 4,
        ]);

        TaskStatus::create([
            'status' => 'In Progress',
            'level' => 5,
        ]);

        TaskStatus::create([
            'status' => 'Done',
            'level' => 6,
        ]);
    }
}
