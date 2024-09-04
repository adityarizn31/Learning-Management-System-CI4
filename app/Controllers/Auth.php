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

class AuthController extends BaseController
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









    public function registerGuru()
    {
        helper(['form']);
        $data = [
            'title' => 'Register Akun || Admin Stemanikaku'
        ];
        return view('auth/register', $data);
    }

    public function saveRegisterGuru()
    {
        $validate = $this->validate([
            'username_guru' => [
                'rules' => 'required[guru.username_guru]',
                'errors' => [
                    'required' => 'Username Guru harus diisi !!'
                ],
            ],
            'password_guru' => [
                'rules' => 'required[guru.password_guru]',
                'errors' => [
                    'required' => 'Password Guru harus diisi !!'
                ],
            ],
            'nip_guru' => [
                'rules' => 'required[guru.nip_guru]',
                'errors' => [
                    'required' => 'NIP Guru harus diisi !!'
                ],
            ],
            'nama_guru' => [
                'rules' => 'required[guru.nama_guru]',
                'errors' => [
                    'required' => 'Nama Guru harus diisi !!'
                ],
            ],
            'jk_guru' => [
                'rules' => 'required[guru.jk_guru]',
                'errors' => [
                    'required' => 'Jenis Kelamin Guru harus diisi !!'
                ],
            ],
            'alamat_guru' => [
                'rules' => 'required[guru.alamat_guru]',
                'errors' => [
                    'required' => 'Alamat Guru harus diisi !!'
                ],
            ],
            'nohp_guru' => [
                'rules' => 'required[guru.nohp_guru]',
                'errors' => [
                    'required' => 'No Hp Guru harus diisi !!'
                ],
            ],
            'pendidikanterakhir_guru' => [
                'rules' => 'required[guru.pendidikanterakhir_guru]',
                'errors' => [
                    'required' => 'Pendidikan Terakhir Guru harus diisi !!'
                ],
            ],
            'foto_guru' => [
                'rules' => 'uploaded[foto_guru]|max_size[foto_guru,2048]|is_image[foto_guru]|mime_in[foto_guru,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Guru harus diisi !!',
                    'max_size' => 'Ukuran Foto Maksimal 2MB !!',
                    'mime_in' => 'Format Foto harus JPG,JPEG,PNG !!'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function login()
    {
        $data = [
            'title' => 'Login Admin || Admin Stemanikaku'
        ];
        return view('admin/login', $data);
    }

    public function logout()
    {
        session()->remove('id');
        return redirect()->to(site_url('login'));
    }
}
