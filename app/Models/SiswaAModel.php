<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaAModel extends Model
{
    protected $table = 'siswaa';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis_siswa', 'username_siswa', 'password_siswa',  'slug', 'nama_siswa',  'jk_siswa', 'nohp_siswa', 'alamat_siswa', 'foto_siswa'];
    protected $useTimestamps = true;

    public function getSiswaWithNilai()
    {
        return $this->select('siswaa.*, nilaia.mata_pelajaran, nilaia.nilai')
            ->join('nilaia', 'nilaia.siswa_id = siswaa.id')
            ->findAll();
    }
}
