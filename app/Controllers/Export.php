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

use CodeIgniter\Config\Services;

class Export extends BaseController
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
    }

    public function exportRPLA()
    {
        $siswaRPLA =  new RPLAModel();
        $dataSiswaRPLA = $siswaRPLA->onlyDeleted()->findAll();

        
    }
}
