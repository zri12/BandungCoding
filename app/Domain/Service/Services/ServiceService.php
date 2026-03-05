<?php

namespace App\Domain\Service\Services;

use App\Domain\Service\Models\Service;
use App\Domain\Service\Repositories\ServiceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service layer untuk domain Layanan.
 * Mengandung business logic, menjaga controller tetap tipis.
 */
class ServiceService
{
    public function __construct(
        protected ServiceRepositoryInterface $repository
    ) {}

    /**
     * Ambil semua layanan aktif, terurut.
     */
    public function getActiveServices(): Collection
    {
        return $this->repository->getActive();
    }

    /**
     * Ambil semua layanan (termasuk nonaktif) — untuk admin.
     */
    public function getAllServices(): Collection
    {
        return $this->repository->getAll();
    }

    /**
     * Cari layanan berdasarkan slug.
     */
    public function findBySlug(string $slug): ?Service
    {
        return $this->repository->findBySlug($slug);
    }

    /**
     * Buat layanan baru.
     */
    public function create(array $data): Service
    {
        return $this->repository->create($data);
    }

    /**
     * Update layanan.
     */
    public function update(Service $service, array $data): Service
    {
        return $this->repository->update($service, $data);
    }

    /**
     * Hapus layanan.
     */
    public function delete(Service $service): bool
    {
        return $this->repository->delete($service);
    }
}
