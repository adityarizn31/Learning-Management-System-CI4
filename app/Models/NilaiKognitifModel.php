<?php 

namespace App\Models;

use CodeIgniter\Model;

class NilaiKognitifModel extends Model 
{
    protected $table = 'nilaikognitif';
    protected $useTimestamps = true;
    protected $allowedFields = ['nilai'];
}

?>