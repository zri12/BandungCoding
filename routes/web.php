<?php

/**
 * Route publik untuk website BandungCoding.
 * Clean routing — setiap domain punya controller terpisah.
 * Naming convention: dot notation (layanan.show, portfolio.index, dll.)
 */

use Illuminate\Support\Facades\Route;
use App\Application\Web\Controllers\HomeController;
use App\Application\Web\Controllers\AboutController;
use App\Application\Web\Controllers\ServiceController;
use App\Application\Web\Controllers\PortfolioController;
use App\Application\Web\Controllers\BlogController;
use App\Application\Web\Controllers\ContactController;

// ── Halaman Utama ───────────────────────────────────────
Route::get('/', HomeController::class)->name('home');

// ── Tentang Kami ────────────────────────────────────────
Route::get('/tentang-kami', AboutController::class)->name('about');

// ── Layanan ────────────────────────────────────────────
Route::prefix('layanan')->name('layanan.')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/{slug}', [ServiceController::class, 'show'])->name('show');
    Route::get('/{slug}/download-proposal', [ServiceController::class, 'downloadProposal'])->name('download-proposal');
});

// ── Portfolio ──────────────────────────────────────────
Route::prefix('portfolio')->name('portfolio.')->group(function () {
    Route::get('/', [PortfolioController::class, 'index'])->name('index');
    Route::get('/{slug}', [PortfolioController::class, 'show'])->name('show');
});

// ── Blog ───────────────────────────────────────────────
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});

// ── Kontak ─────────────────────────────────────────────
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

// ── Bahasa ─────────────────────────────────────────────
Route::get('/lang/{locale}', [\App\Http\Controllers\LocaleController::class, 'setLocale'])->name('locale.switch');
