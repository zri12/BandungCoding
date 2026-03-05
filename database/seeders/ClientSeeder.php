<?php

namespace Database\Seeders;

use App\Domain\Client\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $clients = [
            [
                'name' => 'MD Element Foundation',
                'description' => 'Entertainment Foundation - Organisasi yang berdedikasi untuk pengembangan industri kreatif dan hiburan.',
                'logo' => null,
                'website' => 'https://mdelement.com',
                'email' => 'contact@mdelement.com',
                'phone' => '+62 812-xxxx-xxxx',
                'is_featured' => true,
            ],
            [
                'name' => 'Mojo Maru',
                'description' => 'Every Moment Matters - Inovasi teknologi dan solusi bisnis terpercaya untuk masa depan yang lebih baik.',
                'logo' => null,
                'website' => 'https://mojomaru.com',
                'email' => 'hello@mojomaru.com',
                'phone' => '+62 812-xxxx-xxxx',
                'is_featured' => true,
            ],
            [
                'name' => 'PUSLAT-SKPDN',
                'description' => 'Pusat Latihan dan Sosialisasi Kebijakan Pemerintah Dalam Negeri - Lembaga pendidikan dan pelatihan pemerintah terkemuka.',
                'logo' => null,
                'website' => 'https://puslat-skpdn.go.id',
                'email' => 'info@puslat-skpdn.go.id',
                'phone' => '+62 274-xxxx-xxxx',
                'is_featured' => true,
            ],
            [
                'name' => 'INASES',
                'description' => 'Indonesian Shoulder & Elbow Society - Organisasi profesional ortopedi dan traumatologi terkemuka di Indonesia.',
                'logo' => null,
                'website' => 'https://inases.org',
                'email' => 'contact@inases.org',
                'phone' => '+62 21-xxxx-xxxx',
                'is_featured' => true,
            ],
            [
                'name' => 'Wongso Rent Car',
                'description' => 'Layanan penyewaan mobil profesional dan terpercaya untuk kebutuhan perjalanan bisnis dan pribadi di seluruh Indonesia.',
                'logo' => null,
                'website' => 'https://wongsorentcar.com',
                'email' => 'booking@wongsorentcar.com',
                'phone' => '+62 812-xxxx-xxxx',
                'is_featured' => true,
            ],
            [
                'name' => 'DMG Kompresor',
                'description' => 'Penyedia solusi kompresor udara industri berkualitas tinggi dengan layanan purna jual dan teknisi terbaik.',
                'logo' => null,
                'website' => 'https://dmgkompresor.com',
                'email' => 'sales@dmgkompresor.com',
                'phone' => '+62 812-xxxx-xxxx',
                'is_featured' => true,
            ],
            [
                'name' => 'Gas Logistics',
                'description' => 'Solusi logistik dan distribusi gas industri dengan jaringan coverage nasional dan layanan pelanggan terdepan.',
                'logo' => null,
                'website' => 'https://gaslogistics.com',
                'email' => 'info@gaslogistics.com',
                'phone' => '+62 812-xxxx-xxxx',
                'is_featured' => true,
            ],
            [
                'name' => 'JSS',
                'description' => 'Jasa Sarana Solution - Penyedia solusi layanan komprehensif untuk kebutuhan bisnis modern dan berkelanjutan.',
                'logo' => null,
                'website' => 'https://jsssolution.com',
                'email' => 'contact@jsssolution.com',
                'phone' => '+62 812-xxxx-xxxx',
                'is_featured' => true,
            ],
            [
                'name' => 'Abadi Loster',
                'description' => 'Distributor terpercaya dengan jangkauan luas dan komitmen terhadap kepuasan pelanggan di seluruh wilayah Indonesia.',
                'logo' => null,
                'website' => 'https://abadiloster.com',
                'email' => 'info@abadiloster.com',
                'phone' => '+62 812-xxxx-xxxx',
                'is_featured' => true,
            ],
            [
                'name' => 'Bursa Tani',
                'description' => 'Platform pertanian modern yang menghubungkan petani dengan pasar global untuk hasil terbaik dan berkelanjutan.',
                'logo' => null,
                'website' => 'https://bursatani.com',
                'email' => 'info@bursatani.com',
                'phone' => '+62 812-xxxx-xxxx',
                'is_featured' => true,
            ],
        ];

        foreach ($clients as $client) {
            $client['slug'] = Str::slug($client['name']);
            
            Client::updateOrCreate(
                ['slug' => $client['slug']],
                $client
            );
        }
    }
}
