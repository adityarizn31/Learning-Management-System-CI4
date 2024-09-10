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

class Delete extends BaseController
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
}
