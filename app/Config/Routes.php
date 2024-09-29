<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH .  'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * @var RouteCollection $routes
 */

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

$routes->get('/', 'Home::index');

$routes->get('auth/loginsiswa', 'Auth::loginsiswa');

// Admin
$routes->get('admin/', 'AdminController::index');
$routes->get('admin/login', 'AdminController::login');

$routes->get('admin/dataGuru', 'AdminController::dataGuru');
$routes->get('admin/createGuru', 'AdminController::createGuru');
$routes->get('/admin/detailGuru/(:segment)',  'AdminController::detailGuru/$1');
$routes->get('/admin/editGuru/(:segment)', 'AdminController::editGuru/$1');

$routes->get('admin/dataSiswaRPLA', 'AdminController::dataSiswaRPLA');
$routes->get('admin/dataSiswaRPLB', 'AdminController::dataSiswaRPLB');
$routes->get('admin/dataSiswaRPLC', 'AdminController::dataSiswaRPLC');
$routes->get('admin/createSiswaRPLA', 'AdminController::createSiswaRPLA');
$routes->get('admin/createSiswaRPLB', 'AdminController::createSiswaRPLB');
$routes->get('admin/createSiswaRPLC', 'AdminController::createSiswaRPLC');
$routes->get('/admin/detailSiswaRPLA/(:segment)', 'AdminController::detailSiswaRPLA/$1');
$routes->get('/admin/detailSiswaRPLB/(:segment)', 'AdminController::detailSiswaRPLB/$1');
$routes->get('/admin/detailSiswaRPLC/(:segment)', 'AdminController::detailSiswaRPLC/$1');
$routes->get('/admin/editSiswaRPLA/(:segment)', 'AdminController::editSiswaRPLA/$1');
$routes->get('/admin/editSiswaRPLB/(:segment)', 'AdminController::editSiswaRPLB/$1');
$routes->get('/admin/editSiswaRPLC/(:segment)', 'AdminController::editSiswaRPLC/$1');

$routes->get('admin/dataMataPelajaran', 'AdminController::dataMataPelajaran');
$routes->get('admin/createMataPelajaran', 'AdminController::createMataPelajaran');
$routes->get('/admin/detailMataPelajaran', 'AdminController::detailMataPelajaran');
$routes->get('/admin/editMataPelajaran/(:segment)', 'AdminController::editMataPelajaran/$1');

// Guru
$routes->get('guru/', 'GuruController::index');
$routes->get('guru/dataSiswaRPLA', 'GuruController::dataSiswaRPLA');
$routes->get('guru/dataSiswaRPLB', 'GuruController::dataSiswaRPLB');
$routes->get('guru/dataSiswaRPLC', 'GuruController::dataSiswaRPLC');
$routes->get('guru/createSiswaRPLA', 'GuruController::createSiswaRPLA');
$routes->get('guru/createSiswaRPLB', 'GuruController::createSiswaRPLB');
$routes->get('guru/createSiswaRPLC', 'GuruController::createSiswaRPLC');
$routes->get('/guru/detailSiswaRPLA/(:segment)', 'GuruController::detailSiswaRPLA/$1');
$routes->get('/guru/detailSiswaRPLB/(:segment)', 'GuruController::detailSiswaRPLB/$1');
$routes->get('/guru/detailSiswaRPLC/(:segment)', 'GuruController::detailSiswaRPLC/$1');
$routes->get('/guru/editSiswaRPLA/(:segment)', 'GuruController::editSiswaRPLA/$1');
$routes->get('/guru/editSiswaRPLB/(:segment)', 'GuruController::editSiswaRPLB/$1');
$routes->get('/guru/editSiswaRPLC/(:segment)', 'GuruController::editSiswaRPLC/$1');

$routes->get('guru/dataMataPelajaran', 'GuruController::dataMataPelajaran');

$routes->get('guru/alpro/materi_alpro/dataMateriAlpro', 'GuruController::dataMateriAlpro');
$routes->get('guru/alpro/materi_alpro/createMateriAlpro', 'GuruController::createMateriAlpro');
$routes->get('/guru/alpro/materi_alpro/detailMateriAlpro', 'GuruController::detailMateriAlpro');
$routes->get('/guru/alpro/editMateriAlpro/(:segment)', 'GuruController::editMateriAlpro/$1');

$routes->get('guru/alpro/dataTugasAlpro', 'GuruController::dataTugasAlpro');
$routes->get('guru/alpro/createTugasAlpro', 'GuruController::createTugasAlpro');
$routes->get('/guru/alpro/detailTugasAlpro', 'GuruController::detailTugasAlpro');
$routes->get('guru/alpro/editTugasAlpro', 'GuruController::editTugasAlpro');

$routes->get('guru/alpro/dataPengetahuanAlpro', 'GuruController::dataPengetahuanAlpro');
$routes->get('guru/alpro/pengetahuan_alpro/takeQuiz', 'GuruController::takeQuiz');

$routes->get('/quiz/set_question_count', 'QuizController::setQuestionCount');
$routes->post('/quiz/create_questions', 'QuizController::createQuestions');
$routes->post('/quiz/store_questions', 'QuizController::storeQuestions');

$routes->get('guru/alpro/keterampilan_alpro/dataKeterampilanAlpro', 'GuruController::dataKeterampilanAlpro');

$routes->get('guru/rpla/createSiswaA', 'GuruController::createSiswaA');
$routes->get('guru/rpla/dataTNilaiRPLA_Alpro', 'GuruController::dataNilaiRPLA_Alpro');
$routes->get('guru/rpla/dataNilaiRPLA_Alpro', 'GuruController::dataNilaiRPLA_Alpro');
$routes->get('guru/rpla/createNilaiSiswaA', 'GuruController::createNilaiSiswaA');
$routes->get('guru/rpla/createNilaiKeterampilanA', 'GuruController::createNilaiKeterampilanA');

$routes->get('guru/rplb/createSiswaB', 'GuruController::createSiswaB');
$routes->get('guru/rplb/dataNilaiRPLB_Alpro', 'GuruController::dataNilaiRPLB_Alpro');
$routes->get('guru/rplb/createNilaiSiswaB', 'GuruController::createNilaiSiswaB');

$routes->get('guru/rplc/createSiswaC', 'GuruController::createSiswaC');
$routes->get('guru/rplc/dataNilaiRPLC_Alpro', 'GuruController::dataNilaiRPLC_Alpro');
$routes->get('guru/rplc/createNilaiSiswaC', 'GuruController::createNilaiSiswaC');

$routes->get('guru/soal/createPilgan', 'GuruController::createPilgan');
$routes->get('guru/soal/createPilgan', 'GuruController::deletePilgan/$1');

// Siswa
$routes->get('siswa/', 'SiswaController::index');
$routes->get('siswa/inputTugas', 'SiswaController::createTugas');
$routes->get('siswa/dataMataPelajaran', 'SiswaController::dataMataPelajaran');
