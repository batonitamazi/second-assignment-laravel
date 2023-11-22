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

Route::get('/quizzes', [QuizController::class, 'quizzes'])->name('quizzes.index');

Route::get("/subscribe", function(Request $request) {
    return view('subscribe');
})->name('subscribe.index');

Route::get('/quizzes/{id}/edit', [QuizController::class, 'createOrEdit'])->name('quizzes.edit');
Route::get('/quizzes/create', [QuizController::class, 'createOrEdit'])->name('quizzes.create');

Route::post('/quizzes', [QuizController::class, 'store'])->name('quizzes.store');
Route::put('/quizzes/{quiz}', [QuizController::class, 'update'])->name('quizzes.update');

Route::post('/subscribe', function (Request $request) {
    
    session()->flash('status', 'Subscribed successfully!');
    return redirect()->back();
})->name('subscribe');