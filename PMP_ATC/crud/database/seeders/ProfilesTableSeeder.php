<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
            'profile_name' => 'Admin',
            'father_name' => 'Admin Papa',
            'DOB' => '1990-01-01',
            'work_location' => 'New York',
            'work_address' => '123 Main St',
            'email' => 'admin@admin.com',
            'contact_number' => '1234567890',
            'line_manager_id' => 1,
            'designation_id' => 1,
            'vertical_id' => 1,
            'highest_educational_qualification_id' => 1,
            'image' => 'images/profiles/adamastech_logo.png',
            'user_id' => 1,
        ]);

        Profile::create([
            'profile_name' => 'John Doe',
            'father_name' => 'John Doe Sr.',
            'DOB' => '1985-05-15',
            'work_location' => 'San Francisco',
            'work_address' => '456 Elm St',
            'email' => 'john@example.com',
            'contact_number' => '9876543210',
            'line_manager_id' => 1,
            'designation_id' => 1,
            'vertical_id' => 1,
            'highest_educational_qualification_id' => 2,
            'image' => 'images/profiles/john_profile.png',
            'user_id' => 2,
        ]);

        Profile::create([
            'profile_name' => 'Jane Smith',
            'father_name' => 'Jane Smith Sr.',
            'DOB' => '1992-08-22',
            'work_location' => 'Los Angeles',
            'work_address' => '789 Oak St',
            'email' => 'jane@example.com',
            'contact_number' => '8765432109',
            'line_manager_id' => 1,
            'designation_id' => 1,
            'vertical_id' => 1,
            'highest_educational_qualification_id' => 3,
            'image' => 'images/profiles/jane_profile.png',
            'user_id' => 3,
        ]);
    }
}
