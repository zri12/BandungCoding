<?php

namespace App\Application\Web\Controllers;

use App\Domain\Team\Models\Team;
use Illuminate\Routing\Controller;

/**
 * Controller untuk halaman Tentang Kami.
 * Halaman statis — data bisa diambil dari Setting nanti.
 */
class AboutController extends Controller
{
    public function __invoke()
    {
        $team = Team::active()->ordered()->get();
        
        return view('pages.about', [
            'metaTitle'       => 'Tentang Kami — BandungCoding',
            'metaDescription' => 'Kenali lebih dekat BandungCoding, perusahaan IT profesional di Bandung dengan tim berpengalaman dan visi inovatif.',
            'team'            => $team,
        ]);
    }
}
