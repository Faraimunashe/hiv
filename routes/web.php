<?php

use App\Http\Controllers\ProfileController;
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
    return redirect()->route('login');
});

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'role:nurse']], function () {
    Route::get('/nurse/dashboard', 'App\Http\Controllers\nurse\DashboardController@index')->name('nurse-dashboard');

    Route::get('/nurse/pre-ARTs', 'App\Http\Controllers\nurse\PreARTController@index')->name('nurse-preARTs');
    Route::get('/nurse/add-preART', 'App\Http\Controllers\nurse\PreARTController@add_patient')->name('nurse-preART-add');
    Route::post('/nurse-add-preART', 'App\Http\Controllers\nurse\PreARTController@add_patient')->name('nurse-add-preART');

    Route::get('/nurse/art-register', 'App\Http\Controllers\nurse\ArtController@index')->name('nurse-arts');
    Route::get('/nurse/add-art', 'App\Http\Controllers\nurse\ArtController@add_art')->name('nurse-art-add');
    Route::post('/nurse-add-art', 'App\Http\Controllers\nurse\ArtController@add_art')->name('nurse-add-art');

    Route::get('/nurse/full-details/{patient}', 'App\Http\Controllers\nurse\FullDetailController@index')->name('nurse-full-details');
});

Route::group(['middleware' => ['auth', 'role:labtech']], function () {
    Route::get('/labtech/dashboard', 'App\Http\Controllers\labtech\DashboardController@index')->name('labtech-dashboard');
});

Route::group(['middleware' => ['auth', 'role:patient']], function () {
    Route::get('/patient/dashboard', 'App\Http\Controllers\patient\DashboardController@index')->name('patient-dashboard');
});

require __DIR__.'/auth.php';
