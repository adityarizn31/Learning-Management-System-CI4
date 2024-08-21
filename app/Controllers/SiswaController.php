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

class SiswaController extends BaseController
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












    public function index()
    {
        $data = [
            'title' => 'Dashboard || Siswa Stemanikaku'
        ];
        return view('siswa/index', $data);
    }












    public function createTugas()
    {
        $data = [
            'title' => 'Tambah Tugas Alpro || Siswa Stemanikaku'
        ];
        return view('siswa/inputTugas', $data);
    }













    // Done
    public function dataMataPelajaran()
    {
        $MATPEL = $this->matapelajaranModel->findAll();
        $data = [
            'title' => 'Data Mata Pelajaran || Guru Stemanikaku',
            'matapelajaran' => $MATPEL
        ];
        return view('siswa/dataMataPelajaran', $data);
    }

    // Done
    public function dataMateriAlpro()
    {
        $ALPRO = $this->materiAlproModel->findAll();
        $data = [
            'title' => 'Materi Algoritma Pemrograman || Guru Stemanikaku',
            'materi_alpro' => $ALPRO
        ];
        return view('siswa/alpro/dataMateriAlpro', $data);
    }

    // Done
    public function dataTugasAlpro()
    {
        $TUGASALPRO = $this->tugasAlproModel->findAll();
        $data = [
            'title' => 'Daftar Tugas Algoritma Pemrograman || Guru Stemanikaku',
            'tugas_alpro' => $TUGASALPRO
        ];
        return view('siswa/alpro/dataTugasAlpro', $data);
    }

    // Done 
    public function dataPengetahuanAlpro()
    {
        $RPLA = $this->rplAModel->findAll();
        $data = [
            'title' => 'Daftar Pengetahuan Algoritma Pemrograman || Guru Stemanikaku',
            'rpla' => $RPLA
        ];
        return view('siswa/alpro/dataPengetahuanAlpro', $data);
    }










    // Done
    public function detailMateriAlpro($slug)
    {
        $data = [
            'title' => 'Detail Materi Algoritma Pemrograman || Guru Stemanikaku',
            'materi_alpro' => $this->materiAlproModel->getMatAlpro($slug)
        ];
        return view('/siswa/alpro/detailMateriAlpro', $data);
    }

    // Done
    public function detailTugasAlpro($slug)
    {
        $data = [
            'title' => 'Detail Tugas Algoritma Perograman || Guru Stemanikaku',
            'tugas_alpro' => $this->tugasAlproModel->getTugasAlpro($slug)
        ];
        return view('/siswa/alpro/detailTugasAlpro', $data);
    }
}
