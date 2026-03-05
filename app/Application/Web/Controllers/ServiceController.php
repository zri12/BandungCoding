<?php

namespace App\Application\Web\Controllers;

use Illuminate\Routing\Controller;
use App\Domain\Service\Services\ServiceService;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Controller untuk halaman Layanan.
 * Menampilkan daftar layanan dan detail per layanan.
 */
class ServiceController extends Controller
{
    public function __construct(
        protected ServiceService $serviceService
    ) {}

    /**
     * Daftar semua layanan aktif.
     */
    public function index()
    {
        return view('pages.services.index', [
            'services'        => $this->serviceService->getActiveServices(),
            'metaTitle'       => 'Layanan Kami — BandungCoding',
            'metaDescription' => 'Layanan pengembangan software, website, dan aplikasi mobile profesional dari BandungCoding.',
        ]);
    }

    /**
     * Detail layanan berdasarkan slug.
     */
    public function show(string $slug)
    {
        $service = $this->serviceService->findBySlug($slug);

        if (!$service) {
            abort(404);
        }

        return view('pages.services.show', [
            'service'         => $service,
            'metaTitle'       => $service->title . ' — BandungCoding',
            'metaDescription' => $service->excerpt,
        ]);
    }

    /**
     * Download proposal layanan dalam format PDF.
     */
    public function downloadProposal(string $slug)
    {
        $service = $this->serviceService->findBySlug($slug);

        if (!$service) {
            abort(404);
        }

        $companyName = \App\Domain\Setting\Models\Setting::getValue('company_name', config('bandungcoding.company.name', 'BandungCoding'));
        
        $data = [
            'service' => $service,
            'companyName' => $companyName,
            'date' => now()->translatedFormat('d F Y'),
        ];

        $pdf = Pdf::loadView('pdf.service-proposal', $data)
            ->setPaper('a4', 'portrait');

        return $pdf->download($service->slug . '-proposal.pdf');
    }
}
