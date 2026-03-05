<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Portfolio\Models\Portfolio;
use App\Domain\Portfolio\Repositories\PortfolioRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Implementasi Eloquent untuk PortfolioRepositoryInterface.
 */
class EloquentPortfolioRepository implements PortfolioRepositoryInterface
{
    public function getAll(): Collection
    {
        return Portfolio::orderBy('published_at', 'desc')->get();
    }

    public function getPublished(): Collection
    {
        return Portfolio::published()->orderBy('published_at', 'desc')->get();
    }

    public function getFeatured(int $limit = 6): Collection
    {
        return Portfolio::published()
            ->featured()
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function getPaginated(int $perPage = 9): LengthAwarePaginator
    {
        return Portfolio::published()
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Portfolio
    {
        return Portfolio::where('slug', $slug)->first();
    }

    public function create(array $data): Portfolio
    {
        return Portfolio::create($data);
    }

    public function update(Portfolio $portfolio, array $data): Portfolio
    {
        $portfolio->update($data);
        return $portfolio->fresh();
    }

    public function delete(Portfolio $portfolio): bool
    {
        return $portfolio->delete();
    }
}
