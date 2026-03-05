<?php

namespace App\Domain\Portfolio\Repositories;

use App\Domain\Portfolio\Models\Portfolio;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface untuk Repository Portfolio.
 */
interface PortfolioRepositoryInterface
{
    public function getAll(): Collection;

    public function getPublished(): Collection;

    public function getFeatured(int $limit = 6): Collection;

    public function getPaginated(int $perPage = 9): LengthAwarePaginator;

    public function findBySlug(string $slug): ?Portfolio;

    public function create(array $data): Portfolio;

    public function update(Portfolio $portfolio, array $data): Portfolio;

    public function delete(Portfolio $portfolio): bool;
}
