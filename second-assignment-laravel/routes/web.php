<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;



// Route::get('/', function () {
//     $quizzes = [
//         ['name' => 'Math Quizz', 'photo' => 'math.png', 'status' => 'active'],
//         ['name' => 'Literature Quizz', 'photo' => 'literature.jpg', 'status' => 'inactive'],
//         ['name' => 'Biology Quizz', 'photo' => 'biology.jpg', 'status' => 'active'],
//     ];
//     return view('index', compact('quizzes'));
// });

Route::get('/', [QuizController::class, 'index']);


Route::post('/subscribe', function (Request $request) {
    
    session()->flash('status', 'Subscribed successfully!');
    return redirect()->back();
})->name('subscribe');