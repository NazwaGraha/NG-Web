<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Pesan & Pertanyaan Baru dari Website NazwaGraha</title>
  <style>
    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      line-height: 1.6;
      color: #1e293b;
      background-color: #f1f5f9;
      margin: 0;
      padding: 24px;
    }
    .email-container {
      max-width: 600px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 16px rgba(0,0,0,0.06);
      border: 1px solid #e2e8f0;
    }
    .email-header {
      background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
      padding: 28px 24px;
      text-align: center;
      border-bottom: 3px solid #f47712;
    }
    .email-header h1 {
      color: #ffffff;
      font-size: 20px;
      margin: 0 0 6px;
      font-weight: 800;
    }
    .email-header p {
      color: #ff9a4b;
      font-size: 13px;
      margin: 0;
      font-weight: 600;
      letter-spacing: 0.5px;
    }
    .email-body {
      padding: 28px 24px;
    }
    .badge {
      display: inline-block;
      background: #fff4eb;
      color: #df6508;
      border: 1px solid #fed7aa;
      font-size: 12px;
      font-weight: 700;
      padding: 4px 10px;
      border-radius: 20px;
      margin-bottom: 20px;
    }
    .info-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 24px;
    }
    .info-table td {
      padding: 10px 12px;
      border-bottom: 1px solid #f1f5f9;
      font-size: 14px;
    }
    .info-table td.label {
      width: 32%;
      color: #64748b;
      font-weight: 600;
      background: #f8fafc;
    }
    .info-table td.value {
      color: #0f172a;
      font-weight: 700;
    }
    .message-box {
      background: #f8fafc;
      border-left: 4px solid #f47712;
      padding: 16px 18px;
      border-radius: 0 8px 8px 0;
      margin-bottom: 24px;
    }
    .message-box h3 {
      margin: 0 0 8px;
      font-size: 14px;
      color: #0f172a;
    }
    .message-box p {
      margin: 0;
      font-size: 14px;
      color: #334155;
      white-space: pre-wrap;
    }
    .action-btn {
      display: inline-block;
      background: #f47712;
      color: #ffffff !important;
      text-decoration: none;
      font-weight: 800;
      font-size: 14px;
      padding: 12px 24px;
      border-radius: 30px;
      margin-right: 10px;
      box-shadow: 0 4px 12px rgba(244,119,18,0.25);
    }
    .wa-btn {
      display: inline-block;
      background: #25d366;
      color: #ffffff !important;
      text-decoration: none;
      font-weight: 800;
      font-size: 14px;
      padding: 12px 24px;
      border-radius: 30px;
      box-shadow: 0 4px 12px rgba(37,211,102,0.25);
    }
    .email-footer {
      background: #f8fafc;
      padding: 18px 24px;
      text-align: center;
      font-size: 12px;
      color: #94a3b8;
      border-top: 1px solid #e2e8f0;
    }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="email-header">
      <h1>NazwaGraha Contact Center</h1>
      <p>Pemberitahuan Pesan / Pertanyaan Baru dari Website</p>
    </div>

    <div class="email-body">
      <span class="badge">🔔 Pertanyaan Masuk</span>

      <p style="margin: 0 0 16px; font-size: 14px; color: #475569;">
        Halo Tim <strong>NazwaGraha</strong>, terdapat pesan pertanyaan baru yang dikirimkan oleh pengunjung melalui formulir halaman <em>Contact Us</em>:
      </p>

      <table class="info-table">
        <tr>
          <td class="label">Nama Lengkap</td>
          <td class="value">{{ $data['name'] ?? '-' }}</td>
        </tr>
        <tr>
          <td class="label">WhatsApp / HP</td>
          <td class="value">
            <a href="https://wa.me/{{ $data['clean_whatsapp'] ?? '' }}" style="color:#059669; text-decoration:none;">
              {{ $data['whatsapp'] ?? '-' }} ↗
            </a>
          </td>
        </tr>
        <tr>
          <td class="label">Alamat Email</td>
          <td class="value">
            <a href="mailto:{{ $data['email'] ?? '' }}" style="color:#f47712; text-decoration:none;">
              {{ $data['email'] ?? '-' }}
            </a>
          </td>
        </tr>
        <tr>
          <td class="label">Layanan Diminati</td>
          <td class="value">{{ $data['service_name'] ?? 'Pertanyaan Umum IT' }}</td>
        </tr>
        @if(!empty($data['subject']))
        <tr>
          <td class="label">Subjek</td>
          <td class="value">{{ $data['subject'] }}</td>
        </tr>
        @endif
        <tr>
          <td class="label">Waktu Kirim</td>
          <td class="value">{{ now()->timezone('Asia/Jakarta')->translatedFormat('l, d F Y - H:i') }} WIB</td>
        </tr>
      </table>

      <div class="message-box">
        <h3>Isi Pesan / Pertanyaan:</h3>
        <p>{{ $data['message'] ?? '-' }}</p>
      </div>

      <div style="text-align: center; margin: 28px 0 10px;">
        @if(!empty($data['clean_whatsapp']))
        <a href="https://wa.me/{{ $data['clean_whatsapp'] }}?text=Halo%20{{ urlencode($data['name'] ?? '') }}%2C%20kami%20dari%20tim%20NazwaGraha%20merespons%20pertanyaan%20Anda%20di%20website." class="wa-btn" target="_blank">
          Chat Balas via WhatsApp ↗
        </a>
        @endif
        <a href="mailto:{{ $data['email'] ?? '' }}" class="action-btn">
          Balas via Email ↗
        </a>
      </div>
    </div>

    <div class="email-footer">
      Email ini dikirim otomatis oleh sistem website resmi NazwaGraha.<br>
      IP Pengirim: {{ $data['ip_address'] ?? '127.0.0.1' }} | Banjarwangi, Ciawi, Bogor.
    </div>
  </div>
</body>
</html>
