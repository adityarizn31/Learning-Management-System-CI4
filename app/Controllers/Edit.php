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

class Edit extends BaseController
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
    public function editGuru($slug)
    {
        $data = [
            'title' => 'Form Edit Guru || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'guru' => $this->guruModel->getGuru($slug)
        ];
        return view('admin/guru/editGuru', $data);
    }

    // Done
    public function updateGuru($id)
    {
        if (!$this->validate([
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
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $fileFotoGuru = $this->request->getFile('foto_guru');

        if ($fileFotoGuru->getError() == 4) {
            $namaFotoGuru = $this->request->getVar('fotolama');
        } else {
            // Generate nama File Random
            $namaFotoGuru = $fileFotoGuru->getName();
            // Memindahkan File Random
            $fileFotoGuru->move('img/guru', $namaFotoGuru);
            // Menghapus File lama
            unlink('img/guru/' . $this->request->getVar('fotolama'));
        }

        $this->guruModel->save(
            [
                'id' => $id,
                'username_guru' => $this->request->getVar('username_guru'),
                'password_guru' => $this->request->getVar('password_guru'),
                'nip_guru' => $this->request->getVar('nip_guru'),
                'nama_guru' => $this->request->getVar('nama_guru'),
                'jk_guru' => $this->request->getVar('jk_guru'),
                'alamat_guru' => $this->request->getVar('alamat_guru'),
                'nohp_guru' => $this->request->getVar('nohp_guru'),
                'pendidikanterakhir_guru' => $this->request->getVar('pendidikanterakhir_guru'),
                'foto_guru' => $namaFotoGuru
            ]
        );
        session()->setFlashdata('pesan', 'Data Guru berhasil diubah !!');
        return redirect()->to('/AdminController/dataGuru');
    }

     // Done
     public function editMataPelajaran($slug)
     {
         $data = [
             'title' => 'Form Edit Mata Pelajaran || Admin Stemanikaku',
             'validation' => \Config\Services::validation(),
             'matapelajaran' => $this->rplAModel->getRPLA($slug)
         ];
         return view('admin/matapelajaran/editMataPelajaran', $data);
     }
 
     // Done
     public function updateMatpel($id)
     {
         if (!$this->validate([
             'nama_matapelajaran' => [
                 'rules' => 'required[matapelajaran.nama_matapelajaran]',
                 'errors' => [
                     'required' => 'Nama Mata Pelajaran harus diisi !!'
                 ],
             ],
             'guru_matapelajaran' => [
                 'rules' => 'required[matapelajaran.guru_matapelajaran]',
                 'errors' => [
                     'required' => 'Guru Mata Pelajaran harus diisi !!'
                 ],
             ],
             'jam_matapelajaran' => [
                 'rules' => 'required[matapelajaran.jam_matapelajaran]',
                 'errors' => [
                     'required' => 'Jam Mata Pelajaran harus diisi !!'
                 ],
             ],
         ])) {
             return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
         }
 
         $this->matapelajaranModel->save(
             [
                 'id' => $id,
                 'nama_matapelajaran' => $this->request->getVar('nama_matapelajaran'),
                 'guru_matapelajaran' => $this->request->getVar('guru_matapelajaran'),
                 'jam_matapelajaran' => $this->request->getVar('jam_matapelajaran'),
             ]
         );
         session()->setFlashdata('pesan', 'Data Mata Pelajaran berhasil diubah !!');
         return redirect()->to('/AdminController/dataMataPelajaran');
     }












    // Bagian Guru
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
}
