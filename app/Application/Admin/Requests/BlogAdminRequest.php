<?php

namespace App\Application\Admin\Requests;

use App\Domain\Blog\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogAdminRequest extends FormRequest
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
        /** @var Blog|null $blog */
        $blog = $this->route('blog');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('blogs', 'slug')->ignore($blog?->id),
            ],
            'excerpt' => ['nullable', 'string'],
            'content' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'author' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'tags' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
            'published_at' => ['nullable', 'date'],
            'is_published' => ['nullable', 'boolean'],
        ];
    }

    public function payload(): array
    {
        $tags = collect(preg_split('/[,\r\n]+/', (string) $this->input('tags')))
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->values()
            ->all();

        $isPublished = $this->boolean('is_published');
        $publishedAt = $this->filled('published_at') ? $this->input('published_at') : null;

        if ($isPublished && $publishedAt === null) {
            $publishedAt = now();
        }

        return [
            'title' => trim((string) $this->input('title')),
            'slug' => Str::slug((string) $this->input('slug')),
            'excerpt' => $this->filled('excerpt') ? trim((string) $this->input('excerpt')) : null,
            'content' => $this->filled('content') ? (string) $this->input('content') : null,
            // 'image' intentionally excluded — handled by controller via file upload
            'author' => $this->filled('author') ? trim((string) $this->input('author')) : null,
            'category' => $this->filled('category') ? trim((string) $this->input('category')) : null,
            'tags' => count($tags) ? $tags : null,
            'meta_title' => $this->filled('meta_title') ? trim((string) $this->input('meta_title')) : null,
            'meta_description' => $this->filled('meta_description') ? trim((string) $this->input('meta_description')) : null,
            'is_published' => $isPublished,
            'published_at' => $publishedAt,
        ];
    }
}
