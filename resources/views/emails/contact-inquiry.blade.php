<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Baru Formulir Kontak - NazwaGraha Pratama</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 24px 12px;
            color: #1e293b;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        .header {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            padding: 28px 24px;
            text-align: center;
            border-bottom: 3px solid #ea580c;
        }
        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }
        .header p {
            color: #fb923c;
            margin: 4px 0 0;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .content {
            padding: 28px 24px;
        }
        .badge {
            display: inline-block;
            background-color: #ffedd5;
            color: #c2410c;
            font-size: 11px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 9999px;
            margin-bottom: 16px;
        }
        .greeting {
            font-size: 16px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 16px 0;
            font-size: 13px;
        }
        .info-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: top;
        }
        .info-table td.label {
            width: 35%;
            color: #64748b;
            font-weight: 600;
        }
        .info-table td.value {
            width: 65%;
            color: #0f172a;
            font-weight: 700;
        }
        .message-box {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            border-left: 4px solid #ea580c;
            border-radius: 8px;
            padding: 16px;
            margin: 20px 0;
            font-size: 13px;
            line-height: 1.6;
            color: #334155;
            white-space: pre-wrap;
        }
        .button-group {
            text-align: center;
            margin: 24px 0 16px;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            margin: 4px;
            transition: opacity 0.2s;
        }
        .btn-wa {
            background-color: #16a34a;
            color: #ffffff !important;
        }
        .btn-email {
            background-color: #ea580c;
            color: #ffffff !important;
        }
        .footer {
            background-color: #f8fafc;
            padding: 20px 24px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 11px;
            color: #64748b;
            line-height: 1.5;
        }
        .footer a {
            color: #ea580c;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>PT NAZWA GRAHA PRATAMA</h1>
            <p>Notifikasi Pesan Masuk Website</p>
        </div>

        <!-- Content Body -->
        <div class="content">
            <span class="badge">📩 Prospek Konsultasi Baru</span>
            <div class="greeting">Halo Tim NazwaGraha Pratama,</div>
            <p style="font-size: 13px; color: #475569; margin: 0 0 16px; line-height: 1.5;">
                Terdapat pesan konsultasi / kebutuhan proyek baru yang dikirimkan melalui <strong>Formulir Kontak Website</strong>. Berikut rincian data pengirim:
            </p>

            <table class="info-table">
                <tr>
                    <td class="label">Nama Pengirim</td>
                    <td class="value">{{ $data['name'] }}</td>
                </tr>
                <tr>
                    <td class="label">Nomor WhatsApp</td>
                    <td class="value">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', (str_starts_with($data['phone'], '0') ? '62' . substr($data['phone'], 1) : $data['phone'])) }}" style="color: #16a34a; text-decoration: none;">
                            {{ $data['phone'] }} ↗
                        </a>
                    </td>
                </tr>
                <tr>
                    <td class="label">Alamat Email</td>
                    <td class="value">
                        @if(!empty($data['email']))
                            <a href="mailto:{{ $data['email'] }}" style="color: #ea580c; text-decoration: none;">
                                {{ $data['email'] }}
                            </a>
                        @else
                            <span style="color: #94a3b8; font-weight: normal;">Tidak dicantumkan</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="label">Layanan yang Dipilih</td>
                    <td class="value" style="color: #ea580c;">{{ $data['service'] }}</td>
                </tr>
                <tr>
                    <td class="label">Waktu Pengiriman</td>
                    <td class="value">{{ now()->translatedFormat('l, d F Y - H:i') }} WIB</td>
                </tr>
                @if(!empty($data['ip_address']))
                <tr>
                    <td class="label">Alamat IP</td>
                    <td class="value" style="font-family: monospace; font-size: 11px; color: #64748b;">{{ $data['ip_address'] }}</td>
                </tr>
                @endif
            </table>

            <div style="font-size: 12px; font-weight: 700; color: #0f172a; text-transform: uppercase; tracking: 0.5px; margin-top: 20px;">
                Isi Pesan / Rincian Kebutuhan:
            </div>
            <div class="message-box">{{ $data['message'] }}</div>

            <!-- Action Buttons -->
            <div class="button-group">
                @php
                    $cleanPhone = preg_replace('/[^0-9]/', '', $data['phone']);
                    if (str_starts_with($cleanPhone, '0')) {
                        $cleanPhone = '62' . substr($cleanPhone, 1);
                    }
                    $replyWaText = urlencode("Halo " . $data['name'] . ", terima kasih telah menghubungi NazwaGraha Pratama mengenai " . $data['service'] . ". Kami siap membantu proyek Anda.");
                @endphp
                <a href="https://wa.me/{{ $cleanPhone }}?text={{ $replyWaText }}" class="btn btn-wa" target="_blank">
                    💬 Balas via WhatsApp
                </a>
                @if(!empty($data['email']))
                <a href="mailto:{{ $data['email'] }}?subject=Re: Konsultasi {{ urlencode($data['service']) }} - NazwaGraha Pratama" class="btn btn-email">
                    ✉️ Balas via Email
                </a>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p style="margin: 0 0 4px; font-weight: 700; color: #1e293b;">PT Nazwa Graha Pratama</p>
            <p style="margin: 0 0 8px;">Jl. Banjarwangi 1 Blok A2 no.9 RT.2 RW.2 Banjarwangi Ciawi Bogor</p>
            <p style="margin: 0;">Website: <a href="{{ config('app.url') }}">{{ config('app.url') }}</a> | Email: <a href="mailto:nazwagraha@gmail.com">nazwagraha@gmail.com</a></p>
        </div>
    </div>
</body>
</html>
