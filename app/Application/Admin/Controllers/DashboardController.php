<?php

namespace App\Application\Admin\Controllers;

use App\Domain\Blog\Services\BlogService;
use App\Domain\Contact\Services\ContactService;
use App\Domain\Portfolio\Services\PortfolioService;
use App\Domain\Service\Services\ServiceService;
use App\Domain\Setting\Services\SettingService;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function __construct(
        protected ServiceService $serviceService,
        protected PortfolioService $portfolioService,
        protected BlogService $blogService,
        protected ContactService $contactService,
        protected SettingService $settingService,
    ) {}

    public function __invoke()
    {
        $services = $this->serviceService->getAllServices();
        $portfolios = $this->portfolioService->getAllPortfolios();
        $blogs = $this->blogService->getAllBlogs();
        $unreadContacts = $this->contactService->getUnreadContacts();

        return view('admin.dashboard', [
            'pageTitle' => 'Dashboard Admin',
            'pageSubtitle' => 'Kelola semua konten website dari satu tempat.',
            'stats' => [
                'services_total' => $services->count(),
                'services_active' => $services->where('is_active', true)->count(),
                'portfolios_total' => $portfolios->count(),
                'portfolios_featured' => $portfolios->where('is_featured', true)->count(),
                'blogs_total' => $blogs->count(),
                'blogs_published' => $blogs->where('is_published', true)->count(),
                'contacts_unread' => $unreadContacts->count(),
            ],
            'recentBlogs' => $blogs->take(5),
            'recentPortfolios' => $portfolios->take(5),
            'recentContacts' => $this->contactService->getPaginatedContacts(5),
            'companyName' => $this->settingService->get('company_name', 'BandungCoding'),
        ]);
    }
}
