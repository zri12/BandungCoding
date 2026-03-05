<?php

namespace App\Domain\Blog\Repositories;

use App\Domain\Blog\Models\Blog;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface untuk Repository Blog.
 */
interface BlogRepositoryInterface
{
    public function getAll(): Collection;

    public function getPublished(): Collection;

    public function getLatestPublished(int $limit = 3): Collection;

    public function getPaginated(int $perPage = 9): LengthAwarePaginator;

    public function findBySlug(string $slug): ?Blog;

    public function getByCategory(string $category): Collection;

    public function create(array $data): Blog;

    public function update(Blog $blog, array $data): Blog;

    public function delete(Blog $blog): bool;
}
