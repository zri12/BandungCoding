<?php

use App\Application\Admin\Controllers\AdminLoginController;
use App\Application\Admin\Controllers\BlogAdminController;
use App\Application\Admin\Controllers\ClientAdminController;
use App\Application\Admin\Controllers\ContactAdminController;
use App\Application\Admin\Controllers\DashboardController;
use App\Application\Admin\Controllers\PortfolioAdminController;
use App\Application\Admin\Controllers\ServiceAdminController;
use App\Application\Admin\Controllers\SettingAdminController;
use App\Application\Admin\Controllers\TeamAdminController;
use Illuminate\Support\Facades\Route;

// ── Auth (tidak perlu login) ────────────────────────────
Route::get('/login', [AdminLoginController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('login.post');
Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

// ── Protected Routes ────────────────────────────────────
Route::middleware('admin.auth')->group(function () {

Route::get('/', DashboardController::class)->name('dashboard');

Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/', [ServiceAdminController::class, 'index'])->name('index');
    Route::get('/create', [ServiceAdminController::class, 'create'])->name('create');
    Route::post('/', [ServiceAdminController::class, 'store'])->name('store');
    Route::get('/{service:slug}/edit', [ServiceAdminController::class, 'edit'])->name('edit');
    Route::put('/{service:slug}', [ServiceAdminController::class, 'update'])->name('update');
    Route::delete('/{service:slug}', [ServiceAdminController::class, 'destroy'])->name('destroy');
});

Route::prefix('portfolio')->name('portfolio.')->group(function () {
    Route::get('/', [PortfolioAdminController::class, 'index'])->name('index');
    Route::get('/create', [PortfolioAdminController::class, 'create'])->name('create');
    Route::post('/', [PortfolioAdminController::class, 'store'])->name('store');
    Route::get('/{portfolio:slug}/edit', [PortfolioAdminController::class, 'edit'])->name('edit');
    Route::put('/{portfolio:slug}', [PortfolioAdminController::class, 'update'])->name('update');
    Route::delete('/{portfolio:slug}', [PortfolioAdminController::class, 'destroy'])->name('destroy');
});

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogAdminController::class, 'index'])->name('index');
    Route::get('/create', [BlogAdminController::class, 'create'])->name('create');
    Route::post('/', [BlogAdminController::class, 'store'])->name('store');
    Route::get('/{blog:slug}/edit', [BlogAdminController::class, 'edit'])->name('edit');
    Route::put('/{blog:slug}', [BlogAdminController::class, 'update'])->name('update');
    Route::delete('/{blog:slug}', [BlogAdminController::class, 'destroy'])->name('destroy');
});

Route::prefix('klien')->name('klien.')->group(function () {
    Route::get('/', [ClientAdminController::class, 'index'])->name('index');
    Route::get('/create', [ClientAdminController::class, 'create'])->name('create');
    Route::post('/', [ClientAdminController::class, 'store'])->name('store');
    Route::get('/{client:slug}/edit', [ClientAdminController::class, 'edit'])->name('edit');
    Route::put('/{client:slug}', [ClientAdminController::class, 'update'])->name('update');
    Route::delete('/{client:slug}', [ClientAdminController::class, 'destroy'])->name('destroy');
});

Route::prefix('tim')->name('tim.')->group(function () {
    Route::get('/', [TeamAdminController::class, 'index'])->name('index');
    Route::get('/create', [TeamAdminController::class, 'create'])->name('create');
    Route::post('/', [TeamAdminController::class, 'store'])->name('store');
    Route::get('/{team}/edit', [TeamAdminController::class, 'edit'])->name('edit');
    Route::put('/{team}', [TeamAdminController::class, 'update'])->name('update');
    Route::delete('/{team}', [TeamAdminController::class, 'destroy'])->name('destroy');
});

Route::prefix('kontak')->name('kontak.')->group(function () {
    Route::get('/', [ContactAdminController::class, 'index'])->name('index');
    Route::get('/{contact}', [ContactAdminController::class, 'show'])->name('show');
    Route::patch('/{contact}/read', [ContactAdminController::class, 'markAsRead'])->name('read');
    Route::delete('/{contact}', [ContactAdminController::class, 'destroy'])->name('destroy');
});

Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
    Route::get('/', [SettingAdminController::class, 'index'])->name('index');
    Route::put('/', [SettingAdminController::class, 'update'])->name('update');
});

}); // end middleware admin.auth
