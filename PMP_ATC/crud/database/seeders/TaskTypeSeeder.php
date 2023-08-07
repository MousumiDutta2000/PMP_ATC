<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TaskType;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskType::create([
            'type_name' => 'Feature',
            'level' => 0,
            'description' => 'Description for Feature',
        ]);

        TaskType::create([
            'type_name' => 'Epic',
            'level' => 1,
            'description' => 'Description for Epic',
        ]);

        TaskType::create([
            'type_name' => 'Story',
            'level' => 2,
            'description' => 'Description for Story',
        ]);

        TaskType::create([
            'type_name' => 'Task',
            'level' => 3,
            'description' => 'Description for Task',
        ]);

    }
}
