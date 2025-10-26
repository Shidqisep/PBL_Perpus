<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UserTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        // // Membuat tabel baru bernama 'users'
        $table = $this->table('users', array('id' => 'id_user'));
        
        // Menambahkan kolom-kolom
        $table->addColumn('username', 'string', ['limit' => 255])
              ->addColumn('nim', 'string', ['limit' => 20])
              ->addColumn('email', 'string', ['limit' => 255])
              ->addColumn('password', 'string', ['limit' => 255])
              ->addIndex('username', ['unique' => true])
              ->addIndex('nim', ['unique' => true])
              ->addIndex('email', ['unique' => true])
              ->addColumn('role', 'enum', ['values' => ['user', 'admin', 'superadmin'], 'default' => 'user'])
              ->addColumn('status', 'enum', ['values' => ['pending', 'active', 'declined', 'deleted']])
              ->addTimestamps();
        
        // "Jalankan" pembuatan tabel
        $table->create();
    }
}
