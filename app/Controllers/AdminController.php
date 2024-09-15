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

class AdminController extends BaseController
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
    public function createSiswaRPLA()
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
    public function saveSiswaRPLA()
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
    public function createSiswaRPLB()
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
    public function saveSiswaRPLB()
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
    public function createSiswaRPLC()
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
    public function saveSiswaRPLC()
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

    // Done
    public function createPengetahuanAlpro()
    {
        helper(['form']);
        $data = [
            'title' => 'Tambah Pengetahuan Alpro || Admin Stemanikaku',
            'validation' => \Config\Services::validation()
        ];
        return view('matapelajaran/alpro/pengetahuan_alpro/createPengetahuanAlpro', $data);
    }

    public function savePengetahuanAlpro()
    {
        $validate = $this->validate([
            'pertanyaan1' => [
                'rules' => 'required[surveyketerampilan.pertanyaan1]',
                'errors' => [
                    'required' => 'Pertanyaan 1 harus diisi !!'
                ],
            ],
            // 'jawaban1' => [
            //     'rules' => 'required[surveyketerampilan.jawaban1]',
            //     'errors' => [
            //         'required' => 'Jawaban 1 harus diisi !!'
            //     ],
            // ],
            'pertanyaan2' => [
                'rules' => 'required[surveyketerampilan.pertanyaan2]',
                'errors' => [
                    'required' => 'Pertanyaan 2 harus diisi !!'
                ],
            ],
            // 'jawaban2' => [
            //     'rules' => 'required[surveyketerampilan.jawaban2]',
            //     'errors' => [
            //         'required' => 'Jawaban 2 harus diisi !!'
            //     ],
            // ],
            'pertanyaan3' => [
                'rules' => 'required[surveyketerampilan.pertanyaan3]',
                'errors' => [
                    'required' => 'Pertanyaan 3 harus diisi !!'
                ],
            ],
            // 'jawaban3' => [
            //     'rules' => 'required[surveyketerampilan.jawaban3]',
            //     'errors' => [
            //         'required' => 'Jawaban 3 harus diisi !!'
            //     ],
            // ],
            'pertanyaan4' => [
                'rules' => 'required[surveyketerampilan.pertanyaan4]',
                'errors' => [
                    'required' => 'Pertanyaan 4 harus diisi !!'
                ],
            ],
            // 'jawaban4' => [
            //     'rules' => 'required[surveyketerampilan.jawaban4]',
            //     'errors' => [
            //         'required' => 'Jawaban 4 harus diisi !!'
            //     ],
            // ],
            'pertanyaan5' => [
                'rules' => 'required[surveyketerampilan.pertanyaan5]',
                'errors' => [
                    'required' => 'Pertanyaan 5 harus diisi !!'
                ],
            ],
            // 'jawaban5' => [
            //     'rules' => 'required[surveyketerampilan.jawaban5]',
            //     'errors' => [
            //         'required' => 'Jawaban 5 harus diisi !!'
            //     ],
            // ],
        ]);

        if (!$validate) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->surveyKeterampilanModel->save([
            'pertanyaan1' => $this->request->getVar('pertanyaan1'),
            'pertanyaan2' => $this->request->getVar('pertanyaan2'),
            'pertanyaan3' => $this->request->getVar('pertanyaan3'),
            'pertanyaan4' => $this->request->getVar('pertanyaan4'),
            'pertanyaan5' => $this->request->getVar('pertanyaan5'),
        ]);
        session()->setFlashdata('pesan', 'Survey Pengetahuan Alpro berhasil dibuat !!');
        return redirect()->to('/AdminController/dataPengetahuanAlpro');
    }

    public function savePengetahuanAlpro1()
    {
        $questionModel = new SoalModel();
        $answerModel = new JawabanModel();

        // Ambil data pertanyaan dari form
        $pertanyaan = $this->request->getPost('pertanyaan');

        // Pastikan pertanyaan tidak kosong
        if (empty($pertanyaan)) {
            return redirect()->back()->withInput()->with('error', 'Pertanyaan tidak boleh kosong.');
        }

        $data = [
            'pertanyaan' => $pertanyaan,
        ];

        // Simpan pertanyaan ke database
        if (!$questionModel->save($data)) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan pertanyaan.');
        }

        $questionId = $questionModel->insertID(); // Dapatkan ID pertanyaan yang baru disimpan

        // Ambil data jawaban dari form
        $answers = $this->request->getPost('jawaban');
        $isCorrect = $this->request->getPost('jawaban_benar');

        // Pastikan ada jawaban yang diinput
        if (!empty($answers) && is_array($answers)) {
            foreach ($answers as $key => $answer) {
                if (empty($answer)) {
                    continue; // Lewati jawaban kosong
                }
                $answerData = [
                    'pertanyaan_id' => $questionId,
                    'jawaban' => $answer,
                    'jawaban_benar' => isset($isCorrect[$key]) ? 1 : 0,
                ];

                // Simpan jawaban ke database
                $answerModel->save($answerData);
            }
        } else {
            // Jika tidak ada jawaban, berikan pesan error
            return redirect()->back()->withInput()->with('error', 'Jawaban tidak boleh kosong.');
        }

        return redirect()->to('AdminController/dataPengetahuanAlpro')->with('success', 'Pertanyaan dan jawaban berhasil dibuat.');


        // $data = [

        //     'pertanyaan' => $this->request->getPost('pertanyaan'),

        // ];


        // $this->soalModel->insert($data);


        // $jawabanData = $this->request->getPost('jawaban');

        // foreach ($jawabanData as $option) {

        //     $optionData = [

        //         'pertanyaan_id' => $this->soalModel->id,

        //         'jawaban' => $option['text'],

        //         'jawaban_benar' => $option['jawaban_benar'],

        //     ];

        //     $this->jawabanModel->insert($optionData);

        // }


        // // return redirect()->to('/questions');
        // return redirect()->to('AdminController/dataPengetahuanAlpro')->with('success', 'Pertanyaan dan jawaban berhasil dibuat.');
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
        $SISWAA = $this->siswaAModel->findAll();
        $data = [
            'title' => 'Siswa RPLA || Guru Stemanikaku',
            'siswaa' => $SISWAA
        ];
        return view('admin/rpla/dataSiswaRPLA', $data);
    }

    // Done
    public function dataSiswaRPLB()
    {
        $SISWAB = $this->siswaBModel->findAll();
        $data = [
            'title' => 'Siswa RPLB || Guru Stemanikaku',
            'siswab' => $SISWAB
        ];
        return view('admin/rplb/dataSiswaRPLB', $data);
    }

    // Done
    public function dataSiswaRPLC()
    {
        $SISWAC = $this->siswaCModel->findAll();
        $data = [
            'title' => 'Siswa RPLC || Guru Stemanikaku',
            'siswac' => $SISWAC
        ];
        return view('admin/rplc/dataSiswaRPLC', $data);
    }

    // Done
    public function dataMataPelajaran()
    {
        $MATPEL = $this->matapelajaranModel->findAll();
        $data = [
            'title' => 'Data Mata Pelajaran || Admin Stemanikaku',
            'matapelajaran' => $MATPEL
        ];
        return view('admin/matapelajaran/dataMataPelajaran', $data);
    }

    // Done
    public function dataGuru()
    {
        $GURU = $this->guruModel->findAll();
        $data = [
            'title' => 'Data Guru || Admin Stemanikaku',
            'guru' => $GURU
        ];
        return view('admin/guru/dataGuru', $data);
    }












    // Done
    public function detailSiswaRPLA($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL A || Guru Stemanikaku',
            // 'rpla' => $this->rplAModel->getRPLA($slug)
            'siswaa' => $this->siswaAModel->getRPLA($slug)
        ];
        return view('/admin/rpla/detailSiswaRPLA', $data);
    }

    // Done
    public function detailSiswaRPLB($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL B || Guru Stemanikaku',
            'siswab' => $this->siswaBModel->getRPLB($slug)
        ];
        return view('/admin/rplb/detailSiswaRPLB', $data);
    }

    // Done
    public function detailSiswaRPLC($slug)
    {
        $data = [
            'title' => 'Detail Siswa RPL C || Guru Stemanikaku',
            'siswac' => $this->siswaCModel->getRPLC($slug)
        ];
        return view('/admin/rplc/detailSiswaRPLC', $data);
    }

    // Done
    public function detailGuru($slug)
    {
        $data = [
            'title' => 'Detail Guru || Stemanikaku',
            'guru' => $this->guruModel->getGuru($slug)
        ];
        return view('/admin/guru/detailGuru', $data);
    }

    // Done
    public function detailMataPelajaran($slug)
    {
        $data = [
            'title' => 'Detail Mata Pelajaran || Stemanikaku',
            'matapelajaran' => $this->matapelajaranModel->getMatpel($slug)
        ];
        return view('/admin/matapelajaran/detailMataPelajaran', $data);
    }












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
    public function editSiswaRPLA($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL A || Stemanikaku',
            'validation' => \Config\Services::validation(),
            // 'rpla' => $this->rplAModel->getRPLA($slug)
            'siswaa' => $this->siswaAModel->getRPLA($slug)
        ];
        return view('admin/rpla/editSiswaRPLA', $data);
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

        // $this->rplAModel->save(
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
        return redirect()->to('/AdminController/dataSiswaRPLA');
    }

    // Done
    public function editSiswaRPLB($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL B || Stemanikaku',
            'validation' => \Config\Services::validation(),
            // 'rplb' => $this->rplBModel->getRPLB($slug)
            'siswab' => $this->siswaBModel->getRPLB($slug)
        ];
        return view('admin/rplb/editSiswaRPLB', $data);
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
        return redirect()->to('/AdminController/dataSiswaRPLB');
    }

    // Done
    public function editSiswaRPLC($slug)
    {
        $data = [
            'title' => 'Form Edit Siswa RPL C || Stemanikaku',
            'validation' => \Config\Services::validation(),
            // 'rplc' => $this->rplCModel->getRPLC($slug)
            'siswac' => $this->siswaCModel->getRPLC($slug)
        ];
        return view('admin/rplc/editSiswaRPLC', $data);
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

        // $this->rplCModel->save(
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
        return redirect()->to('/AdminController/dataSiswaRPLC');
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

    // Done
    public function editKeterampilanAlpro()
    {
        $data = [
            'title' => 'Edit Keterampilan Algoritma Pemrograman || Guru Stemanikaku',
            'validation' => \Config\Services::validation(),
            'surveyketerampilan' => $this->surveyKeterampilanModel->findAll()
        ];
        return view('admin/alpro/keterampilan_alpro/editKeterampilanAlpro', $data);
    }

    // Done
    public function updateKeterampilanAlpro($id)
    {
        if (!$this->validate([
            'pertanyaan1' => [
                'rules' => 'required[surveyketerampilan.pertanyaan1]',
                'errors' => [
                    'required' => 'Pertanyaan harus diisi !!'
                ],
            ],
            'pertanyaan2' => [
                'rules' => 'required[surveyketerampilan.pertanyaan2]',
                'errors' => [
                    'required' => 'Pertanyaan harus diisi !!'
                ],
            ],
            'pertanyaan3' => [
                'rules' => 'required[surveyketerampilan.pertanyaan3]',
                'errors' => [
                    'required' => 'Pertanyaan harus diisi !!'
                ],
            ],
            'pertanyaan4' => [
                'rules' => 'required[surveyketerampilan.pertanyaan4]',
                'errors' => [
                    'required' => 'Pertanyaan harus diisi !!'
                ],
            ],
            'pertanyaan5' => [
                'rules' => 'required[surveyketerampilan.pertanyaan5]',
                'errors' => [
                    'required' => 'Pertanyaan harus diisi !!'
                ],
            ],
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->surveyKeterampilanModel->save([
            'id' => $id,
            'pertanyaan1' => $this->request->getVar('pertanyaan1'),
            'pertanyaan2' => $this->request->getVar('pertanyaan2'),
            'pertanyaan3' => $this->request->getVar('pertanyaan3'),
            'pertanyaan4' => $this->request->getVar('pertanyaan4'),
            'pertanyaan5' => $this->request->getVar('pertanyaan5'),
        ]);
        session()->setFlashdata('pesan', 'Pertanyaan Keterampilan berhasil diubah !!');
        return redirect()->to('/AdminController/dataKeterampilan');
    }












    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteSiswaRPLA($id = null)
    {
        $this->siswaAModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa RPL A berhasil dihapus !!');
        return redirect()->to('/AdminController/dataSiswaRPLA');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteSiswaRPLB($id = null)
    {
        $this->siswaBModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa RPL B berhasil dihapus !!');
        return redirect()->to('/AdminController/dataSiswaRPLB/');
    }

    // Done
    // Hapus Sementara di Non aktifkan belum dibuat deleted_at
    public function deleteSiswaRPLC($id = null)
    {
        $this->siswaCModel->delete($id);
        session()->setFlashdata('pesan', 'Data Siswa berhasil dihapus !!');
        return redirect()->to('/AdminController/dataSiswaRPLC');
    }

    // Done
    // Hapus Sementara
    public function deleteMataPelajaran($id = null)
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

    // Done
    // Hapus Sementara
    public function deleteKeterampilanAlpro($id = null)
    {
        $this->surveyKeterampilanModel->delete($id);
        session()->setFlashdata('pesan', 'Survey Keterampilan berhasil dihapus !!');
        return redirect()->to('/AdminController/dataKeterampilanAlpro');
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
        $query = $this->siswaAModel->getWhere(['username_siswa' => $post['username_siswa']]);
        $user = $query->getRow();

        if ($user) {
            if (password_verify($post['password_siswa'], $user->password_user)) {
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
}
