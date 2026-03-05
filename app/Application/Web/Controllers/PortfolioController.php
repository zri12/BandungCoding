<?php

namespace App\Application\Web\Controllers;

use Illuminate\Routing\Controller;
use App\Domain\Portfolio\Services\PortfolioService;

/**
 * Controller untuk halaman Portfolio.
 * Mendukung pagination dan detail view.
 */
class PortfolioController extends Controller
{
    public function __construct(
        protected PortfolioService $portfolioService
    ) {}

    /**
     * Daftar portfolio dengan pagination.
     */
    public function index()
    {
        return view('pages.portfolio.index', [
            'portfolios'      => $this->portfolioService->getPaginatedPortfolios(9),
            'metaTitle'       => 'Portfolio — BandungCoding',
            'metaDescription' => 'Lihat berbagai proyek yang telah dikerjakan oleh tim BandungCoding.',
        ]);
    }

    /**
     * Detail portfolio berdasarkan slug.
     */
    public function show(string $slug)
    {
        $portfolio = $this->portfolioService->findBySlug($slug);

        if (!$portfolio) {
            abort(404);
        }

        return view('pages.portfolio.show', [
            'portfolio'       => $portfolio,
            'metaTitle'       => $portfolio->title . ' — Portfolio BandungCoding',
            'metaDescription' => $portfolio->excerpt,
        ]);
    }
}
