<?php

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

Route::get('/dashboard', function () {
    return view('student.dashboard');
})->middleware(['student'])->name('dashboard');

// ............... User Routes .........
require __DIR__.'/student_auth.php';

// ............... Admin Routes .........

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.dashboard');

Route::get('/admin/check', function () {
    return view('check');
})->middleware(['auth',"can:isAdmin"])->name('admin.check');
require __DIR__.'/auth.php';
