<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

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

Route::get('login', [MyController::class, 'login'])->name('login');

Route::get('register', [MyController::class, 'register'])->name('register');

Route::post('mylogin', [MyController::class, 'mylogin'])->name('my.login');

Route::post('myregister', [MyController::class, 'myregister'])->name('my.register');

Route::get('home', [MyController::class, 'home'])->name('home');

Route::get('edit', [MyController::class, 'edit'])->name('edit');

Route::put('myedit', [MyController::class, 'myedit'])->name('my.edit');

Route::delete('delete', [MyController::class, 'delete'])->name('my.delete');

Route::get('logout', [MyController::class, 'logout'])->name('logout');