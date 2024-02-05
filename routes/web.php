<?php
use \App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//use App\Models\Chirp;

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
DB::listen(function ($query){
    dump($query->sql);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/chirps', [ChirpController::class, 'index']
          )->name('chirps.index');
Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']
)->name('chirps.edit');

Route::post('/chirps', [ChirpController::class, 'store']
)->name('chirps.store');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

