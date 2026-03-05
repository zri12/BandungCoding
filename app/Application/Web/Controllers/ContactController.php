<?php

namespace App\Application\Web\Controllers;

use Illuminate\Routing\Controller;
use App\Application\Web\Requests\ContactFormRequest;
use App\Domain\Contact\Services\ContactService;

/**
 * Controller untuk halaman Kontak.
 * Menampilkan form dan memproses pengiriman pesan.
 */
class ContactController extends Controller
{
    public function __construct(
        protected ContactService $contactService
    ) {}

    /**
     * Tampilkan halaman kontak.
     */
    public function index()
    {
        return view('pages.contact', [
            'metaTitle'       => 'Hubungi Kami — BandungCoding',
            'metaDescription' => 'Hubungi BandungCoding untuk konsultasi proyek IT, pengembangan software, atau kerjasama bisnis.',
        ]);
    }

    /**
     * Proses pengiriman form kontak.
     * Validasi ditangani oleh ContactFormRequest (terpisah).
     */
    public function store(ContactFormRequest $request)
    {
        $this->contactService->submitContactForm($request->validated());

        return redirect()
            ->route('contact')
            ->with('success', __('messages.contact.submit_success'));
    }
}
