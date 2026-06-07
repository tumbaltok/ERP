<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Rute untuk karyawan membuat pengajuan cuti
    Route::post('/pengajuan-cuti', [PengajuanCutiController::class, 'store']);
    // Rute untuk SPV/Manager melakukan approve atau reject (mengirim ID pengajuan)
    Route::put('/pengajuan-cuti/{id}/approve', [PengajuanCutiController::class, 'approve']);
});
