<?php

namespace App\Domain\Contact\Services;

use App\Domain\Contact\Models\Contact;
use App\Domain\Contact\Repositories\ContactRepositoryInterface;
use App\Mail\ContactNotification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;

/**
 * Service layer untuk domain Contact.
 */
class ContactService
{
    /** Email yang menerima notifikasi pesan masuk */
    private const NOTIFY_EMAILS = [
        'fajrilukman194@gmail.com',
        'fahminashruddin2005@gmail.com',
    ];

    public function __construct(
        protected ContactRepositoryInterface $repository
    ) {}

    public function getAllContacts(): Collection
    {
        return $this->repository->getAll();
    }

    public function getUnreadContacts(): Collection
    {
        return $this->repository->getUnread();
    }

    public function getPaginatedContacts(int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->getPaginated($perPage);
    }

    /**
     * Simpan pesan kontak baru dari form dan kirim notifikasi email.
     */
    public function submitContactForm(array $data): Contact
    {
        $contact = $this->repository->create($data);

        try {
            Mail::to(self::NOTIFY_EMAILS)->send(new ContactNotification($contact));
        } catch (\Throwable $e) {
            // Gagal kirim email tidak mengganggu penyimpanan pesan
            \Log::error('[ContactService] Gagal kirim email notifikasi: ' . $e->getMessage());
        }

        return $contact;
    }

    public function markAsRead(Contact $contact): Contact
    {
        return $this->repository->markAsRead($contact);
    }

    public function delete(Contact $contact): bool
    {
        return $this->repository->delete($contact);
    }
}

