<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSoalTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'guru_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'pertanyaan' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('guru_id', 'guru', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('soal');
    }

    public function down()
    {
        $this->forge->dropTable('soal');
    }
}
