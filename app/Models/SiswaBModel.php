<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaBModel extends Model
{
    protected $table = 'siswab';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nis_siswa', 'username_siswa', 'password_siswa',  'slug', 'nama_siswa',  'jk_siswa', 'nohp_siswa', 'alamat_siswa', 'foto_siswa'];
    protected $useTimestamps = true;

     // Digunakan untuk detail
     public function getRPLB($slug = false)
     {
         if ($slug == false) {
             return $this->findAll();
         }
         
         return $this->where(['slug' => $slug])->first();
     }

    // Digunakan untuk mendapatkan Nilai
     public function getSiswaWithNilai()
    {
        return $this->select('siswab.*, nilaib.mata_pelajaran, nilaib.nilai')
            ->join('nilaib', 'nilaib.siswa_id = siswab.id')
            ->findAll();
    }

    public function login($username_siswa, $password_siswa)
{
    return $this->db->table('siswab')
        ->where([
            'username_siswa' => $username_siswa,
            'password_siswa' => $password_siswa
        ])
        ->get()
        ->getRowArray();
}

}
