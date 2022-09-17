<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Item extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true,
            ],
            'nama_item' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'unit' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'stok' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'harga_satuan' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'barang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('items');
    }

    public function down()
    {
    }
}
