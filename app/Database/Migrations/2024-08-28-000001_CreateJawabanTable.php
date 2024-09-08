<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJawabanTable extends Migration
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
            'question_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'answer_text' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'is_correct' => [
                'type'       => 'BOOLEAN',
                'null'       => false,
                'default'    => false,
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
        $this->forge->addForeignKey('question_id', 'questions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('answers');
    }

    public function down()
    {
        $this->forge->dropTable('answers');
    }
}
