<?php

use App\Http\Controllers\BcrController;
use App\Http\Controllers\DaviviendaController;
use App\Http\Controllers\EcuadorController;
use App\Http\Controllers\HondurasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UruguayController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/honduras', [HondurasController::class, 'index'])->name('honduras.index');
    Route::get('/bcr', [BcrController::class, 'index'])->name('bcr.index');
    Route::post('/bcr/upload', [BcrController::class, 'upload'])->name('bcr.upload');
    Route::get('/ecuador', [EcuadorController::class, 'index'])->name('ecuador.index');
    Route::get('/davivienda', [DaviviendaController::class, 'index'])->name('davivienda.index');
    Route::post('/davivienda/upload', [DaviviendaController::class, 'upload'])->name('davivienda.upload');
    Route::get('/uruguay', [UruguayController::class, 'index'])->name('uruguay.index');
    Route::get('/panama', [UruguayController::class, 'index'])->name('uruguay.index');
    //Route::get('/import', [BcrController::class, 'import'])->name('bcr.import');
});

/**Route::get('/honduras', function () {
    return view('countries.honduras');
})->middleware(['auth', 'verified'])->name('countries.honduras');**/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
