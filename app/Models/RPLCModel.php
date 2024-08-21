<?php

namespace App\Models;

use CodeIgniter\Model;

class RPLCModel extends Model
{
    protected $table = 'rplc';
    protected $useTimestamps = true;
    protected $allowedFields = ['nis_siswa', 'username_siswa', 'password_siswa',  'slug', 'nama_siswa',  'jk_siswa', 'nohp_siswa', 'alamat_siswa', 'foto_siswa'];

    // Digunakan untuk detail
    public function getRPLC($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        
        return $this->where(['slug' => $slug])->first();
    }
}
