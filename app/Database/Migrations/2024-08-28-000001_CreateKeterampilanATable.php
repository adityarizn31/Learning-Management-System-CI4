<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKeterampilanATable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'siswa_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'mata_pelajaran_id' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'pertemuan' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'pertanyaan' => [
                'type' => 'TEXT',
            ],
            'nilai' => [
                'type' => 'INT',
                'constraint' => 1,
            ],
        ]);

        $this->forge->addKey('id', true);

        // Pastikan tipe data dan nama tabel/kolom konsisten dengan tabel yang dirujuk
        $this->forge->addForeignKey('siswa_id', 'siswaa', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('mata_pelajaran_id', 'mata_pelajaran', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('keterampilanA');
    }

    public function down()
    {
        $this->forge->dropTable('keterampilanA');
    }
}
