<?php

namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table      = 'soal';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['guru_id', 'pertanyaan', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
