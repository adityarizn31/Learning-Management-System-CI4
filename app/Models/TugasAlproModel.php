<?php 

namespace App\Models;

use CodeIgniter\Model;

class TugasAlproModel extends Model
{
    protected $table = 'tugas_alpro';
    protected $useTimestamps = true;
    protected $allowedFields = ['judultugas_alpro', 'deskripsitugas_alpro', 'bataswaktu_alpro', 'filetugas_alpro', 'slug'];

    // Digunakan untuk detail Alpro
    public function getTugasAlpro($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}

?>