<?php

namespace App\Infrastructure\Repositories;

use App\Domain\Contact\Models\Contact;
use App\Domain\Contact\Repositories\ContactRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Implementasi Eloquent untuk ContactRepositoryInterface.
 */
class EloquentContactRepository implements ContactRepositoryInterface
{
    public function getAll(): Collection
    {
        return Contact::orderBy('created_at', 'desc')->get();
    }

    public function getUnread(): Collection
    {
        return Contact::unread()->orderBy('created_at', 'desc')->get();
    }

    public function getPaginated(int $perPage = 15): LengthAwarePaginator
    {
        return Contact::orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function find(int $id): ?Contact
    {
        return Contact::find($id);
    }

    public function create(array $data): Contact
    {
        return Contact::create($data);
    }

    public function markAsRead(Contact $contact): Contact
    {
        $contact->update(['is_read' => true]);
        return $contact->fresh();
    }

    public function delete(Contact $contact): bool
    {
        return $contact->delete();
    }
}
