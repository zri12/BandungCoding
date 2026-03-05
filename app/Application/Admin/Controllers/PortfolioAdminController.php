<?php

namespace App\Application\Admin\Controllers;

use App\Application\Admin\Requests\PortfolioAdminRequest;
use App\Domain\Portfolio\Models\Portfolio;
use App\Domain\Portfolio\Services\PortfolioService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class PortfolioAdminController extends Controller
{
    public function __construct(
        protected PortfolioService $portfolioService
    ) {}

    public function index()
    {
        $portfolios = $this->portfolioService
            ->getAllPortfolios()
            ->sortByDesc(fn (Portfolio $portfolio) => $portfolio->published_at ?? $portfolio->created_at)
            ->values();

        return view('admin.portfolio.index', [
            'pageTitle' => 'Manajemen Portfolio',
            'pageSubtitle' => 'Kelola semua portfolio dan karya terbaik.',
            'portfolios' => $portfolios,
        ]);
    }

    public function create()
    {
        return view('admin.portfolio.form', [
            'pageTitle' => 'Tambah Portfolio',
            'pageSubtitle' => 'Tambah portfolio baru ke website.',
            'portfolio' => new Portfolio(),
            'formAction' => route('admin.portfolio.store'),
            'formMethod' => 'POST',
        ]);
    }

    public function store(PortfolioAdminRequest $request)
    {
        $data = $request->payload();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
            $data['image'] = $imagePath;
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('portfolios', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        // Handle mobile image upload
        if ($request->hasFile('mobile_image')) {
            $mobileImagePath = $request->file('mobile_image')->store('portfolios', 'public');
            $data['mobile_image'] = $mobileImagePath;
        }

        // Handle gallery images upload
        for ($i = 1; $i <= 5; $i++) {
            $fieldName = "gallery_image_{$i}";
            if ($request->hasFile($fieldName)) {
                $galleryPath = $request->file($fieldName)->store('portfolios', 'public');
                $data[$fieldName] = $galleryPath;
            }
        }

        $this->portfolioService->create($data);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil ditambahkan.');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.form', [
            'pageTitle' => 'Edit Portfolio',
            'pageSubtitle' => 'Ubah data portfolio yang sudah ada.',
            'portfolio' => $portfolio,
            'formAction' => route('admin.portfolio.update', $portfolio),
            'formMethod' => 'PUT',
        ]);
    }

    public function update(PortfolioAdminRequest $request, Portfolio $portfolio)
    {
        $data = $request->payload();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
                Storage::disk('public')->delete($portfolio->image);
            }

            $imagePath = $request->file('image')->store('portfolios', 'public');
            $data['image'] = $imagePath;
        }

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($portfolio->thumbnail && Storage::disk('public')->exists($portfolio->thumbnail)) {
                Storage::disk('public')->delete($portfolio->thumbnail);
            }

            $thumbnailPath = $request->file('thumbnail')->store('portfolios', 'public');
            $data['thumbnail'] = $thumbnailPath;
        }

        // Handle mobile image upload
        if ($request->hasFile('mobile_image')) {
            // Delete old mobile image if exists
            if ($portfolio->mobile_image && Storage::disk('public')->exists($portfolio->mobile_image)) {
                Storage::disk('public')->delete($portfolio->mobile_image);
            }

            $mobileImagePath = $request->file('mobile_image')->store('portfolios', 'public');
            $data['mobile_image'] = $mobileImagePath;
        }

        // Handle gallery images upload
        for ($i = 1; $i <= 5; $i++) {
            $fieldName = "gallery_image_{$i}";
            if ($request->hasFile($fieldName)) {
                // Delete old gallery image if exists
                $oldImage = $portfolio->{$fieldName};
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }

                $galleryPath = $request->file($fieldName)->store('portfolios', 'public');
                $data[$fieldName] = $galleryPath;
            }
        }

        $this->portfolioService->update($portfolio, $data);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil diperbarui.');
    }

    public function destroy(Portfolio $portfolio)
    {
        // Delete image if exists
        if ($portfolio->image && Storage::disk('public')->exists($portfolio->image)) {
            Storage::disk('public')->delete($portfolio->image);
        }

        // Delete thumbnail if exists
        if ($portfolio->thumbnail && Storage::disk('public')->exists($portfolio->thumbnail)) {
            Storage::disk('public')->delete($portfolio->thumbnail);
        }

        // Delete mobile image if exists
        if ($portfolio->mobile_image && Storage::disk('public')->exists($portfolio->mobile_image)) {
            Storage::disk('public')->delete($portfolio->mobile_image);
        }

        // Delete gallery images if exist
        for ($i = 1; $i <= 5; $i++) {
            $fieldName = "gallery_image_{$i}";
            $image = $portfolio->{$fieldName};
            if ($image && Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        }

        $this->portfolioService->delete($portfolio);

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio berhasil dihapus.');
    }
}
