<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EstudianteController;
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    route::get('/estudiantes', [EstudianteController::class,'index'])->name('estudiantes.index');
route::post('/estudiantes', [EstudianteController::class,'store'])->name('estudiantes.store');
route::get('/estudiantes/create', [EstudianteController::class,'create'])->name('estudiantes.create');
route::delete('/estudiantes/{estudiante}', [EstudianteController::class,'destroy'])->name('estudiantes.destroy');
route::put('/estudiantes/{estudiante}', [EstudianteController::class,'update'])->name('estudiantes.update');
route::get('/estudiantes/{estudiante}/edit', [EstudianteController::class,'edit'])->name('estudiantes.edit');
});

require __DIR__.'/auth.php';
