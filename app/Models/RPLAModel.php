<?php

namespace App\Models;

use CodeIgniter\Model;

class RPLAModel extends Model
{
    protected $table = 'rpla';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nis_siswa', 'username_siswa', 'password_siswa',  'slug', 'nama_siswa',  'jk_siswa', 'nohp_siswa', 'alamat_siswa', 'foto_siswa'];

    // Digunakan untuk detail siswa
    public function getRPLA($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    // Digunakan untuk mendapatkan Nilai Siswa
    public function getSiswaWithNilai()
    {
        return $this->select('rpla.*, nilaia.mata_pelajaran, nilaia.nilai')
            ->join('nilaia', 'nilaia.siswa_id = rpla.id')
            ->findAll();
    }
}
