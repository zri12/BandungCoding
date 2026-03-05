<?php

namespace App\Application\Admin\Controllers;

use App\Application\Admin\Requests\BlogAdminRequest;
use App\Domain\Blog\Models\Blog;
use App\Domain\Blog\Services\BlogService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class BlogAdminController extends Controller
{
    public function __construct(
        protected BlogService $blogService
    ) {}

    public function index()
    {
        $blogs = $this->blogService
            ->getAllBlogs()
            ->sortByDesc(fn (Blog $blog) => $blog->published_at ?? $blog->created_at)
            ->values();

        return view('admin.blog.index', [
            'pageTitle' => 'Manajemen Blog',
            'pageSubtitle' => 'Kelola semua artikel blog website.',
            'blogs' => $blogs,
        ]);
    }

    public function create()
    {
        return view('admin.blog.form', [
            'pageTitle' => 'Tambah Artikel Blog',
            'pageSubtitle' => 'Tambah artikel blog baru ke website.',
            'blog' => new Blog(),
            'formAction' => route('admin.blog.store'),
            'formMethod' => 'POST',
        ]);
    }

    public function store(BlogAdminRequest $request)
    {
        $data = $request->payload();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
            $data['image'] = $imagePath;
        }

        $this->blogService->create($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel blog berhasil ditambahkan.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blog.form', [
            'pageTitle' => 'Edit Artikel Blog',
            'pageSubtitle' => 'Ubah artikel blog yang sudah ada.',
            'blog' => $blog,
            'formAction' => route('admin.blog.update', $blog),
            'formMethod' => 'PUT',
        ]);
    }

    public function update(BlogAdminRequest $request, Blog $blog)
    {
        $data = $request->payload();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }

            $imagePath = $request->file('image')->store('blogs', 'public');
            $data['image'] = $imagePath;
        }

        $this->blogService->update($blog, $data);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel blog berhasil diperbarui.');
    }

    public function destroy(Blog $blog)
    {
        // Delete image if exists
        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $this->blogService->delete($blog);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel blog berhasil dihapus.');
    }
}
