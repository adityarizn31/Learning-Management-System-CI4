<?php
namespace App\Models;

use CodeIgniter\Model;

class SoalModel extends Model
{
    protected $table = 'soal';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'pertanyaan',
    ];

    public function getOptions()
    {
        return $this->hasMany('JawabanModel', 'pertanyaan_id', 'id');
    }
}