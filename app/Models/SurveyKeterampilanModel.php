<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveyKeterampilanModel extends Model
{
    protected $table = 'surveyketerampilan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['pertanyaan1', 'jawaban1', 'pertanyaan2',  'jawaban2', 'pertanyaan3',  'jawaban3', 'pertanyaan4', 'jawaban4', 'pertanyaan5', 'jawaban5', 'created_at', 'updated_at'];

     // Digunakan untuk detail siswa
     public function getSurvey($pertanyaan = false)
     {
         if ($pertanyaan == false) {
             return $this->findAll();
         }
 
         return $this->where(['pertanyaan1' => $pertanyaan])->first();
     }

}
