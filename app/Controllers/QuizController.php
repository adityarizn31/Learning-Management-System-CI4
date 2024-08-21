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

use App\Models\quizAlproModel;

use CodeIgniter\Config\Services;

class QuizController extends BaseController
{
    protected $adminModel;
    protected $rplAModel;
    protected $rplBModel;
    protected $rplCModel;
    protected $matapelajaranModel;
    protected $guruModel;

    protected $materiAlproModel;
    protected $tugasAlproModel;

    protected $quizAlpro;

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

        $this->quizAlpro = new quizAlproModel();
    }











    // Done
    public function setCountQuizAlpro()
    {
        return view('alpro/setCountQuizAlpro');
    }

    // Done
    public function createQuizAlpro()
    {
        $questionCount = $this->request->getPost('question_count');
        return view('quiz/createQuizAlpro', ['question_count' => $questionCount]);
    }

    // Done
    public function storeQuestions_Alpro()
    {
        $questions = $this->request->getPost('questions');

        foreach ($questions as $ques) {
            $validation = $this->validate([
                'question' => 'required',
                'option_a' => 'required',
                'option_b' => 'required',
                'option_c' => 'required',
                'option_d' => 'required',
                'correct_answer' => 'required',
            ]);
        }

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->quizAlpro->save([
            'question' => $ques['question'],
            'option_a' => $ques['option_a'],
            'option_b' => $ques['option_b'],
            'option_c' => $ques['option_c'],
            'option_d' => $ques['option_d'],
            'correct_answer' => $ques['correct_answer'],
        ]);

        session()->setFlashdata('success', 'Kuis berhasil disimpan.');
        return redirect()->to('/quiz');
    }
}
