<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin@1234'),
            'is_admin' => 1,
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('john@1234'),
            'is_admin' => 0,
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => bcrypt('jane@1234'),
            'is_admin' => 0,
        ]);
    }
}
