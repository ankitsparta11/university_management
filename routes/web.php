<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

// Student Routes
Route::resource('students', StudentController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);

// Teacher Routes
Route::resource('teachers', TeacherController::class)->only([
    'index', 'create', 'store', 'edit', 'update', 'destroy'
]);

// Search route for students (if applicable)
Route::get('/students/search', [StudentController::class, 'search'])->name('students.search');
