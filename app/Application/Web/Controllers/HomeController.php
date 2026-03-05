<?php

namespace App\Application\Web\Controllers;

use Illuminate\Routing\Controller;
use App\Domain\Service\Services\ServiceService;
use App\Domain\Portfolio\Services\PortfolioService;
use App\Domain\Blog\Services\BlogService;
use App\Domain\Client\Models\Client;

/**
 * Controller untuk halaman Home.
 * Mengambil data highlight dari berbagai domain untuk ditampilkan di landing page.
 */
class HomeController extends Controller
{
    public function __construct(
        protected ServiceService $serviceService,
        protected PortfolioService $portfolioService,
        protected BlogService $blogService,
    ) {}

    public function __invoke()
    {
        return view('pages.home', [
            'services'   => $this->serviceService->getActiveServices(),
            'portfolios' => $this->portfolioService->getFeaturedPortfolios(6),
            'blogs'      => $this->blogService->getLatestBlogs(3),
            'clients'    => Client::orderBy('name')->get(),
            'metaTitle'       => 'BandungCoding — Solusi IT Profesional',
            'metaDescription' => 'BandungCoding adalah perusahaan IT di Bandung yang menyediakan layanan pengembangan software, website, dan aplikasi mobile berkualitas tinggi.',
        ]);
    }
}
