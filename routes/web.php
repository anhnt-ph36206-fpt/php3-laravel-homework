<?php

use App\Http\Controllers\SanPhamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/home', function () {
    return view('admin.home');
});

Route::get('/danh-sach-san-pham', [SanPhamController::class, 'index'])->name('danh-sach-san-pham.index');