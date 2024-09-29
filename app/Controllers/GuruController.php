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

use App\Models\SurveyKeterampilanModel;
use App\Models\SoalModel;
use App\Models\JawabanModel;

use CodeIgniter\Config\Services;

class GuruController extends BaseController
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

    protected $surveyKeterampilanModel;
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

        $this->surveyKeterampilanModel = new SurveyKeterampilanModel();
        $this->soalModel = new SoalModel();
        $this->jawabanModel = new JawabanModel();
    }










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
    public function createSiswaA()
    {
        helper(['form']);
        $SISWAA = $this->siswaAModel->findAll();
        $data = [
            'title' => 'Tambah Data Siswa RPL A || Guru Stemanikaku',
            'validation' => \Config\Services::validation(),
            'siswaa' => $SISWAA
        ];

        return view('guru/rpla/createSiswaA', $data);
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
            'foto_siswa' => $namaFotoSiswaA
        ]);
        session()->setFlashdata('pesan', 'Siswa RPL A berhasil ditambahkan !!');
        return redirect()->to('/GuruController/dataSiswaRPLA');
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

        return view('guru/rplb/createSiswaB', $data);
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
        ]);
        session()->setFlashdata('pesan', 'Siswa RPL B berhasil ditambahkan !!');
        return redirect()->to('/GuruController/dataSiswaRPLB');
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

        return view('guru/rplc/createSiswaC', $data);
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
        ]);
        session()->setFlashdata('pesan', 'Siswa RPL C berhasil ditambahkan !!');
        return redirect()->to('/GuruController/dataSiswaRPLC');
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

    public function saveKeterampilanRPLA() {}















    public function index()
    {
        $data = [
            'title' => 'Dashboard || Guru Stemanikaku'
        ];
        return view('guru/index', $data);
    }












    // Done
    public function dataSiswaRPLA()
    {
        $SISWAA = $this->siswaAModel->findAll();
        $data = [
            'title' => 'Siswa RPLA || Guru Stemanikaku',
            'siswaa' => $SISWAA
        ];
        return view('guru/rpla/dataSiswaRPLA', $data);
    }

    // Done
    public function dataSiswaRPLB()
    {
        $SISWAB = $this->siswaBModel->findAll();
        $data = [
            'title' => 'Siswa RPLB || Guru Stemanikaku',
            'siswab' => $SISWAB
        ];
        return view('guru/rplb/dataSiswaRPLB', $data);
    }

    // Done
    public function dataSiswaRPLC()
    {
        $SISWAC = $this->siswaCModel->findAll();
        $data = [
            'title' => 'Siswa RPLC || Guru Stemanikaku',
            'siswac' => $SISWAC
        ];
        return view('guru/rplc/dataSiswaRPLC', $data);
    }

    // Done
    public function dataMataPelajaran()
    {
        $MATPEL = $this->matapelajaranModel->findAll();
        $data = [
            'title' => 'Data Mata Pelajaran || Guru Stemanikaku',
            'matapelajaran' => $MATPEL
        ];
        return view('guru/matapelajaran/dataMataPelajaran', $data);
    }

    // Done
    public function dataGuru()
    {
        $GURU = $this->guruModel->findAll();
        $data = [
            'title' => 'Data Guru || Guru Stemanikaku',
            'guru' => $GURU
        ];
        return view('admin/guru/dataGuru', $data);
    }

    // Done
    public function dataManajemenNilai()
    {
        $data = [
            'title' => 'Data Manajemen Nilai || Guru Stemanikaku'
        ];
        return view('guru/nilai/dataManajemenNilai', $data);
    }

    // Done
    public function dataManajemenKeterampilan()
    {
        $data = [
            'title' => 'Data Manajemen Keterampilan || Guru Stemanikaku'
        ];
        return view('guru/keterampilan/dataManajemenKeterampilan', $data);
    }









    // MATA PELAJARAN
    // Done 
    // Algoritma Pemrograman
    public function dataNilaiRPLA_Alpro()
    {
        $NILAIA = $this->siswaAModel->getSiswaWithNilai();
        $data = [
            'title' => 'Detail Data Nilai RPLA Algoritma Perograman || Guru Stemanikaku',
            'siswa_nilai' => $NILAIA
        ];

        return view('guru/rpla/dataNilaiRPLA_Alpro', $data);
    }

    // Done 
    // Algoritma Pemrograman
    public function dataNilaiRPLB_Alpro()
    {
        $NILAIB = $this->siswaBModel->getSiswaWithNilai();
        $data = [
            'title' => 'Data Nilai RPLB Algoritma Perograman || Guru Stemanikaku',
            'siswa_nilai' => $NILAIB
        ];

        return view('guru/rplb/dataNilaiRPLB_Alpro', $data);
    }

    // Done 
    // Algoritma Pemrograman
    public function dataNilaiRPLC_Alpro()
    {
        $NILAIC = $this->siswaCModel->getSiswaWithNilai();
        $data = [
            'title' => 'Data Nilai RPLC Algoritma Perograman || Guru Stemanikaku',
            'siswa_nilai' => $NILAIC
        ];

        return view('guru/rplc/dataNilaiRPLC_Alpro', $data);
    }

    // Done
    // Grafik Rata Rata
    // public function dataTNilaiRPLA_Alpro()
    // {
    //     $NILAIA = $this->siswaAModel->getSiswaWithNilai();
    //     $data = [
    //         'title' => 'Data Nilai RPLA Algoritma Perograman || Guru Stemanikaku',
    //         'siswa_nilai' => $NILAIA
    //     ];
    //     return view('guru/rpla/dataNilaiRPLA_Alpro', $data);
    // }

    public function dataNilaiKeterampilanA()
    {
        $NILAIKETERAMPILANA = $this->siswaAModel->getSiswaWithNilai();
        $data = [
            'title' => 'Data Nilai Keterampilan A || Guru Stemanikaku',
            'siswa_nilai' => $NILAIKETERAMPILANA
        ];
        return view('guru/rpla/dataNilaiKeterampilanA', $data);
    }











    // Done
    public function dataMateriAlpro()
    {
        $ALPRO = $this->materiAlproModel->findAll();
        $data = [
            'title' => 'Materi Algoritma Pemrograman || Guru Stemanikaku',
            'materi_alpro' => $ALPRO
        ];
        return view('guru/alpro/materi_alpro/dataMateriAlpro', $data);
    }

    // Done
    public function dataTugasAlpro()
    {
        $TUGASALPRO = $this->tugasAlproModel->findAll();
        $data = [
            'title' => 'Daftar Tugas Algoritma Pemrograman || Guru Stemanikaku',
            'tugas_alpro' => $TUGASALPRO
        ];
        return view('guru/alpro/tugas_alpro/dataTugasAlpro', $data);
    }

    // Done 
    public function dataPengetahuanAlpro()
    {
        $SURVEYKETERAMPILAN = $this->surveyKeterampilanModel->findAll();
        $data = [
            'title' => 'Daftar Pengetahuan Algoritma Pemrograman || Guru Stemanikaku',
            'surveyketerampilan' => $SURVEYKETERAMPILAN
        ];
        return view('guru/alpro/pengetahuan_alpro/dataPengetahuanAlpro', $data);
    }

    // Done
    public function dataKeterampilanAlpro()
    {
        $SURVEYKETERAMPILAN = $this->surveyKeterampilanModel->findAll();
        $data = [
            'title' => 'Keterampilan Alpro || Guru Stemanikaku',
            'surveyketerampilan' => $SURVEYKETERAMPILAN
        ];
        return view('guru/alpro/keterampilan_alpro/dataKeterampilanAlpro', $data);
    }











    // Done
    // Detail Nilai Rata - Rata Pertemuan
    public function detailNilaiRPLA_Alpro()
    {
        $NILAIA = $this->siswaAModel->getSiswaWithNilai();
        $data = [
            'title' => 'Detail Nilai RPLA Algoritma Perograman || Guru Stemanikaku',
            'siswa_nilai' => $NILAIA
        ];
        return view('guru/rpla/detailNilaiRPLA_Alpro', $data);
    }

    // Done
    public function detailSiswaRPLA($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL A || Guru Stemanikaku',
            'siswaa' => $this->siswaAModel->getRPLA($slug)
        ];
        return view('guru/rpla/detailSiswaRPLA', $data);
    }

    // Done
    public function detailSiswaRPLB($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL B || Guru Stemanikaku',
            'siswab' => $this->siswaBModel->getRPLB($slug)
        ];
        return view('guru/rplb/detailSiswaRPLB', $data);
    }

    // Done
    public function detailSiswaRPLC($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL C || Guru Stemanikaku',
            'siswac' => $this->siswaCModel->getRPLC($slug)
        ];
        return view('guru/rplc/detailSiswaRPLC', $data);
    }

    // Done
    public function detailGuru($slug)
    {
        $data = [
            'title' => 'Detail Guru || Guru Stemanikaku',
            'guru' => $this->guruModel->getGuru($slug)
        ];
        return view('guru/detailGuru', $data);
    }

    // Done
    public function detailMatpel($slug)
    {
        $data = [
            'title' => 'Detail Mata Pelajaran || Guru Stemanikaku',
            'matapelajaran' => $this->matapelajaranModel->getMatpel($slug)
        ];
        return view('guru/matapelajaran/detailMatpel', $data);
    }

    // Done
    public function detailMateriAlpro($slug)
    {
        $data = [
            'title' => 'Detail Materi Algoritma Pemrograman || Guru Stemanikaku',
            'materi_alpro' => $this->materiAlproModel->getMatAlpro($slug)
        ];
        return view('guru/alpro/materi_alpro/detailMateriAlpro', $data);
    }

    // Done
    public function detailTugasAlpro($slug)
    {
        $data = [
            'title' => 'Detail Tugas Algoritma Perograman || Guru Stemanikaku',
            'tugas_alpro' => $this->tugasAlproModel->getTugasAlpro($slug)
        ];
        return view('guru/alpro/tugas_alpro/detailTugasAlpro', $data);
    }














    // Done
    public function editSiswaRPLA($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL A || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'siswaa' => $this->siswaAModel->getRPLA($slug)
        ];
        return view('guru/rpla/editSiswaRPLA', $data);
    }

    // Done
    public function updateSiswaRPLA($id)
    {
        if (!$this->validate([
            'nis_siswa' => [
                'rules' => 'required[siswaa.nis_siswa]',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!'
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
                    'required' => 'Jenis Kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[siswaa.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[siswaa.alamat_siswa]',
                'errors' => [
                    'required' => 'Alamat Siswa harus diisi !!'
                ],
            ],
            'foto_siswa' => [
                'rules' => 'max_size[foto_siswa,2048]|is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar terlalu besar !!',
                    'is_image' => 'Yang anda pilih bukan gambar !!',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFotoSiswaRPLA = $this->request->getFile('foto_siswa');

        if ($fileFotoSiswaRPLA->getError() == 4) {
            $namaFotoSiswaRPLA = $this->request->getVar('fotolama');
        } else {
            // Generate nama File Random
            $namaFotoSiswaRPLA = $fileFotoSiswaRPLA->getName();
            // Memindahkan File Random
            $fileFotoSiswaRPLA->move('img/rpla', $namaFotoSiswaRPLA);
            // Menghapus File lama
            unlink('img/rpla/' . $this->request->getVar('fotolama'));
        }

        $this->siswaAModel->save(
            [
                'id' => $id,
                'nis_siswa' => $this->request->getVar('nis_siswa'),
                'username_siswa' => $this->request->getVar('username_siswa'),
                'password_siswa' => $this->request->getVar('password_siswa'),
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'jk_siswa' => $this->request->getVar('jk_siswa'),
                'nohp_siswa' => $this->request->getVar('nohp_siswa'),
                'alamat_siswa' => $this->request->getVar('alamat_siswa'),
                'foto_siswa' => $namaFotoSiswaRPLA
            ]
        );
        session()->setFlashdata('pesan', 'Data Siswa RPLA berhasil diubah !!');
        return redirect()->to('/GuruController/dataSiswaRPLA');
    }

    // Done
    public function editSiswaRPLB($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL B || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'siswab' => $this->siswaBModel->getRPLB($slug)
        ];
        return view('guru/rplb/editSiswaRPLB', $data);
    }

    // Done
    public function updateSiswaRPLB($id)
    {
        if (!$this->validate([
            'nis_siswa' => [
                'rules' => 'required[siswab.nis_siswa]',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!'
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
                    'required' => 'Jenis Kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[siswab.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[siswab.alamat_siswa]',
                'errors' => [
                    'required' => 'Alamat Siswa harus diisi !!'
                ],
            ],
            'foto_siswa' => [
                'rules' => 'max_size[foto_siswa,2048]|is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar terlalu besar !!',
                    'is_image' => 'Yang anda pilih bukan gambar !!',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFotoSiswaRPLB = $this->request->getFile('foto_siswa');

        if ($fileFotoSiswaRPLB->getError() == 4) {
            $namaFotoSiswaRPLB = $this->request->getVar('fotolama');
        } else {
            // Generate nama File Random
            $namaFotoSiswaRPLB = $fileFotoSiswaRPLB->getName();
            // Memindahkan File Random
            $fileFotoSiswaRPLB->move('img/rplb', $namaFotoSiswaRPLB);
            // Menghapus File lama
            unlink('img/rplb/' . $this->request->getVar('fotolama'));
        }

        $this->siswaBModel->save(
            [
                'id' => $id,
                'nis_siswa' => $this->request->getVar('nis_siswa'),
                'username_siswa' => $this->request->getVar('username_siswa'),
                'password_siswa' => $this->request->getVar('password_siswa'),
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'jk_siswa' => $this->request->getVar('jk_siswa'),
                'nohp_siswa' => $this->request->getVar('nohp_siswa'),
                'alamat_siswa' => $this->request->getVar('alamat_siswa'),
                'foto_siswa' => $namaFotoSiswaRPLB
            ]
        );
        session()->setFlashdata('pesan', 'Data Siswa RPLB berhasil diubah !!');
        return redirect()->to('/GuruController/dataSiswaRPLB');
    }

    // Done
    public function editSiswaRPLC($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL C || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'siswac' => $this->siswaCModel->getRPLC($slug)
        ];
        return view('guru/rplc/editSiswaRPLC', $data);
    }

    // Done
    public function updateSiswaRPLC($id)
    {
        if (!$this->validate([
            'nis_siswa' => [
                'rules' => 'required[siswac.nis_siswa]',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!'
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
                    'required' => 'Jenis Kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[siswac.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[siswac.alamat_siswa]',
                'errors' => [
                    'required' => 'Alamat Siswa harus diisi !!'
                ],
            ],
            'foto_siswa' => [
                'rules' => 'max_size[foto_siswa,2048]|is_image[foto_siswa]|mime_in[foto_siswa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran Gambar terlalu besar !!',
                    'is_image' => 'Yang anda pilih bukan gambar !!',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFotoSiswaRPLC = $this->request->getFile('foto_siswa');

        if ($fileFotoSiswaRPLC->getError() == 4) {
            $namaFotoSiswaRPLC = $this->request->getVar('fotolama');
        } else {
            // Generate nama File Random
            $namaFotoSiswaRPLC = $fileFotoSiswaRPLC->getName();
            // Memindahkan File Random
            $fileFotoSiswaRPLC->move('img/rplc', $namaFotoSiswaRPLC);
            // Menghapus File lama
            unlink('img/rplc/' . $this->request->getVar('fotolama'));
        }

        $this->siswaCModel->save(
            [
                'id' => $id,
                'nis_siswa' => $this->request->getVar('nis_siswa'),
                'username_siswa' => $this->request->getVar('username_siswa'),
                'password_siswa' => $this->request->getVar('password_siswa'),
                'nama_siswa' => $this->request->getVar('nama_siswa'),
                'jk_siswa' => $this->request->getVar('jk_siswa'),
                'nohp_siswa' => $this->request->getVar('nohp_siswa'),
                'alamat_siswa' => $this->request->getVar('alamat_siswa'),
                'foto_siswa' => $namaFotoSiswaRPLC
            ]
        );
        session()->setFlashdata('pesan', 'Data Siswa RPLC berhasil diubah !!');
        return redirect()->to('/GuruController/dataSiswaRPLC');
    }
















    public function editMateriAlpro($slug)
    {
        $data = [
            'title' => 'Form Edit Materi Algoritma Pemrograman || Guru Stemanikaku',
            'validation' => \Config\Services::validation(),
            'materi_alpro' => $this->materiAlproModel->getMatAlpro($slug)
        ];
        return view('guru/alpro/materi_alpro/editMateriAlpro', $data);
    }

    public function updateMateriAlpro($id)
    {
        if (!$this->validate([
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
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $berkasDokumenMateriAlpro = $this->request->getFile('dokumen_materi');
        $namaDokumenMateriAlpro = $berkasDokumenMateriAlpro->getName();
        $berkasDokumenMateriAlpro->move('dokumen/alpro', $namaDokumenMateriAlpro);

        $slug = url_title($this->request->getVar('nama_materi'), '-', true);
        $this->materiAlproModel->save([
            'id' => $id,
            'nama_materi' => $this->request->getVar('nama_materi'),
            'deskripsi_materi' => $this->request->getVar('deskripsi_materi'),
            'dokumen_materi' => $namaDokumenMateriAlpro,
            'slug' => $slug,
        ]);
        session()->setFlashdata('pesan', 'Materi Algoritma Pemrograman berhasil diubah !!');
        return redirect()->to('/GuruController/dataMateriAlpro');
    }

    // Done
    public function editTugasAlpro($slug)
    {
        $data = [
            'title' => 'Form Edit Tugas Algoritma Pemrograman || Guru Stemanikaku',
            'validation' => \Config\Services::validation(),
            'tugas_alpro' => $this->tugasAlproModel->getTugasAlpro($slug)
        ];
        return view('guru/alpro/tugas_alpro/editTugasAlpro', $data);
    }

    // Done
    public function updateTugasAlpro($id)
    {
        if (!$this->validate([
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
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $berkasTugasAlpro = $this->request->getFile('filetugas_alpro');
        $namaBerkasTugasAlpro = $berkasTugasAlpro->getName();
        $berkasTugasAlpro->move('dokumen/tugasAlpro', $namaBerkasTugasAlpro);

        $slug = url_title($this->request->getVar('judultugas_alpro'), '-', true);
        $this->tugasAlproModel->save([
            'id' => $id,
            'judultugas_alpro' => $this->request->getVar('judultugas_alpro'),
            'deskripsitugas_alpro' => $this->request->getVar('deskripsitugas_alpro'),
            'bataswaktu_alpro' => $this->request->getVar('bataswaktu_alpro'),
            'filetugas_alpro' => $namaBerkasTugasAlpro,
            'slug' => $slug,
        ]);
        session()->setFlashdata('pesan', 'Tugas Algoritma Pemrograman berhasil diubah !!');
        return redirect()->to('/guru/alpro/tugas_alpro/dataTugasAlpro');
    }













    public function createPilgan()
    {
        if ($this->request->getMethod() === 'post') {
            $pertanyaans = $this->request->getPost('pertanyaan');

            foreach ($pertanyaans as $pertanyaan) {
                $this->soalModel->save($pertanyaan);
            }

            return redirect()->to('GuruController/createPilgan');
        }

        // // Pastikan metode HTTP adalah POST
        // if ($this->request->getMethod() === 'post') {
        //     // Ambil semua pertanyaan dari input form
        //     $pertanyaans = $this->request->getPost('pertanyaans');

        //     // Periksa apakah input 'questions' tidak kosong
        //     if (!empty($pertanyaans)) {
        //         foreach ($pertanyaans as $pertanyaan) {
        //             // Validasi data sebelum menyimpan, misalnya pastikan data tidak kosong
        //             if (!empty($pertanyaan['pertanyaan']) && !empty($pertanyaan['pilihan_benar'])) {
        //                 // Simpan pertanyaan ke database menggunakan model
        //                 $this->soalModel->save([
        //                     'pertanyaan' => $pertanyaan['pertanyaan'],
        //                     'pilihan_a' => $pertanyaan['pilihan_a'],
        //                     'pilihan_b' => $pertanyaan['pilihan_b'],
        //                     'pilihan_c' => $pertanyaan['pilihan_c'],
        //                     'pilihan_d' => $pertanyaan['pilihan_d'],
        //                     'pilihan_benar' => $pertanyaan['pilihan_benar']
        //                 ]);
        //             }
        //         }
        //         // Redirect ke halaman lain setelah berhasil menyimpan
        //         return redirect()->to('GuruController/createPilgan')->with('message', 'Quiz berhasil disimpan.');
        //     } else {
        //         // Jika tidak ada pertanyaan yang diterima, kirim pesan error
        //         return redirect()->back()->with('error', 'Tidak ada pertanyaan yang disimpan.');
        //     }
        // }

        $data = [
            'title' => 'Buat Soal Pilihan Ganda || Guru Stemanikaku'
        ];
        return view('guru/soal/createPilgan', $data);
    }

    public function savePilgan()
    {

        // $questionModel = new SoalModel();
        // $answerModel = new JawabanModel();

        // $SOAL = $this->soalModel->findAll();
        // $data = [
        //     'guru_id' => session()->get('guru_id'),
        //     'pertanyaan' => $this->request->getVar('pertanyaan')
        // ];

        // $questionModel->save($data);
        // $questionId = $questionModel->insertID();

        // $jawabans = $this->request->getPost('jawaban');
        // $jawabanBenar = $this->request->getPost('jawaban_benar');

        // foreach ($jawabans as $key => $jawaban) {
        //     $dataJawaban = [
        //         'pertanyaan_id' => $questionId,
        //         'jawaban' => $jawaban,
        //         'jawaban_benar' => isset($jawabanBenar[$key]) ? 1 : 0,
        //     ];

        //     $answerModel->save($dataJawaban);
        // }

        // return redirect()->to('/guru/createQuestion')->with('success', 'Question created successfully.');

        // Pastikan metode HTTP adalah POST
        if ($this->request->getMethod() === 'post') {
            // Ambil semua pertanyaan dari input form
            $pertanyaans = $this->request->getPost('pertanyaans');

            // Periksa apakah input 'questions' tidak kosong
            if (!empty($pertanyaans)) {
                foreach ($pertanyaans as $question) {
                    // Validasi data sebelum menyimpan, misalnya pastikan data tidak kosong
                    if (!empty($question['pertanyaan']) && !empty($question['pilihan_benar'])) {
                        // Simpan pertanyaan ke database menggunakan model
                        $this->soalModel->save([
                            'pertanyaan' => $question['pertanyaan'],
                            'pilihan_a' => $question['pilihan_a'],
                            'pilihan_b' => $question['pilihan_b'],
                            'pilihan_c' => $question['pilihan_c'],
                            'pilihan_d' => $question['pilihan_d'],
                            'pilihan_benar' => $question['pilihan_benar']
                        ]);
                    }
                }
                // Redirect ke halaman lain setelah berhasil menyimpan
                return redirect()->to('GuruController/createPilgan')->with('message', 'Quiz berhasil disimpan.');
            } else {
                // Jika tidak ada pertanyaan yang diterima, kirim pesan error
                return redirect()->back()->with('error', 'Tidak ada pertanyaan yang disimpan.');
            }
        }

        // Tampilkan view untuk membuat quiz jika metode bukan POST
        return redirect()->to('GuruController/createPilgan');
    }

    // Controller method untuk menyimpan soal pilihan ganda
    public function savePilgann()
    {
        // Cek apakah request adalah POST
        if ($this->request->getMethod() === 'post') {
            $pertanyaans = $this->request->getPost('pertanyaan');

            if (!empty($pertanyaans)) {
                foreach ($pertanyaans as $pertanyaan) {
                    // Simpan data soal ke database (pastikan struktur tabel sesuai)
                    $this->soalModel->save([
                        'pertanyaan' => $pertanyaan['pertanyaan'],
                        'pilihan_a' => $pertanyaan['pilihan_a'],
                        'pilihan_b' => $pertanyaan['pilihan_b'],
                        'pilihan_c' => $pertanyaan['pilihan_c'],
                        'pilihan_d' => $pertanyaan['pilihan_d'],
                        'jawaban_benar' => $pertanyaan['jawaban_benar']
                    ]);
                }
                // Redirect ke halaman setelah berhasil simpan
                return redirect()->to('GuruController/createPilgan')->with('message', 'Soal berhasil disimpan.');
            } else {
                // Jika tidak ada data yang diterima
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }
        }
    }

    public function takeSoal()
    {
        // $pertanyaans = $this->soalModel->findAll();

        // if ($this->request->getMethod() === 'post') {
        //     $jawabans = $this->request->getPost('jawabans');
        //     $idSiswa = 1;

        //     foreach ($jawabans as $pertanyaan_id => $jawaban) {
        //         $this->jawabanModel->save([
        //             'pertanyaan_id' => $pertanyaan_id,
        //             'siswaa_id' => $idSiswa,
        //             'jawaban' => $jawaban
        //         ]);
        //     }
        //     return redirect()->to('SiswaController/resultPilgan');
        // }

        $SOAL = $this->soalModel->findAll();
        $data = [
            'title' => 'Buat Soal Pilihan Ganda || Guru Stemanikaku',
            'soal' => $SOAL
        ];

        return view('guru/alpro/pengetahuan_alpro/takeSoal', $data);
    }

    // Done
    public function daftarSoal()
    {
        $SOAL = $this->soalModel->findAll();
        $data = [
            'title' => 'Daftar Soal Pilihan Ganda || Guru Stemanikaku',
            'soal' => $SOAL
        ];
        return view('guru/alpro/pengetahuan_alpro/daftarSoal', $data);
    }

    public function tambahSoal()
    {
        // $SOAL = $this->soalModel->findAll();
        // if ($this->request->getMethod() == 'post') {
        //     $data = [
        //         'pertanyaan' => $this->request->getPost('pertanyaan'),
        //         'pilihan_a' => $this->request->getPost('pilihan_a'),
        //         'pilihan_b' => $this->request->getPost('pilihan_b'),
        //         'pilihan_c' => $this->request->getPost('pilihan_c'),
        //         'pilihan_d' => $this->request->getPost('pilihan_d'),
        //         'pilihan_benar' => $this->request->getPost('pilihan_benar'),
        //     ];

        //     $SOAL->save($data);
        //     return redirect()->to('GuruController/daftarSoal');
        // }
        // return view('guru/alpro/pengetahuan_alpro/daftarSoal');

        $data['soal'] = $this->soalModel->findAll();

        if ($this->request->getMethod() == 'post') {
            $data = [
                'pertanyaan' => $this->request->getVar('pertanyaan'),
                'pilihan_a' => $this->request->getVar('pilihan_a'),
                'pilihan_b' => $this->request->getVar('pilihan_b'),
                'pilihan_c' => $this->request->getVar('pilihan_c'),
                'pilihan_d' => $this->request->getVar('pilihan_d'),
                'pilihan_benar' => $this->request->getVar('pilihan_benar'),
            ];

            $this->soalModel->save($data);
            return view('guru/alpro/pengetahuan_alpro/daftarSoal');
        }

        return view('guru/alpro/pengetahuan_alpro/daftarSoal');
    }

    public function editSoal($id)
    {
        $data['soal'] = $this->soalModel->find($id);

        if ($this->request->getMethod() == 'post') {
            $data = [
                'pertanyaan' => $this->request->getPost('pertanyaan'),
                'pilihan_a' => $this->request->getPost('pilihan_a'),
                'pilihan_b' => $this->request->getPost('pilihan_b'),
                'pilihan_c' => $this->request->getPost('pilihan_c'),
                'pilihan_d' => $this->request->getPost('pilihan_d'),
                'pilihan_benar' => $this->request->getPost('pilihan_benar'),
            ];

            $this->soalModel->update($id, $data);
            return redirect()->to('GuruController/daftarSoal');
        }
        return view('guru/edit_soal', $data);
    }

    public function hapusSoal($id)
    {
        $this->jawabanModel->where('soal_id', $id)->delete();
        $this->soalModel->delete($id);
        return redirect()->to('/guru/daftar-soal');
    }

















    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteSiswaRPLA($id = null)
    {
        $this->siswaAModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa RPL A berhasil dihapus !!');
        return redirect()->to('/GuruController/dataSiswaRPLA');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteSiswaRPLB($id = null)
    {
        $this->siswaBModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa RPL B berhasil dihapus !!');
        return redirect()->to('/GuruController/dataSiswaRPLB');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteSiswaRPLC($id = null)
    {
        $this->siswaCModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa berhasil dihapus !!');
        return redirect()->to('/GuruController/dataSiswaRPLC');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteMatpel($id = null)
    {
        $this->matapelajaranModel->delete($id);
        session()->setFlashdata('pesan', 'Data Mata Pelajaran berhasil dihapus !!');
        return redirect()->to('/GuruController/dataMataPelajaran');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteGuru($id = null)
    {
        $this->guruModel->delete($id);
        session()->setFlashdata('pesan', 'Data Guru berhasil dihapus !!');
        return redirect()->to('/GuruController/dataGuru');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteMateriAlpro($id = null)
    {
        $this->materiAlproModel->delete($id);
        session()->setFlashdata('pesan', 'Materi Alpro berhasil dihapus !!');
        return redirect()->to('/GuruController/dataMateriAlpro');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteTugasAlpro($id = null)
    {
        $this->tugasAlproModel->delete($id);
        session()->setFlashdata('pesan', 'Tugas Alpro berhasil dihapus !!');
        return redirect()->to('/GuruController/tugas_alpro/dataTugasAlpro');
    }

    // Done
    // Hapus Pertanyaan
    public function deletePertanyaan($id)
    {
        $pertanyaan = $this->soalModel->find($id);

        if ($pertanyaan) {
            $this->soalModel->delete($id);
            return redirect()->to('/GuruController/createPilgan')->with('message', 'Pertanyaan berhasil dihapus !!');
        } else {
            return redirect()->back()->with('error', 'Pertanyaan Tidak Ditemukan !!');
        }
    }
}
