<?php

namespace App\Application\Admin\Requests;

use App\Domain\Service\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $title = trim((string) $this->input('title', ''));
        $slug = trim((string) $this->input('slug', ''));

        $this->merge([
            'title' => $title,
            'slug' => $slug !== '' ? Str::slug($slug) : Str::slug($title),
        ]);
    }

    public function rules(): array
    {
        /** @var Service|null $service */
        $service = $this->route('service');

        return [
            'title' => ['required', 'string', 'max:255'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('services', 'slug')->ignore($service?->id),
            ],
            'excerpt' => ['nullable', 'string'],
            'excerpt_en' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'is_active' => ['nullable', 'boolean'],
        ];
    }

    public function payload(): array
    {
        return [
            'title' => trim((string) $this->input('title')),
            'title_en' => $this->filled('title_en') ? trim((string) $this->input('title_en')) : null,
            'slug' => Str::slug((string) $this->input('slug')),
            'excerpt' => $this->filled('excerpt') ? trim((string) $this->input('excerpt')) : null,
            'excerpt_en' => $this->filled('excerpt_en') ? trim((string) $this->input('excerpt_en')) : null,
            'description' => $this->filled('description') ? (string) $this->input('description') : null,
            'description_en' => $this->filled('description_en') ? (string) $this->input('description_en') : null,
            'icon' => $this->filled('icon') ? trim((string) $this->input('icon')) : null,
            'sort_order' => (int) ($this->input('sort_order') ?? 0),
            'is_active' => $this->boolean('is_active'),
            // 'image' intentionally excluded — handled by controller via file upload
        ];
    }
}
