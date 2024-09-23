<?php
namespace App\Models;

use CodeIgniter\Model;

class JawabanModel extends Model
{
    protected $table = 'jawaban';
    protected $allowedFields = ['pertanyaan_id', 'siswa_id', 'jawaban', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}