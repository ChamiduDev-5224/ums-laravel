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

// Route::get('/', function () {
//     return view('users.main');
// });

Route::get('register', function () {
return view('users.register');
});
// Route::get('data-view-login', function () {
//     return view('users.dataViewer');
//     });
Route::prefix('data_entry')->middleware('auth')->group(function(){
    Route::get('data-view-login', [UserController::class, 'dashboard']);

});
// Route::get('/', [UserController::class, 'index'])->name('main');
// Route::get('register', [UserController::class, 'index'])->name('users.register');
;



//Viewer
Route::get('viewer-dashboard',[ViewerController::class,'index']);

//operator
Route::get('operator-dashboard',[OperatorController::class,'index'])->name('operator.dashboard');
Route::get('operator-dashboard/add-new',[OperatorController::class,'dataForm']);
Route::post('add-person', [OperatorController::class, 'store'])->name('add.person');
Route::get('view-person/{id}',[OperatorController::class, 'show'])->name('persons.show');
Route::get('edit-person/{id}', [OperatorController::class, 'edit']);
Route::put('update-person/{id}',[OperatorController::class, 'update'])->name('persons.update');
Route::delete('remove-person/{id}',[OperatorController::class, 'destroy'])->name('persons.destroy');


//user
Route::get('/', [UserController::class, 'index']);
Route::post('user-registration', [UserController::class, 'registration'])->name('register.user');
Route::post('user-login', [UserController::class, 'login'])->name('login.user');
Route::get('logout', [UserController::class, 'Logout']);
