<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftarMgController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\ReportController;

Route::get('/', [PendaftaranController::class, 'index']);
Route::post('/pendaftaran/simpan', [PendaftaranController::class, 'store']);

Route::get('/suket/public/admin/login', function () {
    return view('admin.login');
});

Route::post('/admin/login', function () {
    $username = request('username');
    $password = request('password');

    if ($username == 'admin' && $password == 'admin') {
        session(['admin_logged_in' => true]);
        return redirect('/suket/public/admin/dashboard');
    }

    return back()->with('error', 'Username atau Password salah!');
});

Route::middleware([\App\Http\Middleware\CheckAdmin::class])->group(function () {
    // Dashboard
    Route::get('/suket/public/admin/dashboard', [DashboardController::class, 'index']);
    Route::get('/suket/public/admin/api/stats', [DashboardController::class, 'getStatsApi']);

    // Pendaftar Management
    Route::get('/admin/data-pendaftar', [PendaftarMgController::class, 'index']);
    Route::get('/admin/data-pendaftar/json', [PendaftarMgController::class, 'json'])->name('pendaftar.json');
    Route::get('/admin/data-pendaftar/tambah', [PendaftarMgController::class, 'create']);
    Route::post('/admin/data-pendaftar/tambah', [PendaftarMgController::class, 'store']);
    Route::get('/admin/data-pendaftar/edit/{id}', [PendaftarMgController::class, 'edit']);
    Route::post('/admin/data-pendaftar/update/{id}', [PendaftarMgController::class, 'update']);
    Route::delete('/admin/data-pendaftar/delete/{id}', [PendaftarMgController::class, 'destroy']);

    // Surat Keterangan Management
    Route::get('/admin/data-surat', [SuratController::class, 'index']);
    Route::get('/admin/buat-surat', [SuratController::class, 'redirectToCreate']);
    Route::get('/admin/buat-surat/tambah', [SuratController::class, 'create']);
    Route::post('/admin/buat-surat/tambah', [SuratController::class, 'store']);
    Route::get('/admin/buat-surat/edit/{id}', [SuratController::class, 'edit']);
    Route::post('/admin/buat-surat/update/{id}', [SuratController::class, 'update']);
    Route::delete('/admin/buat-surat/delete/{id}', [SuratController::class, 'destroy']);
    Route::get('/admin/buat-surat/cetak/{id}', [SuratController::class, 'cetak']);
    Route::get('/admin/buat-surat/rtf/{id}', [SuratController::class, 'downloadRTF']);

    // Dokter Management
    Route::get('/admin/data-dokter', [DokterController::class, 'index']);
    Route::get('/admin/data-dokter/tambah', [DokterController::class, 'create']);
    Route::post('/admin/data-dokter/tambah', [DokterController::class, 'store']);
    Route::get('/admin/data-dokter/edit/{id}', [DokterController::class, 'edit']);
    Route::post('/admin/data-dokter/update/{id}', [DokterController::class, 'update']);
    Route::delete('/admin/data-dokter/delete/{id}', [DokterController::class, 'destroy']);

    // Price Management
    Route::get('/admin/manajemen-harga', [PriceController::class, 'index']);
    Route::post('/admin/manajemen-harga/update', [PriceController::class, 'update']);

    // Reports
    Route::get('/admin/laporan', [ReportController::class, 'index']);
    Route::get('/admin/laporan/{type}', [ReportController::class, 'detail']);
    Route::get('/admin/laporan/{type}/print', [ReportController::class, 'print']);
    Route::get('/admin/laporan/{type}/export', [ReportController::class, 'export']);

    // Logout
    Route::get('/admin/logout', function () {
        session()->forget('admin_logged_in');
        return redirect('/admin/login');
    });
});