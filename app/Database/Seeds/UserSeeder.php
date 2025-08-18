<?php 

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder {
    public function run()
    {
        // Example data to seed the users table
        $data = [
            [
                'username' => 'john_doe',
                'email'    => 'john@example.com',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
            ],
            [
                'username' => 'jane_doe',
                'email'    => 'jane@example.com',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
            ],
        ];

        //$this->db->table('users')->insert($data);

        $this->db->table('users')->insertBatch($data);

        // Insert data into the users table
        // foreach ($data as $user) {
        //     $this->db->table('users')->insert($user);
        // }
    }
}
