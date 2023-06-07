<?php

use App\Http\Controllers\AddRoomController;
use App\Http\Controllers\APICovidController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postAdminController;

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
Route::get('/add', [AddRoomController::class, 'index']);
Route::post('/add', [AddRoomController::class, 'store'])->name('add.store');



Route::get('/signup',[RegisterController::class,'showRegistrationForm']);
Route::post('/signup',[RegisterController::class,'RegisterAction']);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/tong',[App\Http\Controllers\CongController::class,'tinhtong']);
Route::post('/tong',[App\Http\Controllers\CongController::class,'tinhtong']);

Route::get('/area',[App\Http\Controllers\AreaofshapeController::class,'computeArea']);
Route::post('/area',[App\Http\Controllers\AreaofshapeController::class,'computeArea']);


Route::get('/homepage', [MasterController::class,'getIndex']);

Route::get('/detail/{id}', [MasterController::class,'getDetail']);

Route::get('/type/{id}',[MasterController::class,'getLoaiSp']);

Route::get('/admin', [MasterController::class, 'getIndexAdmin']);

Route::get('/admin-add-form', [MasterController::class, 'getAdminAdd'])->name('add-product');

Route::post('/admin-add-form', [MasterController::class, 'postAdminAdd']);

Route::get('admin-edit-form/{id}', [MasterController::class, 'getAdminEdit']);

Route::post('admin-edit-form/{id}', [MasterController::class, 'postAdminEdit']);

Route::post('/admin-delete/{id}', [MasterController::class, 'postAdminDelete']);
