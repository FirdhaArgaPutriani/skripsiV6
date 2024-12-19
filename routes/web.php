<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\IntervalController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('jenis', JenisController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

Route::get('export1', [JenisController::class, 'excel'])->name('export1');
Route::get('pdf1', [JenisController::class, 'pdf'])->name('pdf1');

Route::resource('data', DataController::class)->only([
    'index', 'store', 'update', 'destroy'
]);

Route::get('export', [DataController::class, 'dataExport'])->name('export');
Route::get('pdf', [DataController::class, 'createPDF'])->name('pdf');

Route::get('interval', [IntervalController::class, 'menentukanInt'])->name('interval');
Route::get('rand', [IntervalController::class, 'random'])->name('rand');

Route::post('hasil', [IntervalController::class, 'hasil'])->name('hasil');

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('index/{id}', [ProfileController::class, 'update'])->name('updateProfile');
});