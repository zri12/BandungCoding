<?php

namespace App\Application\Admin\Controllers;

use App\Domain\Client\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ClientAdminController extends Controller
{
    public function index()
    {
        return view('admin.clients.index', [
            'pageTitle' => 'Manajemen Klien',
            'pageSubtitle' => 'Kelola daftar klien yang bekerja sama dengan BandungCoding.',
            'clients' => Client::latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.clients.create', [
            'pageTitle' => 'Tambah Klien',
            'pageSubtitle' => 'Tambah data klien baru.',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:clients'],
            'description' => ['nullable', 'string', 'max:1000'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'website' => ['nullable', 'url', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('clients', 'public');
            $data['logo'] = $logoPath;
        }

        Client::create($data);

        return redirect()
            ->route('admin.klien.index')
            ->with('success', 'Klien berhasil ditambahkan.');
    }

    public function edit(Client $client)
    {
        return view('admin.clients.edit', [
            'pageTitle' => 'Edit Klien',
            'pageSubtitle' => 'Ubah data klien yang sudah ada.',
            'client' => $client,
        ]);
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:clients,name,' . $client->id],
            'description' => ['nullable', 'string', 'max:1000'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'website' => ['nullable', 'url', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($client->logo && Storage::disk('public')->exists($client->logo)) {
                Storage::disk('public')->delete($client->logo);
            }
            
            $logoPath = $request->file('logo')->store('clients', 'public');
            $data['logo'] = $logoPath;
        }

        $client->update($data);

        return redirect()
            ->route('admin.klien.index')
            ->with('success', 'Klien berhasil diperbarui.');
    }

    public function destroy(Client $client)
    {
        // Delete logo if exists
        if ($client->logo && Storage::disk('public')->exists($client->logo)) {
            Storage::disk('public')->delete($client->logo);
        }
        
        $client->delete();

        return redirect()
            ->route('admin.klien.index')
            ->with('success', 'Klien berhasil dihapus.');
    }
}

