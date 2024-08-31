<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaBModel extends Model
{
    protected $table = 'siswab';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis_siswa', 'username_siswa', 'password_siswa',  'slug', 'nama_siswa',  'jk_siswa', 'nohp_siswa', 'alamat_siswa', 'foto_siswa'];
    protected $useTimestamps = true;

    public function getSiswaWithNilai()
    {
        return $this->select('siswab.*, nilaib.mata_pelajaran, nilaib.nilai')
            ->join('nilaib', 'nilaib.siswa_id = siswab.id')
            ->findAll();
    }
}
