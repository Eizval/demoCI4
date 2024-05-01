<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Keys extends Seeder
{
    public function run()
    {
        $example_data = [
            [
                'token' => 'ZJZVxEIDlYlm5Vfj3YAZMxJA8TnmU7',
                'comments' => 'Damians Token',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'token' => 'DwVRO8XvHgCTSsHzAtSKSJXQN5Mcje',
                'comments' => 'Test Token',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'token' => 'TDy2YKQF4vIVkdmF9y9ichNvwTABoB',
                'comments' => 'Karls Token',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        $KeyModel = new \App\Models\Keys();

        foreach ($example_data as $entry_id => $data) {
            if ($KeyModel->insert($data) === false) {
                echo "Errors on entry_id ${entry_id}:\n";
                print_r($KeyModel->errors());
            }
        }
    }
}