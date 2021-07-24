<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

// Route::post('logged_in', [LoginController::class, 'authenticate']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/question/{id}', [App\Http\Controllers\HomeController::class, 'question'])->name('question');
Route::post('answerQuestion/{id}', [App\Http\Controllers\HomeController::class, 'answerQuestion'])->name('answerQuestion');


Route::middleware(['auth', 'settings'])->prefix('Settings')->name('settings.')->group(function() {
    Route::get('/', [SettingsController::class, 'index'])->name('index');
    Route::get('/admin', [SettingsController::class, 'admin'])->name('admin');
    Route::get('/users', [SettingsController::class, 'users'])->name('users');
    Route::get('/deActiveSetting/{id}', [SettingsController::class, 'deActiveSetting'])->name('deActiveSetting');
    Route::get('/activeSetting/{id}', [SettingsController::class, 'activeSetting'])->name('activeSetting');

    Route::post('elimination', [SettingsController::class, 'elimination'])->name('elimination');
    
    Route::prefix('Question')->name('questions.')->group(function() {
        Route::get('/', [QuestionController::class, 'index'])->name('index');
        Route::get('create', [QuestionController::class, 'create'])->name('create');
        Route::get('show/{id}', [QuestionController::class, 'show'])->name('show');
        Route::get('edit/{id}', [QuestionController::class, 'edit'])->name('edit');
        Route::post('store', [QuestionController::class, 'store'])->name('store');
        Route::post('update/{id}', [QuestionController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [QuestionController::class, 'destroy'])->name('destroy');
        Route::get('activeQuestion/{id}', [QuestionController::class, 'activeQuestion'])->name('activeQuestion');
        Route::get('deActiveQuestion/{id}', [QuestionController::class, 'deActiveQuestion'])->name('deActiveQuestion');
        Route::get('correctAnswer/{id}', [QuestionController::class, 'correctAnswer'])->name('correctAnswer');
        Route::get('wrongAnswer/{id}', [QuestionController::class, 'wrongAnswer'])->name('wrongAnswer');
    });
});

