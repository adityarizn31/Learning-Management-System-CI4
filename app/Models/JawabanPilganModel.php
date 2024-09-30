<?php

namespace App\Models;

use CodeIgniter\Model;

class JawabanPilganModel extends Model
{
    protected $table = 'jawaban_alpro';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_siswa', 'id_soal', 'jawaban', 'created_at', 'updated_at'];
}
