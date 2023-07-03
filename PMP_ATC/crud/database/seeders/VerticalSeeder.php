<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vertical;

class VerticalSeeder extends Seeder
{
    public function run()
    {
        // Define the data for the verticals
        $data = [
            [
                'vertical_name' => 'Sales',
                'vertical_head_name' => 'John Doe',
                'vertical_head_emailId' => 'john@example.com',
                'vertical_head_contact' => '1234567890',
            ],
            [
                'vertical_name' => 'Marketing',
                'vertical_head_name' => 'Jane Smith',
                'vertical_head_emailId' => 'jane@example.com',
                'vertical_head_contact' => '9876543210',
            ],
            // Add more verticals as needed
        ];

        // Insert the data into the vertical table
        Vertical::insert($data);
    }
}
