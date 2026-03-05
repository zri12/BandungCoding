<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proposal {{ $service->title }} - {{ $companyName }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            font-size: 11pt;
            line-height: 1.6;
            color: #333;
            padding: 40px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 3px solid #2563eb;
        }
        
        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 10px;
        }
        
        .header-subtitle {
            color: #666;
            font-size: 10pt;
        }
        
        .proposal-title {
            text-align: center;
            margin: 30px 0;
            padding: 15px;
            background: #f8fafc;
            border-left: 4px solid #2563eb;
        }
        
        .proposal-title h1 {
            font-size: 20pt;
            color: #1e293b;
            margin-bottom: 5px;
        }
        
        .proposal-title .subtitle {
            color: #64748b;
            font-size: 10pt;
        }
        
        .info-box {
            margin: 20px 0;
            padding: 15px;
            background: #f1f5f9;
            border-radius: 8px;
        }
        
        .info-row {
            display: flex;
            margin-bottom: 8px;
        }
        
        .info-label {
            width: 150px;
            font-weight: bold;
            color: #475569;
        }
        
        .info-value {
            flex: 1;
            color: #1e293b;
        }
        
        .section {
            margin: 30px 0;
        }
        
        .section-title {
            font-size: 14pt;
            font-weight: bold;
            color: #1e293b;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #e2e8f0;
        }
        
        .section-content {
            color: #475569;
            text-align: justify;
            line-height: 1.8;
        }
        
        .features-list {
            list-style: none;
            padding: 0;
        }
        
        .features-list li {
            padding: 10px 0 10px 30px;
            position: relative;
            color: #475569;
        }
        
        .features-list li:before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #2563eb;
            font-weight: bold;
            font-size: 14pt;
        }
        
        .benefits {
            display: table;
            width: 100%;
            margin: 15px 0;
        }
        
        .benefit-item {
            display: table-row;
        }
        
        .benefit-icon {
            display: table-cell;
            width: 30px;
            color: #2563eb;
            font-weight: bold;
            vertical-align: top;
            padding: 5px 0;
        }
        
        .benefit-text {
            display: table-cell;
            color: #475569;
            padding: 5px 0;
        }
        
        .highlight-box {
            background: #eff6ff;
            border-left: 4px solid #2563eb;
            padding: 20px;
            margin: 20px 0;
        }
        
        .highlight-box h3 {
            color: #1e40af;
            margin-bottom: 10px;
        }
        
        .highlight-box p {
            color: #475569;
        }
        
        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 2px solid #e2e8f0;
            text-align: center;
        }
        
        .footer-info {
            color: #64748b;
            font-size: 9pt;
            margin: 5px 0;
        }
        
        .cta-box {
            background: #2563eb;
            color: white;
            padding: 25px;
            text-align: center;
            margin: 30px 0;
            border-radius: 8px;
        }
        
        .cta-box h3 {
            font-size: 14pt;
            margin-bottom: 10px;
        }
        
        .cta-box p {
            font-size: 10pt;
            margin-bottom: 5px;
        }
        
        .price-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        
        .price-table th {
            background: #1e293b;
            color: white;
            padding: 12px;
            text-align: left;
        }
        
        .price-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #e2e8f0;
            color: #475569;
        }
        
        .price-table tr:nth-child(even) {
            background: #f8fafc;
        }
        
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    {{-- Header --}}
    <div class="header">
        <div class="logo">{{ $companyName }}</div>
        <div class="header-subtitle">Professional Digital Solutions</div>
        <div class="header-subtitle">Bandung, Indonesia</div>
    </div>

    {{-- Proposal Title --}}
    <div class="proposal-title">
        <h1>PROPOSAL LAYANAN</h1>
        <div class="subtitle">{{ $service->title }}</div>
    </div>

    {{-- Document Info --}}
    <div class="info-box">
        <div class="info-row">
            <div class="info-label">Tanggal:</div>
            <div class="info-value">{{ $date }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Layanan:</div>
            <div class="info-value">{{ $service->title }}</div>
        </div>
        <div class="info-row">
            <div class="info-label">Kategori:</div>
            <div class="info-value">{{ $service->category ?? 'Digital Services' }}</div>
        </div>
    </div>

    {{-- Introduction --}}
    <div class="section">
        <div class="section-title">Tentang Layanan</div>
        <div class="section-content">
            {!! nl2br(e($service->description ?? $service->excerpt)) !!}
        </div>
    </div>

    {{-- Key Features --}}
    <div class="section">
        <div class="section-title">Fitur Utama</div>
        <ul class="features-list">
            @if($service->slug == 'web-development')
                <li>Desain responsif dan modern untuk semua perangkat</li>
                <li>Optimasi SEO untuk meningkatkan visibilitas online</li>
                <li>Panel admin yang user-friendly</li>
                <li>Keamanan tingkat enterprise</li>
                <li>Loading cepat dan performa optimal</li>
                <li>Integrasi dengan sistem third-party</li>
                <li>Support dan maintenance berkelanjutan</li>
            @elseif($service->slug == 'mobile-app-development')
                <li>Aplikasi native untuk iOS dan Android</li>
                <li>UI/UX design yang intuitif</li>
                <li>Integrasi API dan backend</li>
                <li>Push notification system</li>
                <li>Offline mode functionality</li>
                <li>Analytics dan tracking</li>
                <li>App store optimization</li>
            @elseif($service->slug == 'ui-ux-design')
                <li>User research dan analysis</li>
                <li>Wireframing dan prototyping</li>
                <li>High-fidelity mockups</li>
                <li>Interactive prototype</li>
                <li>Design system creation</li>
                <li>Usability testing</li>
                <li>Responsive design guidelines</li>
            @elseif($service->slug == 'digital-marketing')
                <li>Strategi marketing komprehensif</li>
                <li>Social media management</li>
                <li>Content creation dan copywriting</li>
                <li>SEO dan SEM optimization</li>
                <li>Analytics dan reporting</li>
                <li>Email marketing campaigns</li>
                <li>Brand awareness building</li>
            @else
                <li>Solusi disesuaikan dengan kebutuhan bisnis Anda</li>
                <li>Teknologi terkini dan terpercaya</li>
                <li>Tim profesional berpengalaman</li>
                <li>Support dan maintenance</li>
                <li>Dokumentasi lengkap</li>
                <li>Training untuk tim Anda</li>
            @endif
        </ul>
    </div>

    {{-- Benefits --}}
    <div class="section">
        <div class="section-title">Manfaat untuk Bisnis Anda</div>
        <div class="benefits">
            <div class="benefit-item">
                <div class="benefit-icon">→</div>
                <div class="benefit-text"><strong>Meningkatkan Efisiensi:</strong> Otomatisasi proses bisnis menghemat waktu dan biaya operasional</div>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">→</div>
                <div class="benefit-text"><strong>Jangkauan Lebih Luas:</strong> Ekspansi pasar digital untuk menjangkau lebih banyak pelanggan</div>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">→</div>
                <div class="benefit-text"><strong>Competitive Advantage:</strong> Teknologi modern memberikan keunggulan kompetitif</div>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">→</div>
                <div class="benefit-text"><strong>Data-Driven Decision:</strong> Analytics untuk pengambilan keputusan yang lebih baik</div>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">→</div>
                <div class="benefit-text"><strong>Skalabilitas:</strong> Solusi yang dapat berkembang seiring pertumbuhan bisnis</div>
            </div>
        </div>
    </div>

    <div class="page-break"></div>

    {{-- Process --}}
    <div class="section">
        <div class="section-title">Proses Pengerjaan</div>
        <table class="price-table">
            <tr>
                <th style="width: 30px;">No</th>
                <th style="width: 150px;">Tahap</th>
                <th>Deskripsi</th>
            </tr>
            <tr>
                <td>1</td>
                <td><strong>Discovery</strong></td>
                <td>Analisis kebutuhan, riset pasar, dan perencanaan strategi</td>
            </tr>
            <tr>
                <td>2</td>
                <td><strong>Design</strong></td>
                <td>Pembuatan wireframe, mockup, dan prototype</td>
            </tr>
            <tr>
                <td>3</td>
                <td><strong>Development</strong></td>
                <td>Coding, integrasi sistem, dan implementasi fitur</td>
            </tr>
            <tr>
                <td>4</td>
                <td><strong>Testing</strong></td>
                <td>Quality assurance dan bug fixing</td>
            </tr>
            <tr>
                <td>5</td>
                <td><strong>Launch</strong></td>
                <td>Deployment dan go-live</td>
            </tr>
            <tr>
                <td>6</td>
                <td><strong>Support</strong></td>
                <td>Maintenance dan support berkelanjutan</td>
            </tr>
        </table>
    </div>

    {{-- Technology Stack --}}
    <div class="highlight-box">
        <h3>Teknologi yang Kami Gunakan</h3>
        <p>Kami menggunakan teknologi terkini dan terpercaya untuk memastikan solusi digital Anda berkualitas tinggi, aman, dan scalable. Stack teknologi disesuaikan dengan kebutuhan spesifik proyek Anda.</p>
    </div>

    {{-- Why Choose Us --}}
    <div class="section">
        <div class="section-title">Mengapa Memilih {{ $companyName }}?</div>
        <div class="benefits">
            <div class="benefit-item">
                <div class="benefit-icon">✓</div>
                <div class="benefit-text"><strong>Tim Berpengalaman:</strong> Profesional dengan track record sukses dalam berbagai industri</div>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">✓</div>
                <div class="benefit-text"><strong>Quality Assurance:</strong> Standar quality control ketat di setiap tahap pengerjaan</div>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">✓</div>
                <div class="benefit-text"><strong>On-Time Delivery:</strong> Komitmen deadline dan transparansi progress</div>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">✓</div>
                <div class="benefit-text"><strong>Support Berkelanjutan:</strong> Maintenance dan update untuk keberlanjutan sistem</div>
            </div>
            <div class="benefit-item">
                <div class="benefit-icon">✓</div>
                <div class="benefit-text"><strong>Competitive Pricing:</strong> Harga kompetitif dengan kualitas terjamin</div>
            </div>
        </div>
    </div>

    {{-- CTA Box --}}
    <div class="cta-box">
        <h3>Siap Memulai Proyek Anda?</h3>
        <p>Hubungi kami untuk konsultasi gratis dan penawaran harga khusus</p>
        <p style="margin-top: 15px; font-size: 11pt;"><strong>Email:</strong> info@bandungcoding.com</p>
        <p><strong>WhatsApp:</strong> +62 812-3456-7890</p>
        <p><strong>Website:</strong> www.bandungcoding.com</p>
    </div>

    {{-- Footer --}}
    <div class="footer">
        <div class="footer-info"><strong>{{ $companyName }}</strong></div>
        <div class="footer-info">Professional Digital Solutions Provider</div>
        <div class="footer-info">Bandung, West Java, Indonesia</div>
        <div class="footer-info" style="margin-top: 15px;">© {{ date('Y') }} {{ $companyName }}. All rights reserved.</div>
    </div>
</body>
</html>
