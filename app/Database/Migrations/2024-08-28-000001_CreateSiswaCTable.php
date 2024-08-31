<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSiswaCTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_siswa' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'kelas' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('siswac');
    }

    public function down()
    {
        $this->forge->dropTable('siswac');
    }
}
