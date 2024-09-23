<?php

namespace App\Models;

use CodeIgniter\Model;

class MataPelajaranModel extends Model
{
    protected $table = 'matapelajaran';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_matapelajaran', 'guru_matapelajaran', 'jam_matapelajaran', 'fotoguru_matapelajaran', 'slug'];

    // Digunakan untuk detail
    public function getMataPelajaran($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
