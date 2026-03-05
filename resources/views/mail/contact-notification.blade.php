<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru — BandungCoding</title>
</head>
<body style="margin:0;padding:0;background:#f1f5f9;font-family:'Segoe UI',Arial,sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f1f5f9;padding:40px 16px;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" style="max-width:580px;">

                    {{-- Header --}}
                    <tr>
                        <td style="background:#0b3d93;border-radius:16px 16px 0 0;padding:32px 36px;text-align:center;">
                            <h1 style="margin:0;color:#ffffff;font-size:22px;font-weight:800;letter-spacing:-0.5px;">
                                BANDUNG<span style="color:#93c5fd;">CODING</span>
                            </h1>
                            <p style="margin:8px 0 0;color:rgba(255,255,255,0.75);font-size:13px;">Notifikasi Pesan Masuk</p>
                        </td>
                    </tr>

                    {{-- Body --}}
                    <tr>
                        <td style="background:#ffffff;padding:36px;border-left:1px solid #e2e8f0;border-right:1px solid #e2e8f0;">

                            <p style="margin:0 0 20px;font-size:15px;color:#334155;line-height:1.6;">
                                Halo Tim BandungCoding,<br>
                                Ada pesan baru yang masuk melalui formulir kontak website. Berikut detailnya:
                            </p>

                            {{-- Info Table --}}
                            <table width="100%" cellpadding="0" cellspacing="0" style="background:#f8fafc;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden;margin-bottom:24px;">
                                <tr>
                                    <td style="padding:14px 18px;border-bottom:1px solid #e2e8f0;width:130px;">
                                        <span style="font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Nama</span>
                                    </td>
                                    <td style="padding:14px 18px;border-bottom:1px solid #e2e8f0;">
                                        <span style="font-size:14px;color:#0f172a;font-weight:600;">{{ $contact->name }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:14px 18px;border-bottom:1px solid #e2e8f0;">
                                        <span style="font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Email</span>
                                    </td>
                                    <td style="padding:14px 18px;border-bottom:1px solid #e2e8f0;">
                                        <a href="mailto:{{ $contact->email }}" style="font-size:14px;color:#0b3d93;text-decoration:none;font-weight:600;">{{ $contact->email }}</a>
                                    </td>
                                </tr>
                                @if($contact->phone)
                                <tr>
                                    <td style="padding:14px 18px;border-bottom:1px solid #e2e8f0;">
                                        <span style="font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Telepon</span>
                                    </td>
                                    <td style="padding:14px 18px;border-bottom:1px solid #e2e8f0;">
                                        <span style="font-size:14px;color:#0f172a;">{{ $contact->phone }}</span>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td style="padding:14px 18px;">
                                        <span style="font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Subjek</span>
                                    </td>
                                    <td style="padding:14px 18px;">
                                        <span style="font-size:14px;color:#0f172a;font-weight:600;">{{ $contact->subject }}</span>
                                    </td>
                                </tr>
                            </table>

                            {{-- Message --}}
                            <p style="margin:0 0 8px;font-size:12px;font-weight:700;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;">Pesan</p>
                            <div style="background:#f8fafc;border:1px solid #e2e8f0;border-left:4px solid #0b3d93;border-radius:8px;padding:18px;font-size:14px;color:#334155;line-height:1.7;white-space:pre-wrap;">{{ $contact->message }}</div>

                            {{-- CTA --}}
                            <div style="margin-top:28px;text-align:center;">
                                <a href="{{ config('app.url') }}/admin/contacts"
                                   style="display:inline-block;background:#0b3d93;color:#ffffff;font-size:14px;font-weight:700;padding:13px 28px;border-radius:10px;text-decoration:none;">
                                    Lihat di Dashboard Admin →
                                </a>
                            </div>

                        </td>
                    </tr>

                    {{-- Footer --}}
                    <tr>
                        <td style="background:#f8fafc;border:1px solid #e2e8f0;border-top:none;border-radius:0 0 16px 16px;padding:20px 36px;text-align:center;">
                            <p style="margin:0;font-size:12px;color:#94a3b8;">
                                Email ini dikirim otomatis oleh sistem BandungCoding.<br>
                                Diterima: {{ now()->setTimezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB
                            </p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
