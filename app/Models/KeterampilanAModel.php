<?php

namespace App\Models;

use CodeIgniter\Model;

class KeterampilanModel extends Model
{
    protected $table = 'keterampilana';
    protected $primaryKey = 'id';
    protected $allowedFields = ['siswa_id', 'mata_pelajaran_id', 'pertemuan', 'pertanyaan', 'nilai'];
}
