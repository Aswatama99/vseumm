<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\produkController;
use Illuminate\Http\Request;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\transaksiproduk;
use App\Http\Controllers\adminController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getuser',[usercontroller::class,'getuser']);
Route::post('/adduser',[usercontroller::class,'adduser']);
Route::put('/updateuser/{id}',[usercontroller::class,'updateuser']);
Route::delete('/deleteuser/{id}',[usercontroller::class,'deleteuser']);
Route::get('/getuserid/{id}',[usercontroller::class,'getuserid']);

//produk

Route::middleware('auth:sanctum')->get('/produk', function (Request $request) {
    return $request->produk();
});
Route::get('/getproduk',[produkController::class,'getproduk']);
Route::post('/addproduk',[produkController::class,'addproduk']);
Route::put('/updateproduk/{id}',[produkController::class,'updateproduk']);
Route::delete('/deleteproduk/{id}',[produkController::class,'deleteproduk']);
Route::get('/getprodukid/{id}',[produkController::class,'getprodukid']);

//admin

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getadmin',[adminController::class,'getadmin']);
Route::post('/addadmin',[adminController::class,'addadmin']);
Route::put('/updateadmin/{id}',[adminController::class,'updateadmin']);
Route::delete('/deleteadmin/{id}',[adminController::class,'deleteadmin']);
Route::get('/getadminid/{id}',[adminController::class,'getadminid']);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::post('/beliproduk', [transaksiproduk::class, 'beliproduk']);
Route::post('/tambahItem/{id}', [transaksiproduk::class,'tambahItem']);