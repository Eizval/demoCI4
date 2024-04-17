<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Cars extends Seeder
{
    public function run()
    {
        $example_data = [
            [
                'car_brand' => 'BMW',
                'car_name' => 'BMWs King',
                'color_hex' => 'ffaaff',
                'comments' => 'my fav car',
                'car_type_id' => 10,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'car_brand' => 'Audi',
                'car_name' => 'Gray GOld',
                'color_hex' => 'aaafff',
                'comments' => '',
                'car_type_id' => 7,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $CarModel = new \App\Models\Cars();

        foreach ($example_data as $entry_id => $data) {
            if ($CarModel->insert($data) === false) {
                echo "Errors on entry_id ${entry_id}:\n";
                print_r($CarModel->errors());
            }
        }
    }
}