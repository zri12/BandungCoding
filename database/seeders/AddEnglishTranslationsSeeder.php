<?php

namespace Database\Seeders;

use App\Domain\Service\Models\Service;
use App\Domain\Portfolio\Models\Portfolio;
use App\Domain\Blog\Models\Blog;
use Illuminate\Database\Seeder;

/**
 * Seeder untuk menambah versi English dari konten yang sudah ada.
 */
class AddEnglishTranslationsSeeder extends Seeder
{
    public function run(): void
    {
        // Update Services with English translations
        $serviceTranslations = [
            'web-development' => [
                'title_en' => 'Web Development',
                'excerpt_en' => 'Modern and responsive website development using latest technologies.',
                'description_en' => 'We develop websites with modern architecture, high performance, and responsive design. From company profiles, e-commerce, to complex web applications.',
            ],
            'mobile-app-development' => [
                'title_en' => 'Mobile App Development',
                'excerpt_en' => 'Native and cross-platform mobile applications for iOS and Android.',
                'description_en' => 'We build intuitive and high-performance mobile applications using Flutter, React Native, or native development.',
            ],
            'ui-ux-design' => [
                'title_en' => 'UI/UX Design',
                'excerpt_en' => 'User-friendly interface design and optimal user experience.',
                'description_en' => 'Our design team creates beautiful, intuitive interfaces that focus on delivering the best user experience.',
            ],
            'custom-software' => [
                'title_en' => 'Custom Software',
                'excerpt_en' => 'Custom software solutions tailored to your business needs.',
                'description_en' => 'We design and develop custom software that is tailored to your company\'s business processes and specific needs.',
            ],
            'it-consulting' => [
                'title_en' => 'IT Consulting',
                'excerpt_en' => 'Technology consulting for your digital transformation journey.',
                'description_en' => 'We help companies plan and implement the right technology strategy for business growth.',
            ],
            'devops-cloud' => [
                'title_en' => 'DevOps & Cloud',
                'excerpt_en' => 'Cloud infrastructure and deployment automation for scalability.',
                'description_en' => 'We provide DevOps services, CI/CD pipelines, and cloud infrastructure management to ensure your application is always available and scalable.',
            ],
        ];

        foreach ($serviceTranslations as $slug => $translations) {
            Service::where('slug', $slug)->update($translations);
        }

        // Update Portfolios with English translations
        $portfolioTranslations = [
            'e-commerce-platform' => [
                'title_en' => 'E-Commerce Platform',
                'excerpt_en' => 'Modern e-commerce platform with complete features for SMEs.',
                'description_en' => 'Building a full-featured e-commerce platform with payment gateway, inventory management, and analytics dashboard.',
            ],
            'mobile-banking-app' => [
                'title_en' => 'Mobile Banking App',
                'excerpt_en' => 'Mobile banking application with high security and intuitive UX.',
                'description_en' => 'Developing a mobile banking application with transfer features, payments, and real-time financial monitoring.',
            ],
            'company-dashboard' => [
                'title_en' => 'Company Dashboard',
                'excerpt_en' => 'Analytics dashboard for monitoring KPI and company performance.',
                'description_en' => 'Building a real-time dashboard with data visualization, automated reporting, and alert system.',
            ],
        ];

        foreach ($portfolioTranslations as $slug => $translations) {
            Portfolio::where('slug', $slug)->update($translations);
        }

        // Update Blogs with English translations
        $blogTranslations = [
            'mengapa-bisnis-butuh-website' => [
                'title_en' => 'Why Your Business Needs a Website in the Digital Era',
                'excerpt_en' => 'In the digital era, a website is not an option but a necessity. Learn why your business must be present online.',
                'content_en' => '<p>In today\'s digital era, having an online presence is a critical factor in business success. A website is a digital representation of your company that works 24/7.</p><p>Here are some reasons why a website is important for your business:</p><ul><li>Increase credibility and professionalism</li><li>Expand market reach</li><li>Make it easier for customers to find information</li><li>Improve operational efficiency</li></ul>',
                'meta_title_en' => 'Why Your Business Needs a Website | BandungCoding Blog',
                'meta_description_en' => 'Learn the importance of a website for your business in the digital era and how an online presence can accelerate your company\'s growth.',
            ],
            'tren-teknologi-2026' => [
                'title_en' => 'Technology Trends 2026: What You Need to Know',
                'excerpt_en' => 'Explore the latest technology trends that will shape the future of the digital industry.',
                'content_en' => '<p>2026 brings many changes in the world of technology. From generative AI to quantum computing, here are the trends you need to watch.</p>',
                'meta_title_en' => 'Technology Trends 2026 | BandungCoding Blog',
                'meta_description_en' => 'Discover the latest technology trends that will impact business and development in 2026.',
            ],
            'best-practices-mobile-development' => [
                'title_en' => 'Best Practices in Mobile App Development',
                'excerpt_en' => 'Tips and best practices in building quality and user-friendly mobile applications.',
                'content_en' => '<p>Building a successful mobile app requires much more than just coding. It requires careful planning, intuitive design, and optimal performance.</p>',
                'meta_title_en' => 'Mobile App Development Best Practices | BandungCoding Blog',
                'meta_description_en' => 'Learn best practices for developing high-quality mobile applications with great user experience.',
            ],
        ];

        foreach ($blogTranslations as $slug => $translations) {
            Blog::where('slug', $slug)->update($translations);
        }
    }
}
