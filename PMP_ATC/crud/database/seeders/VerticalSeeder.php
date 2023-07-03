<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vertical;

class VerticalSeeder extends Seeder
{
    public function run()
    {
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
        ];

        Vertical::insert($data);
    }
}
