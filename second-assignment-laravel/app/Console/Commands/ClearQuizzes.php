<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Quiz;

class ClearQuizzes extends Command
{
    protected $signature = 'clear:quizzes';
    protected $description = 'Clear the quizzes table';

    public function handle()
    {
        Quiz::truncate();
        $this->info('Quizzes table cleared.');
    }
}