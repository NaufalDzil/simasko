<?php

use App\Http\Controllers\{
    DashboardController,
    KategoriBarangController,
    KategoriServisController,
    KaryawanController,
    PenggunaController,
    SupplierController,
    DaftarBarangController,
    BarangMasukController,
    BarangKeluarController,
    ServisMasukController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::group([
    'middleware' => ['auth', 'role:admin,karyawan']
], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute yang dapat diakses oleh admin dan karyawan
    Route::resource('/kservis', KategoriServisController::class);
    Route::resource('/kbarang', KategoriBarangController::class);
    Route::resource('/supplier', SupplierController::class);
    Route::resource('/dbarang', DaftarBarangController::class);
    Route::resource('/bmasuk', BarangMasukController::class);
    Route::resource('/bkeluar', BarangKeluarController::class);
    Route::resource('/servismasuk', ServisMasukController::class)->except(['show']);
    Route::delete('/servismasuk/{id}', [ServisMasukController::class, 'destroy'])->name('servismasuk.delete');
    Route::get('/servismasuk/{servismasuk}/edit', [ServisMasukController::class, 'edit'])->name('servismasuk.edit');

    Route::group([
        'middleware' => 'role:admin'
    ], function () {
        // Rute yang hanya dapat diakses oleh admin
        Route::resource('/pengguna', PenggunaController::class);
        Route::resource('/karyawan', KaryawanController::class)->except(['show']);
        Route::get('/daftarbarang/pdf', [DaftarBarangController::class, 'generatePDF'])->name('dbarang.pdf');
        Route::get('/karyawan/details', [KaryawanController::class, 'details'])->name('karyawan.details');
        Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.delete');
        Route::get('/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
        Route::get('karyawan/print', [KaryawanController::class, 'printEmployees'])->name('karyawan.print');

        // Rute laporan
        Route::get('/laporan/barang', [DaftarBarangController::class, 'laporanBarang'])->name('laporan.barang');
        Route::get('/laporan/servis', [KategoriServisController::class, 'laporanServis'])->name('laporan.servis');
        Route::get('/laporan/karyawan', [KaryawanController::class, 'laporanKaryawan'])->name('laporan.karyawan');
        Route::get('/servismasuk/print', [ServisMasukController::class, 'printServis'])->name('servismasuk.print');
    });
});