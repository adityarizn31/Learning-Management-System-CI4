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

class Data extends BaseController
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
















    // Bagian Guru
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
        $MATERIALPRO = $this->materiAlproModel->findAll();
        $RPLA = $this->rplAModel->findAll();
        $data = [
            'title' => 'Daftar Pengetahuan Algoritma Pemrograman || Guru Stemanikaku',
            'materi_alpro' => $MATERIALPRO,
            'rpla' => $RPLA
        ];
        return view('guru/alpro/pengetahuan_alpro/dataPengetahuanAlpro', $data);
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
    public function dataTNilaiRPLA_Alpro()
    {
        $NILAIA = $this->siswaAModel->getSiswaWithNilai();
        $data = [
            'title' => 'Data Nilai RPLA Algoritma Perograman || Guru Stemanikaku',
            'siswa_nilai' => $NILAIA
        ];
        return view('guru/rpla/dataNilaiRPLA_Alpro', $data);
    }

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
}