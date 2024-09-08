<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanModel extends Model
{
    protected $table      = 'jawaban';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['pertanyaan_id', 'jawaban', 'jawaban_benar', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
