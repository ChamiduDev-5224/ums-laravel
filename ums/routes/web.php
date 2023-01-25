<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewerController;
use App\Http\Controllers\OperatorController;

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

Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('register', function () {
return view('users.register');
});

//Viewer
Route::get('viewer-dashboard',[ViewerController::class,'index']);
Route::get('show-chart',[ViewerController::class,'show']);

//operator
Route::get('operator-dashboard',[OperatorController::class,'index'])->name('operator.dashboard');
Route::get('operator-dashboard/add-new',[OperatorController::class,'dataForm']);
Route::post('add-person', [OperatorController::class, 'store'])->name('add.person');
Route::get('view-person/{id}',[OperatorController::class, 'show'])->name('persons.show');
Route::get('edit-person/{id}', [OperatorController::class, 'edit']);
Route::put('update-person/{id}',[OperatorController::class, 'update'])->name('persons.update');
Route::delete('remove-person/{id}',[OperatorController::class, 'destroy'])->name('persons.destroy');


//user
Route::get('/', [UserController::class, 'index'])->name('login');
Route::post('user-registration', [UserController::class, 'registration'])->name('register.user');
Route::post('user-login', [UserController::class, 'login'])->name('login.user');
Route::get('logout', [UserController::class, 'Logout']);
 });
