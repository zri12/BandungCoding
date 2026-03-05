<?php

namespace App\Application\Admin\Controllers;

use App\Application\Admin\Requests\ServiceAdminRequest;
use App\Domain\Service\Models\Service;
use App\Domain\Service\Services\ServiceService;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ServiceAdminController extends Controller
{
    public function __construct(
        protected ServiceService $serviceService
    ) {}

    public function index()
    {
        return view('admin.services.index', [
            'pageTitle' => 'Manajemen Layanan',
            'pageSubtitle' => 'Kelola layanan yang ditawarkan ke klien.',
            'services' => $this->serviceService->getAllServices(),
        ]);
    }

    public function create()
    {
        return view('admin.services.form', [
            'pageTitle' => 'Tambah Layanan',
            'pageSubtitle' => 'Tambah layanan baru ke website.',
            'service' => new Service(),
            'formAction' => route('admin.layanan.store'),
            'formMethod' => 'POST',
        ]);
    }

    public function store(ServiceAdminRequest $request)
    {
        $data = $request->payload();

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $data['image'] = $imagePath;
        }

        $this->serviceService->create($data);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', [
            'pageTitle' => 'Edit Layanan',
            'pageSubtitle' => 'Ubah data layanan yang sudah ada.',
            'service' => $service,
            'formAction' => route('admin.layanan.update', $service),
            'formMethod' => 'PUT',
        ]);
    }

    public function update(ServiceAdminRequest $request, Service $service)
    {
        $data = $request->payload();

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $imagePath = $request->file('image')->store('services', 'public');
            $data['image'] = $imagePath;
        }

        $this->serviceService->update($service, $data);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        $this->serviceService->delete($service);

        return redirect()
            ->route('admin.layanan.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}
