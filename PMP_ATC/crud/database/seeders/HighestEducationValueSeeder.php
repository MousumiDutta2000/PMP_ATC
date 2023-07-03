<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HighestEducationValue;

class HighestEducationValueSeeder extends Seeder
{
    public function run()
    {
        // Define the data for the highest education values
        $data = [
            ['highest_education_value' => 'High School'],
            ['highest_education_value' => 'Associate Degree'],
            ['highest_education_value' => 'Bachelor\'s Degree'],
            ['highest_education_value' => 'Master\'s Degree'],
            ['highest_education_value' => 'PhD'],
        ];

        // Insert the data into the highest_education_value table
        HighestEducationValue::insert($data);
    }
}
