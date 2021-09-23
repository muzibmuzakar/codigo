<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/user/register', [UserController::class, 'register'])->name('user.register');

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
    Route::post('/user/save', [UserController::class, 'save'])->name('user.save');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // pelajaran
    Route::resource('pelajaran', PelajaranController::class);
    // materi
    Route::get('/materi{id}', [MateriController::class, 'addMateri'])->name('materi.addMateri');
    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');
    Route::delete('/deleteSlide/{id}', [MateriController::class, 'deleteSlide'])->name('materi.deleteSlide');
    Route::resource('materi', MateriController::class);

    // quiz
    Route::resource('quiz', QuizController::class);
    // Route::post('materiQuiz', QuizController::class, 'materiQuiz')->name('materiQuiz');
    Route::post('/materiQuiz', [QuizController::class, 'materiQuiz'])->name('materiQuiz');

});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    // Route::get('/login', [UserController::class, 'signin'])->name('login');
    Route::get('/pelajaranDetail/{id}', [MainController::class, 'pelajaranDetail'])->name('pelajaranDetail');
    Route::get('/belajar/{id}', [MainController::class, 'belajar'])->name('belajar');
    Route::get('/quizJson/{id}', [QuizController::class, 'quizJson'])->name('quiz.quizJson');
    // quiz
    Route::get('/belajarQuiz/{id}', [MainController::class, 'belajarQuiz'])->name('belajar.quiz');
    Route::get('/game/{id}', [MainController::class, 'game'])->name('quiz.game');
    Route::get('/endQuiz/{id}', [MainController::class, 'endQuiz'])->name('quiz.endQuiz');

    Route::get('game/html/{id}', [GameController::class, 'html1'])->name('game.html1');
    Route::get('game/html1/lvl1/{id}', [GameController::class, 'html1_lvl1'])->name('game.html1.lvl1');
    Route::get('game/html1/lvl2/{id}', [GameController::class, 'html1_lvl2'])->name('game.html1.lvl2');
    Route::get('game/html1/lvl3/{id}', [GameController::class, 'html1_lvl3'])->name('game.html1.lvl3');
    Route::get('game/html1/end/{id}', [GameController::class, 'html1_end'])->name('game.html1.end');

});