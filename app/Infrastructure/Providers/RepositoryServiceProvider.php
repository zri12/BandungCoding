<?php

namespace App\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;

// Repository Interfaces
use App\Domain\Service\Repositories\ServiceRepositoryInterface;
use App\Domain\Portfolio\Repositories\PortfolioRepositoryInterface;
use App\Domain\Blog\Repositories\BlogRepositoryInterface;
use App\Domain\Contact\Repositories\ContactRepositoryInterface;

// Eloquent Implementations
use App\Infrastructure\Repositories\EloquentServiceRepository;
use App\Infrastructure\Repositories\EloquentPortfolioRepository;
use App\Infrastructure\Repositories\EloquentBlogRepository;
use App\Infrastructure\Repositories\EloquentContactRepository;

/**
 * Service Provider untuk binding Repository Interface → Implementation.
 * Inilah inti dari Dependency Injection — swap implementasi cukup di sini.
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Daftar binding interface → implementation.
     * Tambahkan repository baru di sini saat domain baru dibuat.
     */
    public array $bindings = [
        ServiceRepositoryInterface::class   => EloquentServiceRepository::class,
        PortfolioRepositoryInterface::class => EloquentPortfolioRepository::class,
        BlogRepositoryInterface::class      => EloquentBlogRepository::class,
        ContactRepositoryInterface::class   => EloquentContactRepository::class,
    ];

    public function register(): void
    {
        // Binding otomatis via $bindings property
    }

    public function boot(): void
    {
        //
    }
}
