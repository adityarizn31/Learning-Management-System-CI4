<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriAlproModel extends Model
{
    protected $table = 'materi_alpro';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_materi', 'deskripsi_materi', 'dokumen_materi', 'slug'];

    // Digunakan untuk Detail
    public function getMatAlpro($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
