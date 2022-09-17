<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sales' => [
                'type' => 'INT',
                'constraint' => 12,
                'auto_increment' => true,
            ],
            'code_transaksi' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'tanggal_transaksi' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'customer' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'item' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'qty' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
             'total_diskon' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'total_harga' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'total_bayar' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ]
            ]);
        $this->forge->addKey('id_sales', true);
        $this->forge->createTable('sales');
    }

    public function down()
    {
    }
}
