<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaCModel extends Model
{
    protected $table = 'siswac';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis_siswa', 'username_siswa', 'password_siswa',  'slug', 'nama_siswa',  'jk_siswa', 'nohp_siswa', 'alamat_siswa', 'foto_siswa'];
    protected $useTimestamps = true;

    public function getSiswaWithNilai()
    {
        return $this->select('siswac.*, nilaic.mata_pelajaran, nilaic.nilai')
            ->join('nilaic', 'nilaic.siswa_id = siswac.id')
            ->findAll();
    }
}
