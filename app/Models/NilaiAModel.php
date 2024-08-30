<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiAModel extends Model
{
    protected $table = 'nilaia';
    protected $primaryKey = 'id';
    protected $allowedFields = ['siswa_id', 'mata_pelajaran', 'nilai', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
