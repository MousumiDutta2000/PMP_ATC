<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectRole;

class ProjectRoleSeeder extends Seeder
{
    public function run()
    {
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
        ];
        ProjectRole::insert($data);
    }
}
