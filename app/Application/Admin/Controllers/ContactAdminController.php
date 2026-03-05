<?php

namespace App\Application\Admin\Controllers;

use App\Domain\Contact\Models\Contact;
use App\Domain\Contact\Services\ContactService;
use Illuminate\Routing\Controller;

class ContactAdminController extends Controller
{
    public function __construct(
        protected ContactService $contactService
    ) {}

    public function index()
    {
        return view('admin.contacts.index', [
            'pageTitle' => 'Pesan Kontak',
            'pageSubtitle' => 'Lihat dan kelola semua pesan masuk dari pengunjung.',
            'contacts' => $this->contactService->getPaginatedContacts(15),
            'unreadCount' => $this->contactService->getUnreadContacts()->count(),
        ]);
    }

    public function show(Contact $contact)
    {
        if (! $contact->is_read) {
            $contact = $this->contactService->markAsRead($contact);
        }

        return view('admin.contacts.show', [
            'pageTitle' => 'Detail Pesan Kontak',
            'pageSubtitle' => 'Detail pesan yang dikirim oleh pengunjung website.',
            'contact' => $contact,
        ]);
    }

    public function markAsRead(Contact $contact)
    {
        if (! $contact->is_read) {
            $this->contactService->markAsRead($contact);
        }

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Pesan ditandai sudah dibaca.');
    }

    public function destroy(Contact $contact)
    {
        $this->contactService->delete($contact);

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
