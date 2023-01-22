<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('users.main');
});

Route::get('register', function () {
return view('users.register');
});
Route::get('data-view-login', function () {
    return view('users.dataViewer');
    });

// Route::get('/', [UserController::class, 'index'])->name('main');
// Route::get('register', [UserController::class, 'index'])->name('users.register');
// Route::get('data-view-login', [UserController::class, 'index'])->name('users.register');
Route::post('user-registration', [UserController::class, 'registration'])->name('register.user');
