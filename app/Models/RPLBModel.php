<?php

namespace App\Models;

use CodeIgniter\Model;

class RPLBModel extends Model
{
    protected $table = 'rplb';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nis_siswa', 'username_siswa', 'password_siswa',  'slug', 'nama_siswa',  'jk_siswa', 'nohp_siswa', 'alamat_siswa', 'foto_siswa'];

    // Digunakan untuk detail
    public function getRPLB($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        
        return $this->where(['slug' => $slug])->first();
    }

    public function getSiswaWithNilai()
    {
        return $this->select('rplb.*, nilaia.mata_pelajaran, nilaia.nilai')
            ->join('nilaia', 'nilaia.siswa_id = rplb.id')
            ->findAll();
    }
}
