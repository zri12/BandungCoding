<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Blog\Models\Blog;
use App\Domain\Blog\Repositories\BlogRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Implementasi Eloquent untuk BlogRepositoryInterface.
 */
class EloquentBlogRepository implements BlogRepositoryInterface
{
    public function getAll(): Collection
    {
        return Blog::orderBy('published_at', 'desc')->get();
    }

    public function getPublished(): Collection
    {
        return Blog::published()->orderBy('published_at', 'desc')->get();
    }

    public function getLatestPublished(int $limit = 3): Collection
    {
        return Blog::published()
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function getPaginated(int $perPage = 9): LengthAwarePaginator
    {
        return Blog::published()
            ->orderBy('published_at', 'desc')
            ->paginate($perPage);
    }

    public function findBySlug(string $slug): ?Blog
    {
        return Blog::where('slug', $slug)->first();
    }

    public function getByCategory(string $category): Collection
    {
        return Blog::published()
            ->byCategory($category)
            ->orderBy('published_at', 'desc')
            ->get();
    }

    public function create(array $data): Blog
    {
        return Blog::create($data);
    }

    public function update(Blog $blog, array $data): Blog
    {
        $blog->update($data);
        return $blog->fresh();
    }

    public function delete(Blog $blog): bool
    {
        return $blog->delete();
    }
}
