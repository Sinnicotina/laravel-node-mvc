<?php

use App\Http\Controllers\api\EstudianteController;
use App\Http\Controllers\api\CarreraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/estudiantes', [EstudianteController::class,'store'])->name('estudiantes.store');
Route::get('/estudiantes', [EstudianteController::class,'index'])->name('estudiantes');
Route::delete('/estudiantes/{estudiante}', [EstudianteController::class,'destroy'])->name('estudinates.destroy');
Route::get('/estudiantes/{estudiante}', [EstudianteController::class,'show'])->name('estudinates.show');
Route::put('/estudiantes/{estudiante}', [EstudianteController::class,'update'])->name('estudinates.update');


Route::get('/carreras', [CarreraController::class,'index'])->name('estudinates');

