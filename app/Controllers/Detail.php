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

class Detail extends BaseController
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
    // Grafik Semua Pertemuan berdaasarkan siswa yang pilih
    // Berada di Manajemen Kelas
    public function grafikSiswa($slug)
    {
        $NILAIA = $this->siswaAModel->getSiswaWithNilai($slug);
        $data = [
            'title' => 'Detail Nilai Grafik Siswa || Guru Stemanikaku',
            'nilai_siswa' => $NILAIA
        ];
        return view('guru/rpla/detailGrafikRPLA_Alpro', $data);   
    }
}
