<?php

namespace App\Models;

use CodeIgniter\Model;

class PilganModel extends Model
{
    protected $table = 'pilgan_alpro';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['pertanyaan', 'pilihan_a', 'pilihan_b',  'pilihan_c', 'pilihan_d', 'created_at', 'updated_at'];
}
