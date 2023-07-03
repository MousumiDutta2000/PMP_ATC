<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Define the data for the roles
        $data = [
            [
                'role_name' => 'Admin',
            ],
            [
                'role_name' => 'User',
            ],
            [
                'role_name' => 'Manager',
            ],
            [
                'role_name' => 'Line Manager',
            ],
            [
                'role_name' => 'Project Manager',
            ],
        ];

        // Insert the data into the roles table
        Role::insert($data);
    }
}
