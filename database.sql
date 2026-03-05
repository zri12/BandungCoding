-- ============================================================
-- BandungCoding - MySQL Database Export
-- Exported from SQLite on: 2026-03-03
-- Database: fazriluk_bandungcoding
-- ============================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- ============================================================
-- Table: migrations
-- ============================================================
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) NOT NULL,
  `batch` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,  '0001_01_01_000000_create_users_table', 1),
(2,  '0001_01_01_000001_create_cache_table', 1),
(3,  '0001_01_01_000002_create_jobs_table', 1),
(4,  '2026_02_28_000001_create_services_table', 1),
(5,  '2026_02_28_000002_create_portfolios_table', 1),
(6,  '2026_02_28_000003_create_blogs_table', 1),
(7,  '2026_02_28_000004_create_contacts_table', 1),
(8,  '2026_02_28_000005_create_settings_table', 1),
(9,  '2026_03_01_000001_create_clients_table', 1),
(10, '2026_03_01_000002_add_english_columns_to_content_tables', 2),
(11, '2026_03_01_000003_add_mobile_and_gallery_images_to_portfolios_table', 3),
(12, '2026_03_01_000004_add_challenge_solution_result_to_portfolios_table', 4),
(13, '2026_03_01_000005_add_english_challenge_solution_to_portfolios_table', 5),
(14, '2026_03_02_000001_create_teams_table', 6),
(15, '2026_03_01_174339_add_social_media_to_teams_table', 7),
(16, '2026_03_01_175142_add_portfolio_to_teams_table', 8);

-- ============================================================
-- Table: users
-- ============================================================
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `email_verified_at` TIMESTAMP NULL DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: password_reset_tokens
-- ============================================================
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` VARCHAR(255) NOT NULL,
  `token` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: sessions
-- ============================================================
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` VARCHAR(255) NOT NULL,
  `user_id` BIGINT UNSIGNED NULL DEFAULT NULL,
  `ip_address` VARCHAR(45) NULL DEFAULT NULL,
  `user_agent` TEXT NULL DEFAULT NULL,
  `payload` LONGTEXT NOT NULL,
  `last_activity` INT NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: cache
-- ============================================================
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` VARCHAR(255) NOT NULL,
  `value` MEDIUMTEXT NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: cache_locks
-- ============================================================
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` VARCHAR(255) NOT NULL,
  `owner` VARCHAR(255) NOT NULL,
  `expiration` INT NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: jobs
-- ============================================================
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` VARCHAR(255) NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `attempts` TINYINT UNSIGNED NOT NULL,
  `reserved_at` INT UNSIGNED NULL DEFAULT NULL,
  `available_at` INT UNSIGNED NOT NULL,
  `created_at` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: job_batches
-- ============================================================
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `total_jobs` INT NOT NULL,
  `pending_jobs` INT NOT NULL,
  `failed_jobs` INT NOT NULL,
  `failed_job_ids` LONGTEXT NOT NULL,
  `options` MEDIUMTEXT NULL DEFAULT NULL,
  `cancelled_at` INT NULL DEFAULT NULL,
  `created_at` INT NOT NULL,
  `finished_at` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: failed_jobs
-- ============================================================
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` VARCHAR(255) NOT NULL,
  `connection` TEXT NOT NULL,
  `queue` TEXT NOT NULL,
  `payload` LONGTEXT NOT NULL,
  `exception` LONGTEXT NOT NULL,
  `failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: services
-- ============================================================
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `excerpt` TEXT NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `icon` VARCHAR(255) NULL DEFAULT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `sort_order` INT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `title_en` VARCHAR(255) NULL DEFAULT NULL,
  `excerpt_en` TEXT NULL DEFAULT NULL,
  `description_en` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`),
  KEY `services_is_active_sort_order_index` (`is_active`, `sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `services` (`id`, `title`, `slug`, `excerpt`, `description`, `icon`, `image`, `is_active`, `sort_order`, `created_at`, `updated_at`, `title_en`, `excerpt_en`, `description_en`) VALUES
(1, 'Web Development', 'web-development', 'Pengembangan website modern dan responsif menggunakan teknologi terkini.', 'Kami mengembangkan website dengan arsitektur modern, performa tinggi, dan desain yang responsif. Mulai dari company profile, e-commerce, hingga web application kompleks.', 'globe', NULL, 1, 1, '2026-03-01 11:38:07', '2026-03-01 12:14:20', 'Web Development', 'Modern and responsive website development using latest technologies.', 'We develop websites with modern architecture, high performance, and responsive design. From company profiles, e-commerce, to complex web applications.'),
(2, 'Mobile App Development', 'mobile-app-development', 'Aplikasi mobile native dan cross-platform untuk iOS dan Android.', 'Kami membangun aplikasi mobile yang intuitif dan performa tinggi menggunakan Flutter, React Native, atau native development.', 'device-mobile', NULL, 1, 2, '2026-03-01 11:38:07', '2026-03-01 12:14:20', 'Mobile App Development', 'Native and cross-platform mobile applications for iOS and Android.', 'We build intuitive and high-performance mobile applications using Flutter, React Native, or native development.'),
(3, 'UI/UX Design', 'ui-ux-design', 'Desain antarmuka yang user-friendly dan pengalaman pengguna yang optimal.', 'Tim desainer kami menciptakan antarmuka yang indah, intuitif, dan berfokus pada pengalaman pengguna terbaik.', 'palette', NULL, 1, 3, '2026-03-01 11:38:07', '2026-03-01 12:14:20', 'UI/UX Design', 'User-friendly interface design and optimal user experience.', 'Our design team creates beautiful, intuitive interfaces that focus on delivering the best user experience.'),
(4, 'Custom Software', 'custom-software', 'Solusi software kustom sesuai kebutuhan bisnis Anda.', 'Kami merancang dan mengembangkan software kustom yang disesuaikan dengan proses bisnis dan kebutuhan spesifik perusahaan Anda.', 'code', NULL, 1, 4, '2026-03-01 11:38:07', '2026-03-01 12:14:20', 'Custom Software', 'Custom software solutions tailored to your business needs.', 'We design and develop custom software that is tailored to your company\'s business processes and specific needs.'),
(5, 'IT Consulting', 'it-consulting', 'Konsultasi teknologi untuk transformasi digital bisnis Anda.', 'Kami membantu perusahaan dalam merencanakan dan mengimplementasikan strategi teknologi yang tepat untuk pertumbuhan bisnis.', 'light-bulb', NULL, 1, 5, '2026-03-01 11:38:07', '2026-03-01 12:14:20', 'IT Consulting', 'Technology consulting for your digital transformation journey.', 'We help companies plan and implement the right technology strategy for business growth.'),
(6, 'DevOps & Cloud', 'devops-cloud', 'Infrastruktur cloud dan otomasi deployment untuk skalabilitas.', 'Kami menyediakan layanan DevOps, CI/CD pipeline, dan manajemen infrastruktur cloud untuk memastikan aplikasi Anda selalu tersedia dan scalable.', 'cloud', NULL, 1, 6, '2026-03-01 11:38:07', '2026-03-01 12:14:20', 'DevOps & Cloud', 'Cloud infrastructure and deployment automation for scalability.', 'We provide DevOps services, CI/CD pipelines, and cloud infrastructure management to ensure your application is always available and scalable.');

-- ============================================================
-- Table: portfolios
-- ============================================================
DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE `portfolios` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `excerpt` TEXT NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `client` VARCHAR(255) NULL DEFAULT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `thumbnail` VARCHAR(255) NULL DEFAULT NULL,
  `category` VARCHAR(255) NULL DEFAULT NULL,
  `tech_stack` TEXT NULL DEFAULT NULL,
  `url` VARCHAR(255) NULL DEFAULT NULL,
  `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
  `published_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `title_en` VARCHAR(255) NULL DEFAULT NULL,
  `excerpt_en` TEXT NULL DEFAULT NULL,
  `description_en` TEXT NULL DEFAULT NULL,
  `mobile_image` VARCHAR(255) NULL DEFAULT NULL,
  `gallery_image_1` VARCHAR(255) NULL DEFAULT NULL,
  `gallery_image_2` VARCHAR(255) NULL DEFAULT NULL,
  `gallery_image_3` VARCHAR(255) NULL DEFAULT NULL,
  `gallery_image_4` VARCHAR(255) NULL DEFAULT NULL,
  `gallery_image_5` VARCHAR(255) NULL DEFAULT NULL,
  `challenge` TEXT NULL DEFAULT NULL,
  `solution` TEXT NULL DEFAULT NULL,
  `result_metrics` TEXT NULL DEFAULT NULL,
  `challenge_en` TEXT NULL DEFAULT NULL,
  `solution_en` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolios_slug_unique` (`slug`),
  KEY `portfolios_is_featured_published_at_index` (`is_featured`, `published_at`),
  KEY `portfolios_category_index` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `portfolios` (`id`, `title`, `slug`, `excerpt`, `description`, `client`, `image`, `thumbnail`, `category`, `tech_stack`, `url`, `is_featured`, `published_at`, `created_at`, `updated_at`, `title_en`, `excerpt_en`, `description_en`, `mobile_image`, `gallery_image_1`, `gallery_image_2`, `gallery_image_3`, `gallery_image_4`, `gallery_image_5`, `challenge`, `solution`, `result_metrics`, `challenge_en`, `solution_en`) VALUES
(1, 'E-Commerce Platform', 'e-commerce-platform', 'Modern e-commerce platform with complete features for SMEs.', 'Building a full-featured e-commerce platform with payment gateway, inventory management, and analytics dashboard.', 'PT Maju Jaya', 'images/portfolio/ecommerce.svg', 'portfolios/0TDy9sjrknYYcbDIJvPPDRfWlrYtjQIxTOYa6SJ9.jpg', 'Web Application', '["Laravel","Vue.js","MySQL","Redis"]', NULL, 1, '2026-02-19 11:38:00', '2026-03-01 11:38:07', '2026-03-02 06:02:16', 'E-Commerce Platform', 'Modern e-commerce platform with complete features for SMEs.', 'Building a full-featured e-commerce platform with payment gateway, inventory management, and analytics dashboard.', NULL, NULL, NULL, NULL, NULL, NULL, 'This project faced complex challenges in terms of scalability, performance, and suboptimal user experience to achieve business targets.', 'We designed a modern architecture using cutting-edge technology, end-to-end performance optimization, and implementation of best practices for maximum results.', '{\"metric_1\":{\"value\":\"+40%\",\"label\":\"CONVERSION INCREASE\"},\"metric_2\":{\"value\":\"2.1s\",\"label\":\"LOAD TIME (AVG)\"}}', 'This project faced complex challenges in terms of scalability, performance, and suboptimal user experience to achieve business targets.', 'We designed a modern architecture using cutting-edge technology, end-to-end performance optimization, and implementation of best practices for maximum results.'),
(2, 'Mobile Banking App', 'mobile-banking-app', 'Aplikasi mobile banking dengan keamanan tinggi dan UX yang intuitif.', 'Mengembangkan aplikasi mobile banking dengan fitur transfer, pembayaran, dan monitoring keuangan real-time.', 'FinCorp Indonesia', 'images/portfolio/mobile-banking.svg', NULL, 'Mobile App', '["Flutter","Node.js","PostgreSQL","Firebase"]', NULL, 1, '2026-02-09 11:38:07', '2026-03-01 11:38:07', '2026-03-01 12:26:36', 'Mobile Banking App', 'Mobile banking application with high security and intuitive UX.', 'Developing a mobile banking application with transfer features, payments, and real-time financial monitoring.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Company Dashboard', 'company-dashboard', 'Dashboard analitik untuk monitoring KPI dan performa perusahaan.', 'Membangun dashboard real-time dengan data visualization, reporting otomatis, dan alert system.', 'Global Tech Corp', 'images/portfolio/dashboard.svg', NULL, 'Web Application', '["React","Laravel","D3.js","PostgreSQL"]', NULL, 1, '2026-01-30 11:38:07', '2026-03-01 11:38:07', '2026-03-01 12:26:36', 'Company Dashboard', 'Analytics dashboard for monitoring KPI and company performance.', 'Building a real-time dashboard with data visualization, automated reporting, and alert system.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ============================================================
-- Table: blogs
-- ============================================================
DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `excerpt` TEXT NULL DEFAULT NULL,
  `content` TEXT NULL DEFAULT NULL,
  `image` VARCHAR(255) NULL DEFAULT NULL,
  `author` VARCHAR(255) NULL DEFAULT NULL,
  `category` VARCHAR(255) NULL DEFAULT NULL,
  `tags` TEXT NULL DEFAULT NULL,
  `meta_title` VARCHAR(255) NULL DEFAULT NULL,
  `meta_description` TEXT NULL DEFAULT NULL,
  `is_published` TINYINT(1) NOT NULL DEFAULT 0,
  `published_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `title_en` VARCHAR(255) NULL DEFAULT NULL,
  `excerpt_en` TEXT NULL DEFAULT NULL,
  `content_en` TEXT NULL DEFAULT NULL,
  `meta_title_en` VARCHAR(255) NULL DEFAULT NULL,
  `meta_description_en` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`),
  KEY `blogs_is_published_published_at_index` (`is_published`, `published_at`),
  KEY `blogs_category_index` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `blogs` (`id`, `title`, `slug`, `excerpt`, `content`, `image`, `author`, `category`, `tags`, `meta_title`, `meta_description`, `is_published`, `published_at`, `created_at`, `updated_at`, `title_en`, `excerpt_en`, `content_en`, `meta_title_en`, `meta_description_en`) VALUES
(1, 'Mengapa Bisnis Anda Butuh Website di Era Digital', 'mengapa-bisnis-butuh-website', 'Di era digital, website bukan lagi pilihan tetapi kebutuhan. Pelajari mengapa bisnis Anda harus hadir secara online.', '<p>Di era digital saat ini, kehadiran online menjadi faktor penting dalam kesuksesan bisnis. Website adalah representasi digital dari perusahaan Anda yang bekerja 24/7.</p><p>Beberapa alasan mengapa website penting untuk bisnis Anda:</p><ul><li>Meningkatkan kredibilitas dan profesionalitas</li><li>Memperluas jangkauan pasar</li><li>Memudahkan pelanggan menemukan informasi</li><li>Meningkatkan efisiensi operasional</li></ul>', NULL, 'Tim BandungCoding', 'Digital Marketing', '["website","bisnis digital","online presence"]', 'Mengapa Bisnis Butuh Website | BandungCoding Blog', 'Pelajari pentingnya website untuk bisnis di era digital dan bagaimana kehadiran online dapat meningkatkan pertumbuhan perusahaan Anda.', 1, '2026-02-24 11:38:07', '2026-03-01 11:38:07', '2026-03-01 12:14:20', 'Why Your Business Needs a Website in the Digital Era', 'In the digital era, a website is not an option but a necessity. Learn why your business must be present online.', '<p>In today\'s digital era, having an online presence is a critical factor in business success. A website is a digital representation of your company that works 24/7.</p><p>Here are some reasons why a website is important for your business:</p><ul><li>Increase credibility and professionalism</li><li>Expand market reach</li><li>Make it easier for customers to find information</li><li>Improve operational efficiency</li></ul>', 'Why Your Business Needs a Website | BandungCoding Blog', 'Learn the importance of a website for your business in the digital era and how an online presence can accelerate your company\'s growth.'),
(2, 'Tren Teknologi 2026: Apa yang Perlu Anda Ketahui', 'tren-teknologi-2026', 'Eksplorasi tren teknologi terbaru yang akan membentuk masa depan industri digital.', '<p>Tahun 2026 membawa banyak perubahan dalam dunia teknologi. Dari AI generatif hingga komputasi quantum, berikut tren yang perlu Anda perhatikan.</p>', NULL, 'Tim BandungCoding', 'Teknologi', '["teknologi","tren 2026","AI","inovasi"]', NULL, NULL, 1, '2026-02-17 11:38:07', '2026-03-01 11:38:07', '2026-03-01 12:14:20', 'Technology Trends 2026: What You Need to Know', 'Explore the latest technology trends that will shape the future of the digital industry.', '<p>2026 brings many changes in the world of technology. From generative AI to quantum computing, here are the trends you need to watch.</p>', 'Technology Trends 2026 | BandungCoding Blog', 'Discover the latest technology trends that will impact business and development in 2026.'),
(3, 'Best Practices dalam Pengembangan Aplikasi Mobile', 'best-practices-mobile-development', 'Tips dan praktik terbaik dalam membangun aplikasi mobile yang berkualitas dan user-friendly.', '<p>Membangun aplikasi mobile yang sukses membutuhkan lebih dari sekadar coding. Dibutuhkan perencanaan yang matang, desain yang intuitif, dan performa yang optimal.</p>', NULL, 'Tim BandungCoding', 'Development', '["mobile","app development","best practices"]', NULL, NULL, 1, '2026-02-09 11:38:07', '2026-03-01 11:38:07', '2026-03-01 12:14:20', 'Best Practices in Mobile App Development', 'Tips and best practices in building quality and user-friendly mobile applications.', '<p>Building a successful mobile app requires much more than just coding. It requires careful planning, intuitive design, and optimal performance.</p>', 'Mobile App Development Best Practices | BandungCoding Blog', 'Learn best practices for developing high-quality mobile applications with great user experience.');

-- ============================================================
-- Table: contacts
-- ============================================================
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `subject` VARCHAR(255) NOT NULL,
  `message` TEXT NOT NULL,
  `is_read` TINYINT(1) NOT NULL DEFAULT 0,
  `replied_at` TIMESTAMP NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_is_read_index` (`is_read`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- Table: settings
-- ============================================================
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` VARCHAR(255) NOT NULL,
  `value` TEXT NULL DEFAULT NULL,
  `group` VARCHAR(255) NOT NULL DEFAULT 'general',
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`),
  KEY `settings_group_index` (`group`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `settings` (`id`, `key`, `value`, `group`) VALUES
(1,  'company_name',         'BandungCoding',                                                          'company'),
(2,  'company_email',        'bandungcoding@gmail.com',                                                'company'),
(3,  'company_phone',        '+62 812-xxxx-xxxx',                                                      'company'),
(4,  'whatsapp_number',      '+62 812-xxxx-xxxx',                                                      'company'),
(5,  'company_address',      'Bandung, Jawa Barat, Indonesia',                                         'company'),
(6,  'instagram_url',        'https://instagram.com/bandungcoding',                                    'company'),
(7,  'linkedin_url',         'https://linkedin.com/company/bandungcoding',                             'company'),
(8,  'facebook_url',         'https://facebook.com/bandungcoding',                                     'company'),
(9,  'seo_meta_title',       'BandungCoding — Solusi IT Profesional',                                  'company'),
(10, 'seo_meta_description', 'BandungCoding adalah perusahaan IT di Bandung yang menyediakan layanan pengembangan software, website, dan aplikasi mobile.', 'company'),
(11, 'company_tagline',      'Solusi IT Profesional untuk Bisnis Anda',                                'company'),
(12, 'logo_navbar',          'logos/MRyyE39r6pe8yoCqzQ3VPSNaIpVnXaCGbBHgu6cW.png',                    'company'),
(13, 'logo_favicon',         'logos/DgEBt6QNP6WvVCXKqYQlVXgFDcgRneHL0OzEdVxy.png',                   'company'),
(14, 'tiktok_url',           'https://tiktok.com/bandungcoding',                                       'company'),
(15, 'website_url',          'bandungcoding.com',                                                      'company');

-- ============================================================
-- Table: clients
-- ============================================================
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `logo` VARCHAR(255) NULL DEFAULT NULL,
  `website` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `is_featured` TINYINT(1) NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_name_unique` (`name`),
  UNIQUE KEY `clients_slug_unique` (`slug`),
  KEY `clients_slug_index` (`slug`),
  KEY `clients_is_featured_index` (`is_featured`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `clients` (`id`, `name`, `slug`, `description`, `logo`, `website`, `email`, `phone`, `is_featured`, `created_at`, `updated_at`) VALUES
(11, 'PROGRAM STUDI SOSIOLOGI', 'program-studi-sosiologi', NULL, 'clients/lULlUqq57cF6gM7p4C6u4IAaOzDCsQbl3ZC4BkwH.png',  NULL, NULL, NULL, 1, '2026-03-01 20:35:17', '2026-03-01 20:48:17'),
(12, 'BIOBALLEARN',             'bioballearn',             NULL, 'clients/QD52ARZHUFrzBOmWWmIQGZMnJXNoIIUS3UUGaGON.jpg',  NULL, NULL, NULL, 1, '2026-03-01 20:46:30', '2026-03-01 20:46:30'),
(14, 'SD ISLAM TERPADU',        'sd-islam-terpadu',        NULL, 'clients/uoaXwuCa1E8VONUhIm0wxlmOWh9fjqP8ceIwJZyr.png',  NULL, NULL, NULL, 0, '2026-03-01 20:52:39', '2026-03-01 20:52:39'),
(15, 'PT Daya Mekar Tekstindo', 'pt-daya-mekar-tekstindo', NULL, 'clients/HuH3Fcwe6fBMSYdExGjzzL4UGBfkL1AFb6f6uGXi.png',  NULL, NULL, NULL, 0, '2026-03-01 20:54:17', '2026-03-01 20:54:17');

-- ============================================================
-- Table: teams
-- ============================================================
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `role` VARCHAR(255) NOT NULL,
  `initial` VARCHAR(255) NOT NULL,
  `accent` VARCHAR(255) NOT NULL DEFAULT 'from-blue-500 to-indigo-600',
  `bio` TEXT NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `linkedin` VARCHAR(255) NULL DEFAULT NULL,
  `photo` VARCHAR(255) NULL DEFAULT NULL,
  `order` INT NOT NULL DEFAULT 0,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `instagram` VARCHAR(255) NULL DEFAULT NULL,
  `tiktok` VARCHAR(255) NULL DEFAULT NULL,
  `portfolio` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_is_active_index` (`is_active`),
  KEY `teams_order_index` (`order`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `teams` (`id`, `name`, `role`, `initial`, `accent`, `bio`, `email`, `phone`, `linkedin`, `photo`, `order`, `is_active`, `created_at`, `updated_at`, `instagram`, `tiktok`, `portfolio`) VALUES
(1, 'Fazri Lukman Nurrohman', 'Co-Founder & Lead Engineer', 'FLN', 'from-blue-500 to-indigo-600',   'Praktisi berpengalaman dengan keahlian mendalam dalam software engineering dan strategi digital.', 'fajrilukman194@gmail.com', '+62 81222327635',  'https://linkedin.com/in/Fazrilukman',     'teams/MOE5Rv8xsv2KHN35yI8IeoombeTEp2NVybBbwuGj.jpg', 0, 1, '2026-03-01 17:53:23', '2026-03-02 06:45:10', 'https://instagram.com/fazrilukman_',        'https://tiktok.com/@fazrilukman_',        'https://fazrilukman.id/'),
(2, 'Fahmi Nashruddin',        'Co-Founder & Lead Engineer', 'FN',  'from-orange-500 to-red-600', 'Expert dalam arsitektur sistem dan pengembangan produk teknologi dengan pengalaman 10+ tahun.',  'fahminashruddin2005@gmail.com', '+62 813 4567 8901', 'https://linkedin.com/in/fahminashruddin', 'teams/mpWnKoEfyCsrjDHjmsqCrdGo66iJqEpJvN5375TJ.jpg', 1, 1, '2026-03-01 17:53:23', '2026-03-02 13:34:59', 'https://instagram.com/fmi.dinnn', 'https://www.tiktok.com/@miii7697', 'https://www.linkedin.com/in/fahmi-nashruddin/');

COMMIT;
