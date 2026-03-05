<?php

namespace Database\Seeders;

use App\Domain\Team\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teams = [
            [
                'name'      => 'Andi Pratama',
                'role'      => 'CEO & Founder',
                'initial'   => 'AP',
                'accent'    => 'from-blue-500 to-indigo-600',
                'bio'       => 'Praktisi berpengalaman dengan keahlian mendalam dalam software engineering dan strategi digital.',
                'email'     => 'andi@bandungcoding.com',
                'phone'     => '+62 812 3456 7890',
                'linkedin'  => 'https://linkedin.com/in/andipratama',
                'instagram' => 'https://instagram.com/andipratama',
                'tiktok'    => 'https://tiktok.com/@andipratama',
                'portfolio' => 'https://andipratama.dev',
                'order'     => 0,
                'is_active' => true,
            ],
            [
                'name'      => 'Siti Rahma',
                'role'      => 'Chief Technology Officer',
                'initial'   => 'SR',
                'accent'    => 'from-orange-500 to-red-600',
                'bio'       => 'Expert dalam arsitektur sistem dan pengembangan produk teknologi dengan pengalaman 10+ tahun.',
                'email'     => 'siti@bandungcoding.com',
                'phone'     => '+62 813 4567 8901',
                'linkedin'  => 'https://linkedin.com/in/sitirahma',
                'instagram' => 'https://instagram.com/sitirahma',
                'tiktok'    => 'https://tiktok.com/@sitirahma',
                'portfolio' => 'https://sitirahma.dev',
                'order'     => 1,
                'is_active' => true,
            ],
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }
    }
}
