<?php

use App\Http\Controllers\FormController;
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

Route::get('/', [FormController::class, 'home'])->name('home');

Route::get('/form', [FormController::class, 'form'])->name('form');

Route::post('/form', [FormController::class, 'store'])->name('store');

Route::get('/table', [FormController::class, 'table'])->name('table');

Route::get('delete/{id}', [FormController::class, 'remove'])->name('remove');

