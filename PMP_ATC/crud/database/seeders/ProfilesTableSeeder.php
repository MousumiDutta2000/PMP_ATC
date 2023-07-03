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
    }
}
