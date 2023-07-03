<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectRole;

class ProjectRoleSeeder extends Seeder
{
    public function run()
    {
        // Define the data for the project roles
        $data = [
            [
                'member_role_type' => 'Developer',
            ],
            [
                'member_role_type' => 'Designer',
            ],
            [
                'member_role_type' => 'Manager',
            ],
            // Add more data as needed
        ];

        // Insert the data into the project_role table
        ProjectRole::insert($data);
    }
}
