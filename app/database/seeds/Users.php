<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Users extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {

        $table = $this->table('users', ['id' => 'id_user']);
        $table->truncate();
        $data = [
        [
            'username' => 'superadmin',
            'nim' => '0000001',
            'email' => 'superadmin@example.com',
            'password' => password_hash('super123', PASSWORD_BCRYPT),
            'jurusan' => 'superadmin',
            'role' => 'superadmin',
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'username' => 'admin',
            'nim' => '0000002',
            'email' => 'admin@example.com',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
            'jurusan' => 'admin',
            'role' => 'admin',
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
        [
            'username' => 'user',
            'nim' => '0000003',
            'email' => 'user@example.com',
            'password' => password_hash('user123', PASSWORD_BCRYPT),
            'jurusan' => 'Teknik Informatika dan Komputer',
            'role' => 'user',
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ],
    ];

    $table->insert($data)->saveData();
    }
}
