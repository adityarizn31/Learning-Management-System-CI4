<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiCModel extends Model
{
    protected $table = 'nilaic';
    protected $primaryKey = 'id';
    protected $allowedFields = ['siswa_id', 'mata_pelajaran', 'nilai', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
