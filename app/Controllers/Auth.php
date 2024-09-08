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
















    public function loginsiswa()
    {
        helper(['form']);
        $SISWAA = $this->siswaAModel->findAll();
        $SISWAB = $this->siswaBModel->findAll();
        $SISWAC = $this->siswaCModel->findAll();
        $data = [
            'title' => 'Login Siswa || Siswa Stemanikaku',
            'siswaa' => $SISWAA,
            'validation' => \Config\Services::validation()
        ];
        return view('auth/loginsiswa', $data);
    }

    public function loginprocess()
    {
        $post = $this->request->getVar();
        $models = [$this->siswaAModel, $this->siswaBModel, $this->siswaCModel];
        $user = null;

        foreach ($models as $model) {
            $query = $model->getWhere(['username_siswa' => $post['username_siswa']]);
            $user = $query->getRow();
            if ($user) {
                break;
            }
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

    // public function checkLogin()
    // {
    //     $validate = $this->validate([
    //         'username_siswa' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Username Siswa harus diisi !!',
    //             ],
    //         ],
    //         'password_siswa' => [
    //             'rules' => 'required',
    //             'errors' => [
    //                 'required' => 'Password Siswa harus diisi !!',
    //             ],
    //         ],
    //     ]);

    //     if ($validate) {
    //         $models = ['siswaa', 'siswab', 'siswac'];
    //         $user = null;

    //         foreach ($models as $model) {
    //             $user = $this->$model->where('username_siswa', $this->request->getPost('username_siswa'))
    //                 ->where('password_siswa', $this->request->getPost('password_siswa'))
    //                 ->first();
    //             if ($user) {
    //                 break;
    //             }
    //         }

    //         if ($user) {
    //             // Proses login berhasil
    //             // Misalnya, simpan data pengguna ke session
    //             session()->set([
    //                 'logged_in' => true,
    //                 'username_siswa' => $user['username_siswa'],
    //                 'password_siswa' => $user['password_siswa'],
    //             ]);

    //             // Redirect ke halaman dashboard atau halaman setelah login
    //             return redirect()->to('/SiswaController/index');
    //         } else {
    //             // Kredensial tidak valid
    //             return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //         }
    //     } else {
    //         // Kembalikan ke halaman sebelumnya dengan input yang sudah diisi dan error
    //         return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     }

    //     //     if ($user) {
    //     //         $username_siswa = $this->request->getVar('username_siswa');
    //     //         $password_siswa = $this->request->getVar('password_siswa');

    //     //         $modelInstance = new $model();
    //     //         $cek = $modelInstance->login($username_siswa, $password_siswa);

    //     //         if ($cek) {
    //     //             session()->set('username_siswa', $cek['username_siswa']);
    //     //             session()->set('passsword_siswa', $cek['passsword_siswa']);
    //     //         }

    //     //     } else {
    //     //         // Kredensial tidak valid
    //     //         // Tambahkan logika untuk kredensial tidak valid di sini
    //     //     }
    //     // } else {
    //     //     // Kembalikan ke halaman sebelumnya dengan input yang sudah diisi dan error
    //     //     return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    //     // }
    // }

    public function saveLogin()
    {
        // Validasi input
        $validate = $this->validate([
            'username_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!',
                ],
            ],
            'password_siswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!',
                ],
            ],
        ]);

        if ($validate) {
            // Misalnya Anda memiliki model untuk setiap tabel
            $models = ['siswaaModel', 'siswabModel', 'siswacModel'];
            $user = null;

            foreach ($models as $model) {
                $user = $this->$model->where('username_siswa', $this->request->getPost('username_siswa'))
                    ->first();
                if ($user && password_verify($this->request->getPost('password_siswa'), $user['password_siswa'])) {
                    break; // Hentikan loop jika user ditemukan dan password cocok
                }
            }

            if ($user) {
                // Proses login berhasil
                // Misalnya, simpan data pengguna ke session
                session()->set([
                    'logged_in' => true,
                    'user_id' => $user['id'],
                    'username_siswa' => $user['username_siswa'],
                    'password_siswa' => $user['password_siswa'],
                ]);

                // Redirect ke halaman dashboard atau halaman setelah login
                return redirect()->to('/SiswaController/');
            } else {
                // Kredensial tidak valid
                return redirect()->back()->withInput()->with('errors', ['login' => 'Username atau Password salah!']);
            }
        } else {
            // Kembalikan ke halaman sebelumnya dengan input yang sudah diisi dan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }

    public function logout()
    {
        session()->remove('id');
        return redirect()->to(site_url('login'));
    }
}
