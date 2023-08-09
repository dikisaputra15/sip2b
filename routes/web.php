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
    Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::post('/admin/storeregister', [App\Http\Controllers\UserController::class, 'storeregister']);
    Route::get('/admin/{id}/edituser', [App\Http\Controllers\UserController::class, 'edituser']);
    Route::get('/admin/adduser', [App\Http\Controllers\UserController::class, 'adduser']);
    Route::get('/admin/{id}/changeuserpass', [App\Http\Controllers\UserController::class, 'changeuserpass']);
    Route::post('/admin/deluser/{id}', [App\Http\Controllers\UserController::class, 'destroyuser']);
    Route::post('/admin/updatepass', [App\Http\Controllers\UserController::class, 'updatepass']);
    Route::get('/admin/barang', [App\Http\Controllers\BarangController::class, 'index']);
    Route::get('/admin/addbarang', [App\Http\Controllers\BarangController::class, 'addbarang']);
    Route::post('/admin/storebarang', [App\Http\Controllers\BarangController::class, 'storebarang']);
    Route::get('/admin/delbrg/{id}', [App\Http\Controllers\BarangController::class, 'destroybrg']);
    Route::get('/admin/{id}/editbrg', [App\Http\Controllers\BarangController::class, 'editbrg']);
    Route::post('/admin/updatebarang', [App\Http\Controllers\BarangController::class, 'updatebarang']);
    Route::get('/admin/stokbarang', [App\Http\Controllers\BarangController::class, 'stokbarang']);
    Route::get('/admin/lapstok', [App\Http\Controllers\BarangController::class, 'lapstok']);
    Route::get('/admin/pdfstok', [App\Http\Controllers\BarangController::class, 'pdfstok']);
    Route::get('/admin/lapbarangmasuk', [App\Http\Controllers\BarangController::class, 'lapbarangmasuk']);
    Route::get('/admin/lapbarangkeluar', [App\Http\Controllers\BarangController::class, 'lapbarangkeluar']);
    Route::get('/admin/mintabrg', [App\Http\Controllers\MintaController::class, 'index']);
    Route::get('/admin/addpermintaan', [App\Http\Controllers\MintaController::class, 'addpermintaan']);
    Route::post('/admin/storepermintaan', [App\Http\Controllers\MintaController::class, 'storepermintaan']);
    Route::get('/admin/delminta/{id}', [App\Http\Controllers\MintaController::class, 'destroyminta']);
    Route::get('/admin/{id}/editminta', [App\Http\Controllers\MintaController::class, 'editminta']);
    Route::post('/admin/updatepermintaan', [App\Http\Controllers\MintaController::class, 'updatepermintaan']);
    Route::get('/admin/barangmasuk', [App\Http\Controllers\BmController::class, 'index']);
    Route::get('/admin/barangkeluar', [App\Http\Controllers\BkController::class, 'index']);
    Route::post('/admin/pdfmasuk', [App\Http\Controllers\BarangController::class, 'pdfmasuk']);
    Route::post('/admin/pdfkeluar', [App\Http\Controllers\BarangController::class, 'pdfkeluar']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
