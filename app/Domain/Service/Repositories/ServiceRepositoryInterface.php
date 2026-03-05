<?php

namespace App\Domain\Service\Repositories;

use App\Domain\Service\Models\Service;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface untuk Repository Service.
 * Memungkinkan swap implementasi (Eloquent, API, Cache) tanpa ubah business logic.
 */
interface ServiceRepositoryInterface
{
    public function getAll(): Collection;

    public function getActive(): Collection;

    public function findBySlug(string $slug): ?Service;

    public function create(array $data): Service;

    public function update(Service $service, array $data): Service;

    public function delete(Service $service): bool;
}
