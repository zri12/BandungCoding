<?php

namespace Database\Seeders;

use App\Domain\Portfolio\Models\Portfolio;
use Illuminate\Database\Seeder;

class AddPortfolioImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $portfolios = [
            [
                'id' => 1,
                'title' => 'E-Commerce Platform',
                'image' => 'images/portfolio/ecommerce.svg',
            ],
            [
                'id' => 2,
                'title' => 'Mobile Banking App',
                'image' => 'images/portfolio/mobile-banking.svg',
            ],
            [
                'id' => 3,
                'title' => 'Company Dashboard',
                'image' => 'images/portfolio/dashboard.svg',
            ],
        ];

        foreach ($portfolios as $portfolio) {
            Portfolio::where('id', $portfolio['id'])
                ->update([
                    'image' => $portfolio['image'],
                ]);
        }

        $this->command->info('Portfolio images added successfully.');
    }
}
