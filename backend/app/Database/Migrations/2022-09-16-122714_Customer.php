<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customer extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_cust' => [
                'type' => 'INT',
                'constraint' => 12,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'contact' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'diskon' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
             'tipe_diskon' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'ktp' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id_cust', true);
        $this->forge->createTable('customers');
    }

    public function down()
    {
    }
}
