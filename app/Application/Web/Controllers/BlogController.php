<?php

namespace App\Application\Web\Controllers;

use Illuminate\Routing\Controller;
use App\Domain\Blog\Services\BlogService;

/**
 * Controller untuk halaman Blog.
 * Mendukung pagination, kategori filter, dan detail artikel.
 */
class BlogController extends Controller
{
    public function __construct(
        protected BlogService $blogService
    ) {}

    /**
     * Daftar blog dengan pagination.
     */
    public function index()
    {
        $publishedBlogs = $this->blogService->getPublishedBlogs();
        $categoryCounts = $publishedBlogs
            ->pluck('category')
            ->filter(fn($category) => filled($category))
            ->countBy()
            ->sortDesc();

        return view('pages.blog.index', [
            'blogs' => $this->blogService->getPaginatedBlogs(9),
            'recentBlogs' => $publishedBlogs->take(3),
            'categoryCounts' => $categoryCounts,
            'totalBlogs' => $publishedBlogs->count(),
            'totalCategories' => $categoryCounts->count(),
            'latestPublished' => $publishedBlogs->first()?->published_at,
            'metaTitle' => 'Blog - BandungCoding',
            'metaDescription' => 'Artikel dan insight seputar teknologi, pengembangan software, dan transformasi digital dari BandungCoding.',
        ]);
    }

    /**
     * Detail artikel blog berdasarkan slug.
     */
    public function show(string $slug)
    {
        $blog = $this->blogService->findBySlug($slug);

        if (!$blog) {
            abort(404);
        }

        return view('pages.blog.show', [
            'blog' => $blog,
            'metaTitle' => $blog->meta_title ?? $blog->title . ' - BandungCoding Blog',
            'metaDescription' => $blog->meta_description ?? $blog->excerpt,
        ]);
    }
}