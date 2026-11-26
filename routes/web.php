<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AdminController;

Route::get('/', [PortfolioController::class, 'index']);
Route::post('/kontak', [PortfolioController::class, 'contact']);
Route::get('/admin', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate']);
Route::post('/admin/logout', [AdminController::class, 'logout']);
Route::get('/admin/register', [AdminController::class, 'register']);
Route::post('/admin/register', [AdminController::class, 'storeAdmin']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/skills', [AdminController::class, 'skills']);
Route::post('/admin/skills', [AdminController::class, 'storeSkill']);
Route::delete('/admin/skills/{skill}', [AdminController::class, 'deleteSkill']);
Route::get('/admin/messages', [AdminController::class, 'messages']);

Route::get('/halo', function () {
 return 'Halo dari Laravel!';
});

Route::get('/tentang', function () {
 return view('tentang');
});