<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        // Make table for user
        $this->forge->addField([
            'id'                 => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'username'           => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'unique'         => true,
                'null'           => false,
            ],
            'email'              => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'unique'         => true,
                'null'           => false,
            ],
            'gender' => [
                'type'           => 'ENUM',
                'constraint'     => ['laki-laki', 'perempuan'],
                'null'           => false,
            ],
            'status'             => [
                'type'           => 'ENUM',
                'constraint'     => ['active', 'inactive'],
                'null'           => false,
            ],
            'project'            => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default current_timestamp'
        ]);

        // Make primary key
        $this->forge->addKey('id', TRUE);

        // Make table user
        $this->forge->createTable('user', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('table_name', true);
    }
}
