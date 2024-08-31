<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNilaiBTable extends Migration
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
            'siswa_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'mata_pelajaran' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'nilai' => [
                'type' => 'INT',
                'constraint' => 3,
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
        $this->forge->addForeignKey('siswa_id', 'siswab', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('nilaib');
    }

    public function down()
    {
        $this->forge->dropTable('nilaib');
    }
}
