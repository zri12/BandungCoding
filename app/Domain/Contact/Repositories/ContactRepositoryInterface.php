<?php

namespace App\Domain\Contact\Repositories;

use App\Domain\Contact\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface untuk Repository Contact.
 */
interface ContactRepositoryInterface
{
    public function getAll(): Collection;

    public function getUnread(): Collection;

    public function getPaginated(int $perPage = 15): LengthAwarePaginator;

    public function find(int $id): ?Contact;

    public function create(array $data): Contact;

    public function markAsRead(Contact $contact): Contact;

    public function delete(Contact $contact): bool;
}
