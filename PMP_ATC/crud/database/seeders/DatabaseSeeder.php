<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleSeeder::class,
            UsersTableSeeder::class,
            HighestEducationValueSeeder::class,
            VerticalSeeder::class,
            DesignationSeeder::class,
            ProfilesTableSeeder::class,
            OpportunityStatusSeeder::class,
            OpportunitiesSeeder::class,
            ProjectRoleSeeder::class,
            TechnologiesSeeder::class,
            ClientsSeeder::class,
            ProjectItemStatusesSeeder::class,
        ]);
    }
}
