<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Service\Models\Service;
use App\Domain\Service\Repositories\ServiceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Implementasi Eloquent untuk ServiceRepositoryInterface.
 * Bisa diganti dengan implementasi lain (API, Cache) tanpa ubah business logic.
 */
class EloquentServiceRepository implements ServiceRepositoryInterface
{
    public function getAll(): Collection
    {
        return Service::ordered()->get();
    }

    public function getActive(): Collection
    {
        return Service::active()->ordered()->get();
    }

    public function findBySlug(string $slug): ?Service
    {
        return Service::where('slug', $slug)->first();
    }

    public function create(array $data): Service
    {
        return Service::create($data);
    }

    public function update(Service $service, array $data): Service
    {
        $service->update($data);
        return $service->fresh();
    }

    public function delete(Service $service): bool
    {
        return $service->delete();
    }
}
