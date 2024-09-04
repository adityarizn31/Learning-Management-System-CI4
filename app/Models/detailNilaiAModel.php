<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaAModel extends Model
{
    protected $table = 'detailnilai_a';
    protected $primaryKey = 'id';
    protected $allowedFields = ['siswa_id', 'nilai_id', 'tugas_id',  'judul_tugas', 'jumlah_pertemuan',  'created_at', 'updated_at'];
    protected $useTimestamps = true;

    // Digunakan untuk detail siswa
    public function getRPLA($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getSiswaWithNilai()
    {
        return $this
            ->select('siswaa.*, nilaia.mata_pelajaran, nilaia.nilai')
            ->join('nilaia', 'nilaia.siswa_id = siswaa.id')
            ->findAll();
    }

    public function getDetailNilaiA()
    {
        return $this
            ->select('siswaa.*, nilaia.mata_pelajaran, nilaia.nilai')
            ->join('nilaia', 'nilaia.siswa_id = siswaa.id')
            ->join('tugas_alpro', 'tugas_alpro.siswa_id = siswaa.id')
            ->findAll();
    }
}
