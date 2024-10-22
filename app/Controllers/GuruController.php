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
    }
    











    // Done
    public function createSiswaRPLA()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Data Siswa RPL A || Guru Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('guru/createSiswaRPLA', $data);
    }

    // Done
    public function saveRPLA()
    {
        $validate = $this->validate([
            'nis_siswa' => [
                'rules' => 'required[rpla.nis_siswa]|is_natural',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!',
                    'is_natural' => 'Hanya boleh diisi angka !!'
                ],
            ],
            'username_siswa' => [
                'rules' => 'required[rpla.username_siswa]',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!'
                ],
            ],
            'password_siswa' => [
                'rules' => 'required[rpla.password_siswa]',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!'
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required[rpla.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa harus diisi !!'
                ],
            ],
            'jk_siswa' => [
                'rules' => 'required[rpla.jk_siswa]',
                'errors' => [
                    'required' => 'Jenis kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[rpla.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP/Whatsapp Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[rpla.alamat_siswa]',
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
        $this->rplAModel->save([
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
        return redirect()->to('/guru/dataSiswaRPLA');
    }

    // Done
    public function createSiswaRPLB()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Data Siswa RPL B || Guru Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('guru/createSiswaRPLB', $data);
    }

    // Done
    public function saveRPLB()
    {
        $validate = $this->validate([
            'nis_siswa' => [
                'rules' => 'required[rplb.nis_siswa]|is_natural',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!',
                    'is_natural' => 'Hanya boleh diisi angka !!'
                ],
            ],
            'username_siswa' => [
                'rules' => 'required[rplb.username_siswa]',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!'
                ],
            ],
            'password_siswa' => [
                'rules' => 'required[rplb.password_siswa]',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!'
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required[rplb.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa harus diisi !!'
                ],
            ],
            'jk_siswa' => [
                'rules' => 'required[rplb.jk_siswa]',
                'errors' => [
                    'required' => 'Jenis kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[rplb.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP/Whatsapp Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[rplb.alamat_siswa]',
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
        $this->rplBModel->save([
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
        return redirect()->to('/guru/dataSiswaRPLB');
    }

    // Done
    public function createSiswaRPLC()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Data Siswa RPL C || Guru Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('guru/createSiswaRPLC', $data);
    }

    // Done
    public function saveRPLC()
    {
        $validate = $this->validate([
            'nis_siswa' => [
                'rules' => 'required[rplc.nis_siswa]|is_natural',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!',
                    'is_natural' => 'Hanya boleh diisi angka !!'
                ],
            ],
            'username_siswa' => [
                'rules' => 'required[rplc.username_siswa]',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!'
                ],
            ],
            'password_siswa' => [
                'rules' => 'required[rplc.password_siswa]',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!'
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required[rplc.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa harus diisi !!'
                ],
            ],
            'jk_siswa' => [
                'rules' => 'required[rplc.jk_siswa]',
                'errors' => [
                    'required' => 'Jenis kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[rplc.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP/Whatsapp Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[rplc.alamat_siswa]',
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
        $this->rplCModel->save([
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
        return redirect()->to('/guru/dataSiswaRPLC');
    }

    // Done
    public function createMateriAlpro()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Materi Algoritma Pemrograman || Guru Stemanikaku',
            'validation' => \Config\Services::validation()
        ];
        return view('guru/alpro/createMateriAlpro', $data);
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
        return redirect()->to('/guru/alpro/dataMateriAlpro');
    }

    public function createTugasAlpro()
    {
        helper(['form']);
        $data = [
            'title' => 'Buat Tugas Alpro || Guru Stemanika',
            'validation' => \Config\Services::validation()
        ];
        return view('guru/alpro/createTugasAlpro', $data);
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
        return redirect()->to('/guru/alpro/dataTugasAlpro');
    }











    public function index()
    {
        $guru = $this->guruModel->findAll();
        $data = [
            'title' => 'Dashboard || Guru Stemanikaku',
            'guru' => $guru
        ];
        return view('guru/index', $data);
    }












    // Done
    public function dataSiswaRPLA()
    {
        $RPLA = $this->rplAModel->findAll();
        $data = [
            'title' => 'Siswa RPLA || Guru Stemanikaku',
            'rpla' => $RPLA
        ];
        return view('guru/dataSiswaRPLA', $data);
    }

    // Done
    public function dataSiswaRPLB()
    {
        $RPLB = $this->rplBModel->findAll();
        $data = [
            'title' => 'Siswa RPLB || Guru Stemanikaku',
            'rplb' => $RPLB
        ];
        return view('guru/dataSiswaRPLB', $data);
    }

    // Done
    public function dataSiswaRPLC()
    {
        $RPLC = $this->rplCModel->findAll();
        $data = [
            'title' => 'Siswa RPLC || Guru Stemanikaku',
            'rplc' => $RPLC
        ];
        return view('guru/dataSiswaRPLC', $data);
    }

    // Done
    public function dataMataPelajaran()
    {
        $MATPEL = $this->matapelajaranModel->findAll();
        $data = [
            'title' => 'Data Mata Pelajaran || Guru Stemanikaku',
            'matapelajaran' => $MATPEL
        ];
        return view('guru/dataMataPelajaran', $data);
    }

    // Done
    public function dataGuru()
    {
        $GURU = $this->guruModel->findAll();
        $data = [
            'title' => 'Data Guru || Guru Stemanikaku',
            'guru' => $GURU
        ];
        return view('guru/dataGuru', $data);
    }











    // Done
    public function dataMateriAlpro()
    {
        $ALPRO = $this->materiAlproModel->findAll();
        $data = [
            'title' => 'Materi Algoritma Pemrograman || Guru Stemanikaku',
            'materi_alpro' => $ALPRO
        ];
        return view('guru/alpro/dataMateriAlpro', $data);
    }

    // Done
    public function dataTugasAlpro()
    {
        $TUGASALPRO = $this->tugasAlproModel->findAll();
        $data = [
            'title' => 'Daftar Tugas Algoritma Pemrograman || Guru Stemanikaku',
            'tugas_alpro' => $TUGASALPRO
        ];
        return view('guru/alpro/dataTugasAlpro', $data);
    }

    // Done 
    public function dataPengetahuanAlpro()
    {
        $RPLA = $this->rplAModel->findAll();
        $data = [
            'title' => 'Daftar Pengetahuan Algoritma Pemrograman || Guru Stemanikaku',
            'rpla' => $RPLA
        ];
        return view('guru/alpro/dataPengetahuanAlpro', $data);
    }

    











    // Done
    public function detailSiswaRPLA($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL A || Guru Stemanikaku',
            'rpla' => $this->rplAModel->getRPLA($slug)
        ];
        return view('/guru/detailSiswaRPLA', $data);
    }

    // Done
    public function detailSiswaRPLB($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL B || Guru Stemanikaku',
            'rplb' => $this->rplBModel->getRPLB($slug)
        ];
        return view('/guru/detailSiswaRPLB', $data);
    }

    // Done
    public function detailSiswaRPLC($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL C || Guru Stemanikaku',
            'rplc' => $this->rplCModel->getRPLC($slug)
        ];
        return view('/guru/detailSiswaRPLC', $data);
    }

    // Done
    public function detailGuru($slug)
    {
        $data = [
            'title' => 'Detail Guru || Guru Stemanikaku',
            'guru' => $this->guruModel->getGuru($slug)
        ];
        return view('/guru/detailGuru', $data);
    }

    // Done
    public function detailMatpel($slug)
    {
        $data = [
            'title' => 'Detail Mata Pelajaran || Guru Stemanikaku',
            'matapelajaran' => $this->matapelajaranModel->getMatpel($slug)
        ];
        return view('/admin/detailMatpel', $data);
    }

    // Done
    public function detailMateriAlpro($slug)
    {
        $data = [
            'title' => 'Detail Materi Algoritma Pemrograman || Guru Stemanikaku',
            'materi_alpro' => $this->materiAlproModel->getMatAlpro($slug)
        ];
        return view('/guru/alpro/detailMateriAlpro', $data);
    }

    // Done
    public function detailTugasAlpro($slug)
    {
        $data = [
            'title' => 'Detail Tugas Algoritma Perograman || Guru Stemanikaku',
            'tugas_alpro' => $this->tugasAlproModel->getTugasAlpro($slug)
        ];
        return view('/guru/alpro/detailTugasAlpro', $data);
    }














    // Done
    public function editSiswaRPLA($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL A || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'rpla' => $this->rplAModel->getRPLA($slug)
        ];
        return view('guru/editSiswaRPLA', $data);
    }

    // Done
    public function updateSiswaRPLA($id)
    {
        if (!$this->validate([
            'nis_siswa' => [
                'rules' => 'required[rpla.nis_siswa]',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!'
                ],
            ],
            'username_siswa' => [
                'rules' => 'required[rpla.username_siswa]',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!'
                ],
            ],
            'password_siswa' => [
                'rules' => 'required[rpla.password_siswa]',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!'
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required[rpla.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa harus diisi !!'
                ],
            ],
            'jk_siswa' => [
                'rules' => 'required[rpla.jk_siswa]',
                'errors' => [
                    'required' => 'Jenis Kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[rpla.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[rpla.alamat_siswa]',
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

        $this->rplAModel->save(
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
        return redirect()->to('guru/dataSiswaRPLA');
    }

    // Done
    public function editSiswaRPLB($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL B || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'rplb' => $this->rplBModel->getRPLB($slug)
        ];
        return view('guru/editSiswaRPLB', $data);
    }

    // Done
    public function updateSiswaRPLB($id)
    {
        if (!$this->validate([
            'nis_siswa' => [
                'rules' => 'required[rplb.nis_siswa]',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!'
                ],
            ],
            'username_siswa' => [
                'rules' => 'required[rplb.username_siswa]',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!'
                ],
            ],
            'password_siswa' => [
                'rules' => 'required[rplb.password_siswa]',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!'
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required[rplb.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa harus diisi !!'
                ],
            ],
            'jk_siswa' => [
                'rules' => 'required[rplb.jk_siswa]',
                'errors' => [
                    'required' => 'Jenis Kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[rplb.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[rplb.alamat_siswa]',
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

        $this->rplBModel->save(
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
        return redirect()->to('guru/dataSiswaRPLB');
    }

    // Done
    public function editSiswaRPLC($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL C || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'rplc' => $this->rplCModel->getRPLC($slug)
        ];
        return view('guru/editSiswaRPLC', $data);
    }

    // Done
    public function updateSiswaRPLC($id)
    {
        if (!$this->validate([
            'nis_siswa' => [
                'rules' => 'required[rplc.nis_siswa]',
                'errors' => [
                    'required' => 'NIS Siswa harus diisi !!'
                ],
            ],
            'username_siswa' => [
                'rules' => 'required[rplc.username_siswa]',
                'errors' => [
                    'required' => 'Username Siswa harus diisi !!'
                ],
            ],
            'password_siswa' => [
                'rules' => 'required[rplc.password_siswa]',
                'errors' => [
                    'required' => 'Password Siswa harus diisi !!'
                ],
            ],
            'nama_siswa' => [
                'rules' => 'required[rplc.nama_siswa]',
                'errors' => [
                    'required' => 'Nama Siswa harus diisi !!'
                ],
            ],
            'jk_siswa' => [
                'rules' => 'required[rplc.jk_siswa]',
                'errors' => [
                    'required' => 'Jenis Kelamin Siswa harus diisi !!'
                ],
            ],
            'nohp_siswa' => [
                'rules' => 'required[rplc.nohp_siswa]',
                'errors' => [
                    'required' => 'No HP Siswa harus diisi !!'
                ],
            ],
            'alamat_siswa' => [
                'rules' => 'required[rplc.alamat_siswa]',
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

        $this->rplCModel->save(
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
        return redirect()->to('guru/dataSiswaRPLC');
    }    

    public function editMateriAlpro($slug)
    {
        $data = [
            'title' => 'Form Edit Materi Algoritma Pemrograman || Guru Stemanikaku',
            'validation' => \Config\Services::validation(),
            'materi_alpro' => $this->materiAlproModel->getMatAlpro($slug)
        ];
        return view('guru/alpro/editMateriAlpro', $data);
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
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $berkasDokumenMateriAlpro = $this->request->getFile('dokumen_materi');
        $namaDokumenMateriAlpro = $berkasDokumenMateriAlpro->getName();
        $berkasDokumenMateriAlpro->move('dokumen/alpro', $namaDokumenMateriAlpro);

        $slug = url_title($this->request->getVar('nama_materi'), '-', true);
        $this->tugasAlproModel->save([
            'id' => $id,
            'nama_materi' => $this->request->getVar('nama_materi'),
            'deskripsi_materi' => $this->request->getVar('deskripsi_materi'),
            'dokumen_materi' => $namaDokumenMateriAlpro,
            'slug' => $slug,
        ]);
        session()->setFlashdata('pesan', 'Materi Algoritma Pemrograman berhasil diubah !!');
        return redirect()->to('/guru/alpro/dataMateriAlpro');
    }

    // Done
    public function editTugasAlpro($slug)
    {
        $data = [
            'title' => 'Form Edit Tugas Algoritma Pemrograman || Guru Stemanikaku',
            'validation' => \Config\Services::validation(),
            'tugas_alpro' => $this->tugasAlproModel->getTugasAlpro($slug)
        ];
        return view('guru/alpro/editTugasAlpro', $data);
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
        return redirect()->to('/guru/alpro/dataTugasAlpro');
    }














    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteSiswaRPLA($id = null)
    {
        $this->rplAModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa RPL A berhasil dihapus !!');
        return redirect()->to('/GuruController/dataSiswaRPLA');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteSiswaRPLB($id = null)
    {
        $this->rplBModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa RPL B berhasil dihapus !!');
        return redirect()->to('/GuruController/dataSiswaRPLB');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteSiswaRPLC($id = null)
    {
        $this->rplCModel->delete($id);
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
        return redirect()->to('/GuruController/dataTugasAlpro');
    }
}
