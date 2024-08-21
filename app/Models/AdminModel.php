<?php 

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model 
{
    protected $table = 'admin';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password'];
}

?>