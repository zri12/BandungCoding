<?php

namespace App\Domain\Portfolio\Services;

use App\Domain\Portfolio\Models\Portfolio;
use App\Domain\Portfolio\Repositories\PortfolioRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Service layer untuk domain Portfolio.
 */
class PortfolioService
{
    public function __construct(
        protected PortfolioRepositoryInterface $repository
    ) {}

    public function getAllPortfolios(): Collection
    {
        return $this->repository->getAll();
    }

    public function getPublishedPortfolios(): Collection
    {
        return $this->repository->getPublished();
    }

    public function getFeaturedPortfolios(int $limit = 6): Collection
    {
        return $this->repository->getFeatured($limit);
    }

    public function getPaginatedPortfolios(int $perPage = 9): LengthAwarePaginator
    {
        return $this->repository->getPaginated($perPage);
    }

    public function findBySlug(string $slug): ?Portfolio
    {
        return $this->repository->findBySlug($slug);
    }

    public function create(array $data): Portfolio
    {
        return $this->repository->create($data);
    }

    public function update(Portfolio $portfolio, array $data): Portfolio
    {
        return $this->repository->update($portfolio, $data);
    }

    public function delete(Portfolio $portfolio): bool
    {
        return $this->repository->delete($portfolio);
    }
}
