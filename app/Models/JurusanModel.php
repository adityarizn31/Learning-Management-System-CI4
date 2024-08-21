<?php 

namespace App\Models;

use CodeIgniter\Model;

class JurusanModel extends Model 
{
    protected $table = 'jurusan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_jurusan'];
}

?>