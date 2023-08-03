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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index']);
    Route::get('/admin/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/barang', [App\Http\Controllers\BarangController::class, 'index']);
    Route::get('/admin/addbarang', [App\Http\Controllers\BarangController::class, 'addbarang']);
    Route::post('/admin/storebarang', [App\Http\Controllers\BarangController::class, 'storebarang']);
    Route::get('/admin/delbrg/{id}', [App\Http\Controllers\BarangController::class, 'destroybrg']);
    Route::get('/admin/{id}/editbrg', [App\Http\Controllers\BarangController::class, 'editbrg']);
    Route::post('/admin/updatebarang', [App\Http\Controllers\BarangController::class, 'updatebarang']);
    Route::get('/admin/mintabrg', [App\Http\Controllers\MintaController::class, 'index']);
    Route::get('/admin/addpermintaan', [App\Http\Controllers\MintaController::class, 'addpermintaan']);
    Route::post('/admin/storepermintaan', [App\Http\Controllers\MintaController::class, 'storepermintaan']);
    Route::get('/admin/delminta/{id}', [App\Http\Controllers\MintaController::class, 'destroyminta']);
    Route::get('/admin/{id}/editminta', [App\Http\Controllers\MintaController::class, 'editminta']);
    Route::post('/admin/updatepermintaan', [App\Http\Controllers\MintaController::class, 'updatepermintaan']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
