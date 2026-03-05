<?php

namespace App\Application\Admin\Controllers;

use App\Domain\Team\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class TeamAdminController extends Controller
{
    public function index()
    {
        return view('admin.teams.index', [
            'pageTitle' => 'Manajemen Tim',
            'pageSubtitle' => 'Kelola anggota tim BandungCoding.',
            'teams' => Team::ordered()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.teams.create', [
            'pageTitle' => 'Tambah Anggota Tim',
            'pageSubtitle' => 'Tambah anggota tim baru ke website.',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'initial' => ['required', 'string', 'max:10'],
            'accent' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'tiktok' => ['nullable', 'url', 'max:255'],
            'portfolio' => ['nullable', 'url', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('teams', 'public');
            $data['photo'] = $photoPath;
        }

        // Set default order if not provided
        if (!isset($data['order'])) {
            $data['order'] = Team::max('order') + 1;
        }

        Team::create($data);

        return redirect()
            ->route('admin.tim.index')
            ->with('success', 'Anggota tim berhasil ditambahkan.');
    }

    public function edit(Team $team)
    {
        return view('admin.teams.edit', [
            'pageTitle' => 'Edit Anggota Tim',
            'pageSubtitle' => 'Ubah data anggota tim yang sudah ada.',
            'team' => $team,
        ]);
    }

    public function update(Request $request, Team $team)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'initial' => ['required', 'string', 'max:10'],
            'accent' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'linkedin' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'tiktok' => ['nullable', 'url', 'max:255'],
            'portfolio' => ['nullable', 'url', 'max:255'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($team->photo && Storage::disk('public')->exists($team->photo)) {
                Storage::disk('public')->delete($team->photo);
            }
            
            $photoPath = $request->file('photo')->store('teams', 'public');
            $data['photo'] = $photoPath;
        }

        $team->update($data);

        return redirect()
            ->route('admin.tim.index')
            ->with('success', 'Anggota tim berhasil diperbarui.');
    }

    public function destroy(Team $team)
    {
        // Delete photo if exists
        if ($team->photo && Storage::disk('public')->exists($team->photo)) {
            Storage::disk('public')->delete($team->photo);
        }
        
        $team->delete();

        return redirect()
            ->route('admin.tim.index')
            ->with('success', 'Anggota tim berhasil dihapus.');
    }
}
