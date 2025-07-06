<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pembayaran Tiket</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .bukti-box { border: 1px solid #000; padding: 20px; max-width: 500px; margin: auto; }
    </style>
</head>
<body>
    <div class="bukti-box">
        <h2>Bukti Pembayaran</h2>
        <p><strong>Nama:</strong> {{ $ticket->name }}</p>
        <p><strong>Email:</strong> {{ $ticket->email }}</p>
        <p><strong>Jumlah Tiket:</strong> {{ $ticket->quantity }}</p>
        <p><strong>Status:</strong> {{ $ticket->status }}</p>
        <hr>
        <p style="color: green;">
            <strong>CATATAN:</strong> Pelanggan sudah melakukan pembayaran dan telah disetujui. 
            Mohon unggah bukti pembayaran untuk keperluan dokumentasi resmi.
        </p>
    </div>
</body>
</html>
