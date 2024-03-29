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
    Route::get('/admin/addbarangmasuk', [App\Http\Controllers\BmController::class, 'addbarangmasuk']);
    Route::post('/admin/storebarangmasuk', [App\Http\Controllers\BmController::class, 'storebarangmasuk']);
    Route::get('/admin/barangkeluar', [App\Http\Controllers\BkController::class, 'index']);
    Route::get('/admin/addbarangkeluar', [App\Http\Controllers\BkController::class, 'addbarangkeluar']);
    Route::post('/admin/storebarangkeluar', [App\Http\Controllers\BkController::class, 'storebarangkeluar']);
    Route::get('/admin/{id}/pdfmasuk', [App\Http\Controllers\BarangController::class, 'pdfmasuk']);
    Route::get('/admin/{id}/pdfkeluar', [App\Http\Controllers\BarangController::class, 'pdfkeluar']);
    Route::get('/admin/{id}/detailbm', [App\Http\Controllers\BmController::class, 'detailbm']);
    Route::get('/admin/{id}/detailbk', [App\Http\Controllers\BkController::class, 'detailbk']);
    Route::get('/admin/addbarangkeluar', [App\Http\Controllers\BkController::class, 'addbarangkeluar']);
    Route::get('/admin/supplier', [App\Http\Controllers\SupplierController::class, 'index']);
    Route::get('/admin/addsupplier', [App\Http\Controllers\SupplierController::class, 'addsupplier']);
    Route::post('/admin/storesupplier', [App\Http\Controllers\SupplierController::class, 'storesupplier']);
    Route::get('/admin/delsupplier/{id}', [App\Http\Controllers\SupplierController::class, 'destroysup']);
    Route::get('/admin/{id}/editsupplier', [App\Http\Controllers\SupplierController::class, 'editsupplier']);
    Route::post('/admin/updatesupplier', [App\Http\Controllers\SupplierController::class, 'updatesupplier']);
    Route::get('/admin/dellistpesan/{id}', [App\Http\Controllers\MintaController::class, 'destroylistpesan']);
    Route::get('/admin/{id}/editlistpesan', [App\Http\Controllers\MintaController::class, 'editlistpesan']);
    Route::post('/admin/updatelistpesan', [App\Http\Controllers\MintaController::class, 'updatelistpesan']);
    Route::get('/admin/delbm/{id}', [App\Http\Controllers\BmController::class, 'destroybm']);
    Route::get('/admin/{id}/editambil', [App\Http\Controllers\BmController::class, 'editambil']);
    Route::post('/admin/updateambil', [App\Http\Controllers\BmController::class, 'updateambil']);
    Route::get('/admin/dellistambil/{id}', [App\Http\Controllers\BmController::class, 'destroylistambil']);
    Route::get('/admin/{id}/editlistambil', [App\Http\Controllers\BmController::class, 'editlistambil']);
    Route::post('/admin/updatelistambil', [App\Http\Controllers\BmController::class, 'updatelistambil']);
    Route::get('/admin/{id}/detailpesan', [App\Http\Controllers\MintaController::class, 'detailpesan']);
    Route::get('/admin/konfir_sup/{id}', [App\Http\Controllers\MintaController::class, 'konfirsup']);
    Route::get('/admin/konfir_ambil/{id}', [App\Http\Controllers\BmController::class, 'konfirambil']);
    Route::get('/admin/suratjalan', [App\Http\Controllers\MintaController::class, 'suratjalan']);
    Route::get('/admin/{id}/cetaksj', [App\Http\Controllers\BarangController::class, 'cetaksj']);
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
