<?php 

namespace App\Models;

use CodeIgniter\Model;

class NilaiKeterampilanModel extends Model 
{
    protected $table = 'nilaiketerampilan';
    protected $useTimestamps = true;
    protected $allowedFields = ['nilaiketerampilan'];
}

?>