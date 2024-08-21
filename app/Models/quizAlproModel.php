<?php

namespace App\Models;

use CodeIgniter\Model;

class quizAlproModel extends Model
{
    protected $table = 'quiz_alpro';
    protected $useTimestamps = true;
    protected $allowedFields = ['question', 'option_a', 'option_b', 'option_c', 'option_d', 'correct_answer'];
}
