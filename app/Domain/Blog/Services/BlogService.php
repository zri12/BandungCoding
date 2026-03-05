<?php

namespace App\Domain\Blog\Services;

use App\Domain\Blog\Models\Blog;
use App\Domain\Blog\Repositories\BlogRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Service layer untuk domain Blog.
 */
class BlogService
{
    public function __construct(
        protected BlogRepositoryInterface $repository
    ) {}

    public function getAllBlogs(): Collection
    {
        return $this->repository->getAll();
    }

    public function getPublishedBlogs(): Collection
    {
        return $this->repository->getPublished();
    }

    public function getLatestBlogs(int $limit = 3): Collection
    {
        return $this->repository->getLatestPublished($limit);
    }

    public function getPaginatedBlogs(int $perPage = 9): LengthAwarePaginator
    {
        return $this->repository->getPaginated($perPage);
    }

    public function findBySlug(string $slug): ?Blog
    {
        return $this->repository->findBySlug($slug);
    }

    public function getByCategory(string $category): Collection
    {
        return $this->repository->getByCategory($category);
    }

    public function create(array $data): Blog
    {
        return $this->repository->create($data);
    }

    public function update(Blog $blog, array $data): Blog
    {
        return $this->repository->update($blog, $data);
    }

    public function delete(Blog $blog): bool
    {
        return $this->repository->delete($blog);
    }
}
