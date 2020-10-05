<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/', [StudentController::class, 'index'])->name('student.students');
Route::post('student/store', [StudentController::class, 'store'])->name('student.store');
Route::post('student/grede/store', [StudentController::class, 'storeStudentGrade'])->name('student.grade.store');
Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('student/{id}/show', [StudentController::class, 'show'])->name('student.show');
Route::get('student/{id}/gredes/create', [StudentController::class, 'addGradeToStudent'])->name('student.grade.add');
Auth::routes();



