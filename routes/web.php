<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\gradeController;
use App\Http\Controllers\studentController;

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

Route::get('/grade', function () {
    return view('grade');
})->middleware(['auth', 'verified'])->name('grade');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/grade', gradeController::class);
Route::resource('/dashboard', studentController::class);

Route::get('/dashboard/addStudent', [gradeController::class, 'create'])->name('createStudent');
Route::post('/dashboard/addStudent', [gradeController::class, 'store'])->name('store.Student');

Route::get('/dashboard/edit/{id}', [studentController::class, 'edit'])->name('editGrade');
Route::post('/dashboard/edit/{id}', [studentController::class, 'update'])->name('grade.update');
Route::get('/dashboard/showStudent/{id}', [studentController::class, 'show'])->name('view.Grade');
Route::get('/dashboard/createGrade/{id}', [studentController::class, 'create'])->name('create.Grade');
Route::post('/dashboard/addGrade/{id}', [studentController::class, 'store'])->name('grade.add');
Route::get('/dashboard/delete/{id}', [studentController::class, 'destroy'])->name('deleteStudent');

Route::get('/dashboard/showGrade/{id}', [gradeController::class, 'show'])->name('view.GradeStudent');
Route::post('/dashboard/showGrade/update/{id}', [studentController::class, 'update'])->name('update.Grade');
require __DIR__.'/auth.php';
