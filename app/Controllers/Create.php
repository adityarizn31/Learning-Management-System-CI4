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

use App\Models\SoalModel;
use App\Models\JawabanModel;
use App\Models\JawabanModelModel;
use CodeIgniter\Config\Services;

class Create extends BaseController
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

    protected $soalModel;
    protected $jawabanModel;

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

        $this->soalModel = new SoalModel();
        $this->jawabanModel = new JawabanModel();
    }










    // Bagian Admin
    // Done
    public function createGuru()
    {
        helper(['form']);
        $data = [
            'title' => 'Form Tambah Akun Guru || Admin Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/guru/createGuru', $data);
    }

    public function saveGuru()
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

        $fileFotoGuru = $this->request->getFile('foto_guru');
        if ($fileFotoGuru->getError() == 4) {
        } else {
            $namaFotoGuru = $fileFotoGuru->getName();
            $fileFotoGuru->move('img/guru', $namaFotoGuru);
        }

        $slug = url_title($this->request->getVar('nama_guru'), '-', true);
        $this->guruModel->save([
            'username_guru' => $this->request->getVar('username_guru'),
            'password_guru' => $this->request->getVar('password_guru'),
            'slug' => $slug,
            'nip_guru' => $this->request->getVar('nip_guru'),
            'nama_guru' => $this->request->getVar('nama_guru'),
            'jk_guru' => $this->request->getVar('jk_guru'),
            'alamat_guru' => $this->request->getVar('alamat_guru'),
            'nohp_guru' => $this->request->getVar('nohp_guru'),
            'pendidikanterakhir_guru' => $this->request->getVar('pendidikanterakhir_guru'),
            'foto_guru' => $namaFotoGuru
            // 'level' => done
        ]);
        session()->setFlashdata('pesan', 'Guru berhasil ditambahkan !!');
        return redirect()->to('/AdminController/dataGuru');        
    }

    // Done
    public function createSiswaA()
    {
        helper(['form']);
        $SISWAA = $this->siswaAModel->findAll();
        $data = [
            'title' => 'Tambah Data Siswa RPL A || Admin Stemanikaku',
            'validation' => \Config\Services::validation(),
            'siswaa' => $SISWAA
        ];

        return view('admin/rpla/createSiswaA', $data);
    }

    // Done
    public function saveSiswaA()
    {
        $validate = $this->validate([
            'nis_siswa' => [
                'rules' => 'required[siswaa.nis_siswa]|is_natural',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!',
                    'is_natural' => 'Hanya boleh diisi angka !!'
                ],
            ],
            'username_siswa' => [
                'rules' => 'required[siswaa.username_siswa]',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!'
                ],
            ],
            'password_siswa' => [
                'rules' => 'required[siswaa.password_siswa]',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!'
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required[siswaa.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa harus diisi !!'
                ],
            ],
            'jk_siswa' => [
                'rules' => 'required[siswaa.jk_siswa]',
                'errors' => [
                    'required' => 'Jenis kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[siswaa.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP/Whatsapp Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[siswaa.alamat_siswa]',
                'errors' => [
                    'required' => 'Alamat Siswa harus diisi !!'
                ],
            ],
            'foto_siswa' => [
                'rules' => 'uploaded[foto_siswa]|max_size[foto_siswa,2048]|is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Siswa harus diisi !!',
                    'max_size' => 'Ukuran Foto Maksimal 2MB !!',
                    'mime_in' => 'Format Foto harus JPG,JPEG,PNG !!'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFotoSiswaA = $this->request->getFile('foto_siswa');
        if ($fileFotoSiswaA->getError() == 4) {
        } else {
            $namaFotoSiswaA = $fileFotoSiswaA->getName();
            $fileFotoSiswaA->move('img/rpla', $namaFotoSiswaA);
        }

        $slug = url_title($this->request->getVar('nama_siswa'), '-', true);
        $this->siswaAModel->save([
            'nis_siswa' => $this->request->getVar('nis_siswa'),
            'username_siswa' => $this->request->getVar('username_siswa'),
            'password_siswa' => $this->request->getVar('password_siswa'),
            'slug' => $slug,
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'jk_siswa' => $this->request->getVar('jk_siswa'),
            'nohp_siswa' => $this->request->getVar('nohp_siswa'),
            'alamat_siswa' => $this->request->getVar('alamat_siswa'),
            'foto_siswa' => $namaFotoSiswaA,
            // 'kelas_siswa' => done
            // 'jurusan_siswa' => done   
            // 'level' => done
        ]);
        session()->setFlashdata('pesan', 'Siswa RPL A berhasil ditambahkan !!');
        return redirect()->to('/AdminController/dataSiswaRPLA');
    }

    // Done
    public function createSiswaB()
    {
        helper(['form']);
        $SISWAB = $this->siswaBModel->findAll();
        $data = [
            'title' => 'Tambah Data Siswa RPL B || Guru Stemanikaku',
            'validation' => \Config\Services::validation(),
            'siswab' => $SISWAB
        ];

        return view('admin/rplb/createSiswaB', $data);
    }

    // Done
    public function saveSiswaB()
    {
        $validate = $this->validate([
            'nis_siswa' => [
                'rules' => 'required[siswab.nis_siswa]|is_natural',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!',
                    'is_natural' => 'Hanya boleh diisi angka !!'
                ],
            ],
            'username_siswa' => [
                'rules' => 'required[siswab.username_siswa]',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!'
                ],
            ],
            'password_siswa' => [
                'rules' => 'required[siswab.password_siswa]',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!'
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required[siswab.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa harus diisi !!'
                ],
            ],
            'jk_siswa' => [
                'rules' => 'required[siswab.jk_siswa]',
                'errors' => [
                    'required' => 'Jenis kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[siswab.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP/Whatsapp Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[siswab.alamat_siswa]',
                'errors' => [
                    'required' => 'Alamat Siswa harus diisi !!'
                ],
            ],
            'foto_siswa' => [
                'rules' => 'uploaded[foto_siswa]|max_size[foto_siswa,2048]|is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Siswa harus diisi !!',
                    'max_size' => 'Ukuran Foto Maksimal 2MB !!',
                    'mime_in' => 'Format Foto harus JPG,JPEG,PNG !!'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFotoSiswaB = $this->request->getFile('foto_siswa');
        if ($fileFotoSiswaB->getError() == 4) {
        } else {
            $namaFotoSiswaB = $fileFotoSiswaB->getName();
            $fileFotoSiswaB->move('img/rplb', $namaFotoSiswaB);
        }

        $slug = url_title($this->request->getVar('nama_siswa'), '-', true);
        $this->siswaBModel->save([
            'nis_siswa' => $this->request->getVar('nis_siswa'),
            'username_siswa' => $this->request->getVar('username_siswa'),
            'password_siswa' => $this->request->getVar('password_siswa'),
            'slug' => $slug,
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'jk_siswa' => $this->request->getVar('jk_siswa'),
            'nohp_siswa' => $this->request->getVar('nohp_siswa'),
            'alamat_siswa' => $this->request->getVar('alamat_siswa'),
            'foto_siswa' => $namaFotoSiswaB
            // 'kelas_siswa' => done
            // 'jurusan_siswa' => done   
            // 'level' => done
        ]);
        session()->setFlashdata('pesan', 'Siswa RPL B berhasil ditambahkan !!');
        return redirect()->to('/AdminController/dataSiswaRPLB');
    }

    // Done
    public function createSiswaC()
    {
        helper(['form']);
        $SISWAC = $this->siswaCModel->findAll();
        $data = [
            'title' => 'Tambah Data Siswa RPL C || Guru Stemanikaku',
            'validation' => \Config\Services::validation(),
            'siswac' => $SISWAC
        ];

        return view('admin/rplc/createSiswaC', $data);
    }

    // Done
    public function saveSiswaC()
    {
        $validate = $this->validate([
            'nis_siswa' => [
                'rules' => 'required[siswac.nis_siswa]|is_natural',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!',
                    'is_natural' => 'Hanya boleh diisi angka !!'
                ],
            ],
            'username_siswa' => [
                'rules' => 'required[siswac.username_siswa]',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!'
                ],
            ],
            'password_siswa' => [
                'rules' => 'required[siswac.password_siswa]',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!'
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required[siswac.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa harus diisi !!'
                ],
            ],
            'jk_siswa' => [
                'rules' => 'required[siswac.jk_siswa]',
                'errors' => [
                    'required' => 'Jenis kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[siswac.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP/Whatsapp Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[siswac.alamat_siswa]',
                'errors' => [
                    'required' => 'Alamat Siswa harus diisi !!'
                ],
            ],
            'foto_siswa' => [
                'rules' => 'uploaded[foto_siswa]|max_size[foto_siswa,2048]|is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Siswa harus diisi !!',
                    'max_size' => 'Ukuran Foto Maksimal 2MB !!',
                    'mime_in' => 'Format Foto harus JPG,JPEG,PNG !!'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFotoSiswaC = $this->request->getFile('foto_siswa');
        if ($fileFotoSiswaC->getError() == 4) {
        } else {
            $namaFotoSiswaC = $fileFotoSiswaC->getName();
            $fileFotoSiswaC->move('img/rplc', $namaFotoSiswaC);
        }

        $slug = url_title($this->request->getVar('nama_siswa'), '-', true);
        $this->siswaCModel->save([
            'nis_siswa' => $this->request->getVar('nis_siswa'),
            'username_siswa' => $this->request->getVar('username_siswa'),
            'password_siswa' => $this->request->getVar('password_siswa'),
            'slug' => $slug,
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'jk_siswa' => $this->request->getVar('jk_siswa'),
            'nohp_siswa' => $this->request->getVar('nohp_siswa'),
            'alamat_siswa' => $this->request->getVar('alamat_siswa'),
            'foto_siswa' => $namaFotoSiswaC
            // 'kelas_siswa' => done
            // 'jurusan_siswa' => done   
            // 'level' => done
        ]);
        session()->setFlashdata('pesan', 'Siswa RPL C berhasil ditambahkan !!');
        return redirect()->to('/AdminController/dataSiswaRPLC');
    }

    // Done
    public function createMataPelajaran()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Mata Pelajaran || Admin Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/matapelajaran/createMataPelajaran', $data);
    }

    // Done
    public function saveMatpel()
    {
        $validate = $this->validate([
            'nama_matapelajaran' => [
                'rules' => 'required[matapelajaran.nama_matapelajaran]',
                'errors' => [
                    'required' => 'Nama Matpel harus diisi !!'
                ],
            ],
            'guru_matapelajaran' => [
                'rules' => 'required[matapelajaran.guru_matapelajaran]',
                'errors' => [
                    'required' => 'Guru Matpel harus diisi !!'
                ],
            ],
            'jam_matapelajaran' => [
                'rules' => 'required[matapelajaran.jam_matapelajaran]|is_natural',
                'errors' => [
                    'required' => 'Jam Mata Pelajaran harus diisi !!',
                    'is_natural' => 'Hanya boleh diisi angka !!'
                ],
            ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $slug = url_title($this->request->getVar('nama_matapelajaran'), '-', true);
        $this->matapelajaranModel->save([
            'nama_matapelajaran' => $this->request->getVar('nama_matapelajaran'),
            'guru_matapelajaran' => $this->request->getVar('guru_matapelajaran'),
            'jam_matapelajaran' => $this->request->getVar('jam_matapelajaran'),
            'slug' => $slug
        ]);
        session()->setFlashdata('pesan', 'Mata Pelajaran berhasil ditambahkan !!');
        return redirect()->to('/AdminController/dataMataPelajaran');
    }
    
    





























    // Bagian Guru
     // Done
     public function createMateriAlpro()
     {
         helper(['form']);
         $data = [
             'title' => 'Tambah Materi Algoritma Pemrograman || Guru Stemanikaku',
             'validation' => \Config\Services::validation()
         ];
         return view('guru/alpro/materi_alpro/createMateriAlpro', $data);
     }
 
     // Done
     public function saveMateriAlpro()
     {
         $validate = $this->validate([
             'nama_materi' => [
                 'rules' => 'required[matapelajaran.nama_materi]',
                 'errors' => [
                     'required' => 'Judul Materi harus diisi !!'
                 ],
             ],
             'deskripsi_materi' => [
                 'rules' => 'required[matapelajaran.deskripsi_materi]',
                 'errors' => [
                     'required' => 'Deskripsi Materi harus diisi !!'
                 ],
             ],
             'dokumen_materi' => [
                 'rules' => 'uploaded[dokumen_materi]|max_size[dokumen_materi,2048]|mime_in[dokumen_materi,application/pdf]|ext_in[dokumen_materi,pdf]',
                 'errors' => [
                     'uploaded' => 'Dokumen Materi Harus Diisi !!',
                     'max_size' => 'File Dokumen Materi terlalu besar, Kompress terlebih dahulu !!',
                     'mime_in' => 'Format Dokumen Materi Harus PDF !!',
                     'ext_in' => 'Format Dokumen Materi Harus PDF !!'
                 ],
             ],
         ]);
 
         if (!$validate) {
             return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
         }
 
         $berkasDokumenMateriAlpro = $this->request->getFile('dokumen_materi');
         $namaDokumenMateriAlpro = $berkasDokumenMateriAlpro->getName();
         $berkasDokumenMateriAlpro->move('dokumen/alpro', $namaDokumenMateriAlpro);
 
         $slug = url_title($this->request->getVar('nama_materi'), '-', true);
         $this->materiAlproModel->save([
             'nama_materi' => $this->request->getVar('nama_materi'),
             'deskripsi_materi' => $this->request->getVar('deskripsi_materi'),
             'dokumen_materi' => $namaDokumenMateriAlpro,
             'slug' => $slug
         ]);
         session()->setFlashdata('pesan', 'Materi baru Algoritma Pemrograman berhasil ditambahkan !!');
         return redirect()->to('/guru/alpro/materi_alpro/dataMateriAlpro');
     }
 
     public function createTugasAlpro()
     {
         helper(['form']);
         $data = [
             'title' => 'Buat Tugas Alpro || Guru Stemanika',
             'validation' => \Config\Services::validation()
         ];
         return view('guru/alpro/tugas_alpro/createTugasAlpro', $data);
     }
 
     public function saveTugasAlpro()
     {
         $validate = $this->validate([
             'judultugas_alpro' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => 'Judul Tugas Alpro harus diisi !!'
                 ],
             ],
             'deskripsitugas_alpro' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => 'Deskripsi Tugas Alpro harus diisi !!'
                 ],
             ],
             'bataswaktu_alpro' => [
                 'rules' => 'required',
                 'errors' => [
                     'required' => 'Batas Waktu Tugas Alpro harus diisi !!'
                 ],
             ],
             'filetugas_alpro' => [
                 'rules' => 'uploaded[filetugas_alpro]|max_size[filetugas_alpro,2048]|mime_in[filetugas_alpro,application/pdf]|ext_in[filetugas_alpro,pdf]',
                 'errors' => [
                     'uploaded' => 'File Tugas Alpro Harus Diisi !!',
                     'max_size' => 'File File Tugas Alpro terlalu besar, Kompress terlebih dahulu !!',
                     'mime_in' => 'Format File Tugas Alpro Harus PDF !!',
                     'ext_in' => 'Format File Tugas Alpro Harus PDF !!'
                 ],
             ],
         ]);
 
         if (!$validate) {
             return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
         }
 
         $berkasTugasAlpro = $this->request->getFile('filetugas_alpro');
         $namaBerkasTugasAlpro = $berkasTugasAlpro->getRandomName();
         $berkasTugasAlpro->move('dokumen/tugasAlpro', $namaBerkasTugasAlpro);
 
         $slug = url_title($this->request->getVar('judultugas_alpro'), '-', true);
         $this->tugasAlproModel->save([
             'judultugas_alpro' => $this->request->getVar('judultugas_alpro'),
             'deskripsitugas_alpro' => $this->request->getVar('deskripsitugas_alpro'),
             'bataswaktu_alpro' => $this->request->getVar('bataswaktu_alpro'),
             'filetugas_alpro' => $namaBerkasTugasAlpro,
             'slug' => $slug,
         ]);
 
         session()->setFlashdata('pesan', 'Tugas Algoritma Pemrograman berhasil dibuat !!');
         return redirect()->to('/guru/alpro/tugas_alpro/dataTugasAlpro');
     }
     
    // Done
    // Algoritma Pemrograman RPL A
    public function createNilaiSiswaA()
    {
        $SISWAA = $this->siswaAModel->findAll();
        $data = [
            'title' => 'Input Nilai Siswa RPL A || Guru Stemanikaku',
            'siswaa' => $SISWAA
        ];
        return view('guru/rpla/createNilaiSiswaA', $data);
    }

    // Done
    // Algoritma Pemrograman RPL A
    public function saveNilaiA()
    {
        if (!$this->validate([
            'siswa_id' => 'required',
            'mata_pelajaran' => 'required',
            'nilai' => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[100]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->nilaiAModel->save([
            'siswa_id' => $this->request->getVar('siswa_id'),
            'mata_pelajaran' => $this->request->getVar('mata_pelajaran'),
            'nilai' => $this->request->getVar('nilai'),
        ]);

        session()->setFlashdata('pesan', 'Nilai siswa berhasil disimpan.');
        return redirect()->to('/GuruController/dataNilaiRPLA_Alpro');
    }

    // Done
    // Algoritma Pemrograman RPL B
    public function createNilaiSiswaB()
    {
        $SISWAB = $this->siswaBModel->findAll();
        $data = [
            'title' => 'Input Nilai Siswa RPL B || Guru Stemanikaku',
            'siswab' => $SISWAB
        ];
        return view('guru/rplb/createNilaiSiswaB', $data);
    }

    // Done
    // Algoritma Pemrograman RPL B
    public function saveNilaiB()
    {
        if (!$this->validate([
            'siswa_id' => 'required',
            'mata_pelajaran' => 'required',
            'nilai' => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[100]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->nilaiBModel->save([
            'siswa_id' => $this->request->getVar('siswa_id'),
            'mata_pelajaran' => $this->request->getVar('mata_pelajaran'),
            'nilai' => $this->request->getVar('nilai'),
        ]);

        session()->setFlashdata('pesan', 'Nilai siswa berhasil disimpan.');
        return redirect()->to('/GuruController/dataNilaiRPLB_Alpro');
    }

    // Done
    // Algoritma Pemrograman RPL B
    public function createNilaiSiswaC()
    {
        $SISWAC = $this->siswaCModel->findAll();
        $data = [
            'title' => 'Input Nilai Siswa RPL C || Guru Stemanikaku',
            'siswac' => $SISWAC
        ];
        return view('guru/rplc/createNilaiSiswaC', $data);
    }

    // Done
    // Algoritma Pemrograman RPL B
    public function saveNilaiC()
    {
        if (!$this->validate([
            'siswa_id' => 'required',
            'mata_pelajaran' => 'required',
            'nilai' => 'required|integer|greater_than_equal_to[0]|less_than_equal_to[100]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->nilaiCModel->save([
            'siswa_id' => $this->request->getVar('siswa_id'),
            'mata_pelajaran' => $this->request->getVar('mata_pelajaran'),
            'nilai' => $this->request->getVar('nilai'),
        ]);

        session()->setFlashdata('pesan', 'Nilai siswa berhasil disimpan.');
        return redirect()->to('/GuruController/dataNilaiRPLC_Alpro');
    }

    public function createNilaiKeterampilanA() 
    {
        $SISWAA = $this->siswaAModel->findAll();
        $MATAPELAJARAN = $this->matapelajaranModel->findAll();
        $data = [
            'title' => 'Input Keterampilan Siswa RPL A || Guru Stemanikaku',
            'siswaa' => $SISWAA,
            'matapelajaran' => $MATAPELAJARAN
        ];
        return view('guru/rpla/createNilaiKeterampilanA', $data);
    }

    public function saveKeterampilanRPLA()
    {
        
    }

    public function createPilgan()
    {
        $data = [
            'title' => 'Buat Soal Pilihan Ganda || Guru Stemanikaku'
        ];
        return view('guru/soal/createPilgan', $data);
    }

    public function savePilgan()
    {

        $questionModel = new SoalModel();
        $answerModel = new JawabanModel();

        $SOAL = $this->soalModel->findAll();
        $data = [
            'guru_id'=> session()->get('guru_id'),
            'pertanyaan' => $this->request->getVar('pertanyaan')
        ];

        $questionModel->save($data);
        $questionId = $questionModel->insertID();

        $answers = $this->request->getPost('jawaban');
        $isCorrect = $this->request->getPost('jawaban_benar');

        foreach ($answers as $key => $answer) {
            $answerData = [
                'pertanyaan_id' => $questionId,
                'jawaban' => $answer,
                'jawaban_benar' => isset($isCorrect[$key]) ? 1 : 0,
            ];

            $answerModel->save($answerData);
        }

        return redirect()->to('/guru/createQuestion')->with('success', 'Question created successfully.');
    }
}