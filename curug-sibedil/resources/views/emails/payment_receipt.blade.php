<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Pembayaran Tiket Curug Sibedil</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 20px; color: #333;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        
        <div style="text-align: center;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c7/Logo_Kabupaten_Pemalang.png" alt="Logo Curug Sibedil" style="width: 100px; margin-bottom: 10px;">
            <h2 style="color: #2e7d32;">Bukti Pembayaran Tiket</h2>
            <p style="margin-top: -10px;">Wisata Curug Sibedil - Pemalang</p>
            <hr style="border-top: 1px solid #ccc;">
        </div>

        <p>Halo <strong>{{ $ticket->name }}</strong>,</p>
        <p>Terima kasih telah melakukan pemesanan tiket. Berikut adalah detail pesanan Anda:</p>

        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td><strong>Nama</strong></td>
                <td>: {{ $ticket->name }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>: {{ $ticket->email }}</td>
            </tr>
            <tr>
                <td><strong>Jumlah Tiket</strong></td>
                <td>: {{ $ticket->quantity }}</td>
            </tr>
            <tr>
                <td><strong>Status Pembayaran</strong></td>
                <td>: {{ $ticket->status }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal Pembayaran</strong></td>
                <td>: {{ \Carbon\Carbon::parse($ticket->updated_at)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal Berlaku</strong></td>
                <td>: {{ \Carbon\Carbon::parse($ticket->date)->translatedFormat('d F Y') }}</td>
            </tr>
        </table>

        <div style="margin-top: 30px; text-align: center;">
            <p><strong>QR Code:</strong></p>
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($ticket->email . '|' . $ticket->name . '|' . $ticket->date) }}" alt="QR Code">
        </div>

        <div style="margin-top: 30px;">
            <p><strong>Info Penting:</strong></p>
            <ul>
                <li>Buka setiap hari pukul 08.00 – 16.00 WIB</li>
                <li>Tunjukkan email ini dan QR Code di pintu masuk/loket</li>
                <li>Alamat: Curug Sibedil, Desa Sima, Kecamatan Moga, Pemalang</li>
            </ul>
        </div>

        <hr style="margin-top: 40px;">
        <p style="font-size: 12px; text-align: center; color: #999;">
            &copy; {{ date('Y') }} Curug Sibedil. Website: <a href="https://curugsibedil.com" target="_blank" style="color: #2e7d32;">curugsibedil.com</a> |
            Email: info@curugsibedil.com
        </p>
    </div>
</body>
</html>
