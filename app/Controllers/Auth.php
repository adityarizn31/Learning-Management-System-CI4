<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\RPLAModel;
use App\Models\RPLBModel;
use App\Models\RPLCModel;
use App\Models\MataPelajaranModel;
use App\Models\GuruModel;

use App\Models\MateriAlproModel;
use App\Models\TugasAlproModel;

use App\Models\SiswaAModel;
use App\Models\SiswaBModel;
use App\Models\SiswaCModel;
use App\Models\NilaiAModel;
use App\Models\NilaiBModel;
use App\Models\NilaiCModel;

use CodeIgniter\Config\Services;

class Auth extends BaseController
{
    protected $adminModel;
    protected $rplAModel;
    protected $rplBModel;
    protected $rplCModel;
    protected $matapelajaranModel;
    protected $guruModel;

    protected $materiAlproModel;
    protected $tugasAlproModel;

    protected $siswaAModel;
    protected $siswaBModel;
    protected $siswaCModel;
    protected $nilaiAModel;
    protected $nilaiBModel;
    protected $nilaiCModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->rplAModel = new RPLAModel();
        $this->rplBModel = new RPLBModel();
        $this->rplCModel = new RPLCModel();
        $this->matapelajaranModel = new MataPelajaranModel();
        $this->guruModel = new GuruModel();

        $this->materiAlproModel = new MateriAlproModel();
        $this->tugasAlproModel = new TugasAlproModel();

        $this->siswaAModel = new SiswaAModel();
        $this->siswaBModel = new SiswaBModel();
        $this->siswaCModel = new SiswaCModel();
        $this->nilaiAModel = new NilaiAModel();
        $this->nilaiBModel = new NilaiBModel();
        $this->nilaiCModel = new NilaiCModel();
    }















    public function loginsiswa()
    {
        helper(['form']);
        $SISWAA = $this->siswaAModel->findAll();
        $SISWAB = $this->siswaBModel->findAll();
        $SISWAC = $this->siswaCModel->findAll();
        $data = [
            'title' => 'Login Siswa || Siswa Stemanikaku',
            'siswaa' => $SISWAA,
            'siswab' => $SISWAB,
            'siswac' => $SISWAC,
            'validation' => \Config\Services::validation()
        ];

        // Digunakan untuk fungsi yg tidak bisa di akses ketika sudah login
        if (session('id')) {
            return redirect()->to('SiswaController/');
        }

        return view('auth/loginsiswa', $data);
    }

    public function loginprocess()
{
    $post = $this->request->getVar();

    // Check in siswaAModel
    $query = $this->siswaAModel->getWhere(['username_siswa' => $post['username_siswa']]);
    $user = $query->getRow();

    if (!$user) {
        // If not found in siswaAModel, check in siswaBModel
        $query = $this->siswaBModel->getWhere(['username_siswa' => $post['username_siswa']]);
        $user = $query->getRow();
    }

    if (!$user) {
        // If not found in siswaBModel, check in siswaCModel
        $query = $this->siswaCModel->getWhere(['username_siswa' => $post['username_siswa']]);
        $user = $query->getRow();
    }

    if ($user) {
        if (password_verify($post['password_siswa'], $user->password_siswa)) {
            $params = ['id' => $user->id];
            session()->set($params);
            // return redirect()->to('SiswaController/');
            return redirect()->to('/AdminController/dataMataPelajaran');
        } else {
            return redirect()->back()->with('errors', 'Password tidak sesuai !!');
        }
    } else {
        return redirect()->back()->with('errors', 'Username tidak ada !!');
    }
}


    public function logout()
    {
        session()->remove('id');
        return redirect()->to(site_url('login'));
    }
}
