<?php 

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model 
{
    protected $table = 'guru';
    protected $useTimestamps = true;
    protected $allowedFields = ['username_guru', 'password_guru', 'slug', 'nip_guru', 'nama_guru', 'jk_guru', 'alamat_guru', 'nohp_guru', 'pendidikanterakhir_guru', 'foto_guru', 'level'];

    // Digunakan untuk detail
    public function getGuru($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        
        return $this->where(['slug' => $slug])->first();
    }

    public function login($username_guru, $password_guru)
{
    return $this->db->table('guru')
        ->where([
            'username_guru' => $username_guru,
            'password_guru' => $password_guru
        ])
        ->get()
        ->getRowArray();
}

}

?>