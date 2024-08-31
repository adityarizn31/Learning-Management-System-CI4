<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiBModel extends Model
{
    protected $table = 'nilaib';
    protected $primaryKey = 'id';
    protected $allowedFields = ['siswa_id', 'mata_pelajaran', 'nilai', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
