<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\RPLAModel;
use App\Models\RPLBModel;
use App\Models\RPLCModel;
use App\Models\MataPelajaranModel;
use App\Models\GuruModel;

use CodeIgniter\Config\Services;

class AdminController extends BaseController
{
    protected $adminModel;
    protected $rplAModel;
    protected $rplBModel;
    protected $rplCModel;
    protected $matapelajaranModel;
    protected $guruModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->rplAModel = new RPLAModel();
        $this->rplBModel = new RPLBModel();
        $this->rplCModel = new RPLCModel();
        $this->matapelajaranModel = new MataPelajaranModel();
        $this->guruModel = new GuruModel();
    }
    
    










    // Done
    public function createGuru()
    {
        helper(['form']);
        $data = [
            'title' => 'Form Tambah Akun Guru || Admin Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/createGuru', $data);
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
        ]);
        session()->setFlashdata('pesan', 'Guru berhasil ditambahkan !!');
        return redirect()->to('/admin/dataGuru');
    }

    // Done
    public function createSiswaRPLA()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Data Siswa RPL A || Admin Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/createSiswaRPLA', $data);
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
        return redirect()->to('/admin/dataSiswaRPLA');
    }

    // Done
    public function createSiswaRPLB()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Data Siswa RPL B || Admin Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/createSiswaRPLB', $data);
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
        return redirect()->to('/admin/dataSiswaRPLB');
    }

    // Done
    public function createSiswaRPLC()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Data Siswa RPL C || Admin Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/createSiswaRPLC', $data);
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
        return redirect()->to('/admin/dataSiswaRPLC');
    }

    // Done
    public function createMataPelajaran()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Mata Pelajaran || Admin Stemanikaku',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/createMataPelajaran', $data);
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
        return redirect()->to('/admin/dataMataPelajaran');
    }










    

    public function index()
    {
        $admin = $this->adminModel->findAll();
        $data = [
            'title' => 'Dashboard || Admin Stemanikaku',
            'admin' => $admin
        ];

        return view('admin/index', $data);
    }

    










    // Done
    public function dataSiswaRPLA()
    {
        $RPLA = $this->rplAModel->findAll();
        $data = [
            'title' => 'Siswa RPLA || Admin Stemanikaku',
            'rpla' => $RPLA
        ];
        return view('admin/dataSiswaRPLA', $data);
    }

    // Done
    public function dataSiswaRPLB()
    {
        $RPLB = $this->rplBModel->findAll();
        $data = [
            'title' => 'Siswa RPLB || Admin Stemanikaku',
            'rplb' => $RPLB
        ];
        return view('admin/dataSiswaRPLB', $data);
    }

    // Done
    public function dataSiswaRPLC()
    {
        $RPLC = $this->rplCModel->findAll();
        $data = [
            'title' => 'Siswa RPLC || Admin Stemanikaku',
            'rplc' => $RPLC
        ];
        return view('admin/dataSiswaRPLC', $data);
    }

    // Done
    public function dataMataPelajaran()
    {
        $MATPEL = $this->matapelajaranModel->findAll();
        $data = [
            'title' => 'Data Mata Pelajaran || Admin Stemanikaku',
            'matapelajaran' => $MATPEL
        ];
        return view('admin/dataMataPelajaran', $data);
    }

    // Done
    public function dataGuru()
    {
        $GURU = $this->guruModel->findAll();
        $data = [
            'title' => 'Data Guru || Admin Stemanikaku',
            'guru' => $GURU
        ];
        return view('admin/dataGuru', $data);
    }

    










    // Done
    public function detailSiswaRPLA($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL A || Stemanikaku',
            'rpla' => $this->rplAModel->getRPLA($slug)
        ];
        return view('/admin/detailSiswaRPLA', $data);
    }

    // Done
    public function detailSiswaRPLB($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL B || Stemanikaku',
            'rplb' => $this->rplBModel->getRPLB($slug)
        ];
        return view('/admin/detailSiswaRPLB', $data);
    }

    // Done
    public function detailSiswaRPLC($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL C || Stemanikaku',
            'rplc' => $this->rplCModel->getRPLC($slug)
        ];
        return view('/admin/detailSiswaRPLC', $data);
    }

    // Done
    public function detailGuru($slug)
    {
        $data = [
            'title' => 'Detail Guru || Stemanikaku',
            'guru' => $this->guruModel->getGuru($slug)
        ];
        return view('/admin/detailGuru', $data);
    }

    // Done
    public function detailMataPelajaran($slug)
    {
        $data = [
            'title' => 'Detail Mata Pelajaran || Stemanikaku',
            'matapelajaran' => $this->matapelajaranModel->getMatpel($slug)
        ];
        return view('/admin/detailMataPelajaran', $data);
    }

    










    // Done
    public function editGuru($slug)
    {
        $data = [
            'title' => 'Form Edit Guru || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'guru' => $this->guruModel->getGuru($slug)
        ];
        return view('admin/editGuru', $data);
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
        return redirect()->to('admin/dataGuru');
    }

    // Done
    public function editSiswaRPLA($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL A || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'rpla' => $this->rplAModel->getRPLA($slug)
        ];
        return view('admin/editSiswaRPLA', $data);
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
        return redirect()->to('admin/dataSiswaRPLA');
    }

    // Done
    public function editSiswaRPLB($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL B || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'rplb' => $this->rplBModel->getRPLB($slug)
        ];
        return view('admin/editSiswaRPLB', $data);
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
        return redirect()->to('admin/dataSiswaRPLB');
    }

    // Done
    public function editSiswaRPLC($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL C || Stemanikaku',
            'validation' => \Config\Services::validation(),
            'rplc' => $this->rplCModel->getRPLC($slug)
        ];
        return view('admin/editSiswaRPLC', $data);
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
        return redirect()->to('admin/dataSiswaRPLC');
    }

    // Done
    public function editMataPelajaran($slug)
    {
        $data = [
            'title' => 'Form Edit Mata Pelajaran || Admin Stemanikaku',
            'validation' => \Config\Services::validation(),
            'matapelajaran' => $this->rplAModel->getRPLA($slug)
        ];
        return view('admin/editMataPelajaran', $data);
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
        return redirect()->to('admin/dataMataPelajaran');
    }
    










    // Done
    // Hapus Sementara
    public function deleteSiswaRPLA($id = null)
    {
        $this->rplAModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa RPL A berhasil dihapus !!');
        return redirect()->to('/AdminController/dataSiswaRPLA');
    }

    // Done
    // Hapus Sementara
    public function deleteSiswaRPLB($id = null)
    {
        $this->rplBModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa RPL B berhasil dihapus !!');
        return redirect()->to('/AdminController/dataSiswaRPLB');
    }

    // Done
    // Hapus Sementara
    public function deleteSiswaRPLC($id = null)
    {
        $this->rplCModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa berhasil dihapus !!');
        return redirect()->to('/AdminController/dataSiswaRPLC');
    }

    // Done
    // Hapus Sementara
    public function deleteMatpel($id = null)
    {
        $this->matapelajaranModel->delete($id);
        session()->setFlashdata('pesan', 'Data Matpel berhasil dihapus !!');
        return redirect()->to('/AdminController/dataMataPelajaran');
    }

    // Done
    // Hapus Sementara
    public function deleteGuru($id = null)
    {
        $this->guruModel->delete($id);
        session()->setFlashdata('pesan', 'Data Guru berhasil dihapus !!');
        return redirect()->to('/AdminController/dataGuru');
    }

    










    public function register()
    {
        $data = [
            'title' => 'Register Akun || Admin Stemanikaku'
        ];
        return view('auth/register', $data);
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
