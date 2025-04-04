<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $file = fopen(WRITEPATH . 'uploads/sample_products.csv', 'r');

        // Skip the header row
        fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            $data = [
                'name'          => $row[0],
                'description'   => $row[1],
                'price'         => $row[2],
                'location'      => $row[3],
                'image'         => $row[4],
                'posted_by'     => $row[5],
                'contact_phone' => $row[6],
                'contact_email' => $row[7]
            ];

            // Insert to DB
            $this->db->table('products')->insert($data);
        }

        fclose($file);
    }
}
