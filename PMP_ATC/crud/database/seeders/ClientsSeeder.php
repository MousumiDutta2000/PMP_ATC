<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'client_name' => 'Google',
                'phone_no' => ' 1800-419-0157',
                'email_address' => 'support-in@google.com',
            ],
            [
                'client_name' => 'Mirosoft',
                'phone_no' => '1800-642-7676',
                'email_address' => 'support-in@microsoft.com',
            ],
            [
                'client_name' => 'Apple',
                'phone_no' => '1800-100-9009',
                'email_address' => 'support-in@apple.com',
            ],
        ];

        Client::insert($data);
    }
}
