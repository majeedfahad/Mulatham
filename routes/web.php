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
});

Auth::routes();

// Route::post('logged_in', [LoginController::class, 'authenticate']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'settings'])->prefix('Settings')->name('settings.')->group(function() {
    Route::get('/', [SettingsController::class, 'index']);
    
    Route::prefix('Question')->name('questions.')->group(function() {
        Route::get('/', [QuestionController::class, 'index'])->name('index');
        Route::get('create', [QuestionController::class, 'create'])->name('create');
        Route::get('edit/{id}', [QuestionController::class, 'edit'])->name('edit');
        Route::post('store', [QuestionController::class, 'store'])->name('store');
        Route::post('update/{id}', [QuestionController::class, 'update'])->name('update');
        Route::get('destroy/{id}', [QuestionController::class, 'destroy'])->name('destroy');
    });
});

