<?php

namespace App\Application\Admin\Requests;

use App\Domain\Portfolio\Models\Portfolio;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PortfolioAdminRequest extends FormRequest
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
        /** @var Portfolio|null $portfolio */
        $portfolio = $this->route('portfolio');

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('portfolios', 'slug')->ignore($portfolio?->id),
            ],
            'excerpt' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'client' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'mobile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'gallery_image_1' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'gallery_image_2' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'gallery_image_3' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'gallery_image_4' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'gallery_image_5' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'category' => ['nullable', 'string', 'max:255'],
            'challenge' => ['nullable', 'string'],
            'challenge_en' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],
            'solution_en' => ['nullable', 'string'],
            'metric_1_value' => ['nullable', 'string', 'max:50'],
            'metric_1_label' => ['nullable', 'string', 'max:100'],
            'metric_2_value' => ['nullable', 'string', 'max:50'],
            'metric_2_label' => ['nullable', 'string', 'max:100'],
            'url' => ['nullable', 'string', 'max:255'],
            'published_at' => ['nullable', 'date'],
            'is_featured' => ['nullable', 'boolean'],
        ];
    }

    public function payload(): array
    {
        // Build result_metrics array
        $resultMetrics = [];
        
        if ($this->filled('metric_1_value') || $this->filled('metric_1_label')) {
            $resultMetrics['metric_1'] = [
                'value' => $this->filled('metric_1_value') ? trim((string) $this->input('metric_1_value')) : '',
                'label' => $this->filled('metric_1_label') ? trim((string) $this->input('metric_1_label')) : '',
            ];
        }
        
        if ($this->filled('metric_2_value') || $this->filled('metric_2_label')) {
            $resultMetrics['metric_2'] = [
                'value' => $this->filled('metric_2_value') ? trim((string) $this->input('metric_2_value')) : '',
                'label' => $this->filled('metric_2_label') ? trim((string) $this->input('metric_2_label')) : '',
            ];
        }

        return [
            'title' => trim((string) $this->input('title')),
            'slug' => Str::slug((string) $this->input('slug')),
            'excerpt' => $this->filled('excerpt') ? trim((string) $this->input('excerpt')) : null,
            'description' => $this->filled('description') ? (string) $this->input('description') : null,
            'client' => $this->filled('client') ? trim((string) $this->input('client')) : null,
            // 'image' & 'thumbnail' & other images intentionally excluded — handled by controller via file upload
            'category' => $this->filled('category') ? trim((string) $this->input('category')) : null,
            'challenge' => $this->filled('challenge') ? trim((string) $this->input('challenge')) : null,
            'challenge_en' => $this->filled('challenge_en') ? trim((string) $this->input('challenge_en')) : null,
            'solution' => $this->filled('solution') ? trim((string) $this->input('solution')) : null,
            'solution_en' => $this->filled('solution_en') ? trim((string) $this->input('solution_en')) : null,
            'result_metrics' => !empty($resultMetrics) ? $resultMetrics : null,
            'url' => $this->filled('url') ? trim((string) $this->input('url')) : null,
            'is_featured' => $this->boolean('is_featured'),
            'published_at' => $this->filled('published_at') ? $this->input('published_at') : null,
        ];
    }
}
