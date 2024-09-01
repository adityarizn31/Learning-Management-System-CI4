<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaCModel extends Model
{
    protected $table = 'siswac';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis_siswa', 'username_siswa', 'password_siswa',  'slug', 'nama_siswa',  'jk_siswa', 'nohp_siswa', 'alamat_siswa', 'foto_siswa'];
    protected $useTimestamps = true;

    // Digunakan untuk detail
    public function getRPLC($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        
        return $this->where(['slug' => $slug])->first();
    }

    public function getSiswaWithNilai()
    {
        return $this->select('siswac.*, nilaic.mata_pelajaran, nilaic.nilai')
            ->join('nilaic', 'nilaic.siswa_id = siswac.id')
            ->findAll();
    }
}
