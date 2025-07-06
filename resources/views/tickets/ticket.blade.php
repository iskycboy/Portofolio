<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Tiket</title>

    <!-- Link ke Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">

    <!-- Link ke Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* Background dengan gambar air terjun */
            background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), 
                        url('./images/curug.png');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }
        
        .card-panel {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
            backdrop-filter: blur(10px);
        }
        
        .form-title {
            margin-top: 50px;
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: bold;
            color: white;
            text-shadow: 3px 3px 6px rgba(0,0,0,0.9);
            background: rgba(0,0,0,0.5);
            padding: 20px;
            border-radius: 15px;
        }
        
        label {
            color: #1565c0 !important;
            font-weight: 500;
        }
        
        input[type="text"], input[type="email"], input[type="number"], input[type="file"] {
            border-bottom: 1px solid #1565c0 !important;
            box-shadow: none !important;
        }
        
        .btn-custom {
            background: linear-gradient(45deg, #1565c0, #0d47a1);
            width: auto;
            max-width: 200px;
            margin: 20px auto 0;
            display: block;
            border-radius: 25px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 20px;
            font-size: 0.9rem;
        }
        
        .btn-custom:hover {
            background: linear-gradient(45deg, #0d47a1, #1565c0);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(13, 71, 161, 0.3);
        }
        
        /* Animasi untuk card */
        .card-panel {
            animation: slideInUp 0.6s ease-out;
        }
        
        @keyframes slideInUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        /* Popup Modal - Diperbaiki */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.6);
            backdrop-filter: blur(8px);
        }
        
        .modal-content {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            margin: 2% auto;
            padding: 0;
            border-radius: 20px;
            width: 95%;
            max-width: 800px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0,0,0,0.25);
            animation: modalSlideIn 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
            max-height: 96vh;
            overflow-y: auto;
        }
        
        .modal-header {
            background: linear-gradient(135deg, #1565c0, #0d47a1);
            color: white;
            padding: 25px 25px 20px;
            position: relative;
            overflow: hidden;
        }
        
        .modal-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: shimmer 3s infinite;
        }
        
        @keyframes shimmer {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .modal-icon {
            font-size: 3rem;
            margin-bottom: 8px;
            display: block;
            animation: bounce 1s infinite;
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        
        .modal-title {
            font-size: 1.6rem;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 1;
        }
        
        .modal-body {
            padding: 20px 25px 25px;
        }
        
        .modal-message {
            color: #424242;
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 15px;
            font-weight: 400;
        }
        
        .modal-highlight {
            color: #1565c0;
            font-weight: 600;
        }
        
        .modal-steps {
            background: #f5f5f5;
            border-radius: 10px;
            padding: 15px;
            margin: 15px 0;
            text-align: left;
        }
        
        .modal-steps h6 {
            color: #1565c0;
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.95rem;
        }
        
        .modal-steps ul {
            margin: 0;
            padding-left: 20px;
        }
        
        .modal-steps li {
            color: #666;
            margin-bottom: 4px;
            font-size: 0.85rem;
            line-height: 1.3;
        }
        
        .close-btn {
            background: linear-gradient(45deg, #1565c0, #0d47a1);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 25px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(21, 101, 192, 0.3);
        }
        
        .close-btn:hover {
            background: linear-gradient(45deg, #0d47a1, #1565c0);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(21, 101, 192, 0.4);
        }
        
        .close-btn:active {
            transform: translateY(0);
        }
        
        @keyframes modalSlideIn {
            from {
                transform: translateY(-100px) scale(0.8);
                opacity: 0;
            }
            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }
        
        /* Navigation buttons styling */
        .nav-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }
        
        .nav-buttons .right-buttons {
            display: flex;
            gap: 10px;
        }
        
        /* Price list styling */
        .price-list {
            text-align: left;
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin: 12px 0;
        }
        
        .price-list h6 {
            color: #1565c0;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        
        .price-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .price-item:last-child {
            border-bottom: none;
        }
        
        .price-item-name {
            color: #424242;
            font-weight: 500;
        }
        
        .price-item-price {
            color: #1565c0;
            font-weight: 600;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .form-title {
                font-size: 2rem;
            }
            
            .card-panel {
                margin: 20px 10px;
                padding: 20px;
            }
            
            .modal-content {
                margin: 8% auto;
                width: 96%;
                max-width: 500px;
            }
            
            .modal-header {
                padding: 20px 20px 18px;
            }
            
            .modal-body {
                padding: 20px 25px 30px;
            }
            
            .modal-icon {
                font-size: 2.8rem;
            }
            
            .modal-title {
                font-size: 1.4rem;
            }
            
            .modal-message {
                font-size: 0.95rem;
            }
            
            .modal-steps {
                padding: 15px;
                margin: 15px 0;
            }
            
            .modal-steps h6 {
                font-size: 0.9rem;
            }
            
            .modal-steps li {
                font-size: 0.85rem;
            }
            
            .nav-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .nav-buttons .right-buttons {
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Navigation Buttons - Fixed positioning -->
        <div class="nav-buttons">
            <a href="/" class="btn waves-effect waves-light blue darken-4" style="border-radius: 25px; padding: 0 20px;">
                <i class="material-icons left">arrow_back</i>
                Kembali ke Menu
            </a>
            <div class="right-buttons">
                <button onclick="showPriceModal()" class="btn waves-effect waves-light blue darken-4" style="border-radius: 25px; padding: 0 20px;">
                    <i class="material-icons left">local_offer</i>
                    Harga Tiket
                </button>
            </div>
        </div>
        
        <h1 class="center-align form-title">Pemesanan Tiket Curug Sibedil</h1>

        <div class="row">
            <!-- Form diperlebar dari s12 m8 l6 menjadi s12 m10 l8 -->
            <div class="col s12 m12 l10 offset-l1">
                <div class="card-panel z-depth-4">
                    <form action="/submit" method="POST" enctype="multipart/form-data" onsubmit="handleSubmit(event)">
    @csrf

    <div class="input-field">
        <input type="text" id="name" name="name" required>
        <label for="name">Nama</label>
    </div>

    <div class="input-field">
        <input type="email" id="email" name="email" required>
        <label for="email">Email</label>
    </div>

    <div class="input-field">
        <input type="number" id="quantity" name="quantity" required min="1" onchange="calculateTotal()">
        <label for="quantity">Jumlah Tiket</label>
    </div>

    <div class="file-field input-field">
        <div class="btn blue darken-4">
            <span>Upload Bukti Transfer</span>
            <input type="file" id="payment_proof" name="payment_proof" accept="image/*" required>
        </div>
        <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Pilih file gambar...">
        </div>
    </div>

    <button type="submit" class="btn waves-effect waves-light btn-custom">Pesan Tiket</button>

    <!-- ✅ Catatan Penting -->
   
        <div class="card-panel yellow lighten-4 z-depth-1" style="border-radius: 6px; margin-top: 14px; padding: 12px 16px;">
    <h6 style="color: #f57f17; margin-bottom: 8px; font-size: 15px;">
        <i class="material-icons left" style="font-size: 18px; margin-right: 6px;">info</i>
        Catatan Penting:
    </h6>
    <ul class="browser-default" style="padding-left: 18px; margin: 0; color: #444; font-size: 13px; line-height: 1.5;">
        <li>Gunakan <strong>nama yang valid</strong> dan <strong>email aktif</strong> saat memesan.</li>
        <li>Cek kembali <strong>harga tiket</strong> sebelum transfer.</li>
        <li>Jika data salah, tiket tidak dapat diproses dan dana tidak dapat dikembalikan.</li>
        <li>Periksa kembali semua informasi atau data sebelum pesan tiket.</li>
    </ul>
</div>


   
</form>

                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="material-icons modal-icon">confirmation_number</i>
                <h4 class="modal-title">Tiket Berhasil Dipesan!</h4>
            </div>
            <div class="modal-body">
                <p class="modal-message">
                    Terima kasih atas pemesanan Anda di <span class="modal-highlight">Curug Sibedil</span>!<br>
                    Permintaan tiket Anda telah diterima dan sedang diproses.
                </p>
                
                <div class="modal-steps">
                    <h6><i class="material-icons tiny">schedule</i> Langkah Selanjutnya:</h6>
                    <ul>
                        <li>Tim kami akan memverifikasi bukti transfer Anda</li>
                        <li>Konfirmasi akan dikirim ke email dalam 1-2 jam</li>
                        <li>E-tiket akan dikirim setelah verifikasi selesai</li>
                    </ul>
                </div>
                
                <p class="modal-message">
                    <strong class="modal-highlight">Mohon periksa email Anda secara berkala</strong> untuk update terbaru mengenai status pemesanan.
                </p>
                
                <button class="close-btn" onclick="closeModal()">
                    <i class="material-icons left tiny">check</i>
                    Mengerti
                </button>
            </div>
        </div>
    </div>

    <!-- Price Modal -->
    <div id="priceModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <i class="material-icons modal-icon">local_offer</i>
                <h4 class="modal-title">Daftar Harga Tiket</h4>
            </div>
            <div class="modal-body">
                <div class="price-list">
                    <h6><i class="material-icons tiny">confirmation_number</i> Harga Tiket Masuk:</h6>
                    <div class="price-item">
                        <span class="price-item-name">Tiket Masuk Dewasa</span>
                        <span class="price-item-price">Rp 15.000</span>
                    </div>
                    <div class="price-item">
                        <span class="price-item-name">Tiket Masuk Anak-anak</span>
                        <span class="price-item-price">Rp 10.000</span>
                    </div>
                </div>
                
                <div class="price-list">
                    <h6><i class="material-icons tiny">local_parking</i> Parkir:</h6>
                    <div class="price-item">
                        <span class="price-item-name">Motor</span>
                        <span class="price-item-price">Rp 5.000</span>
                    </div>
                    <div class="price-item">
                        <span class="price-item-name">Mobil</span>
                        <span class="price-item-price">Rp 10.000</span>
                    </div>
                </div>
                
                <div class="price-list">
                    <h6><i class="material-icons tiny">camera_alt</i> Fasilitas Tambahan:</h6>
                    <div class="price-item">
                        <span class="price-item-name">Spot Foto Premium</span>
                        <span class="price-item-price">Rp 5.000</span>
                    </div>
                    <div class="price-item">
                        <span class="price-item-name">Gazebo</span>
                        <span class="price-item-price">Rp 25.000</span>
                    </div>
                </div>
                
                <button class="close-btn" onclick="closePriceModal()">
                    <i class="material-icons left tiny">close</i>
                    Tutup
                </button>
            </div>
        </div>
    </div>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });

        function calculateTotal() {
            const quantity = document.getElementById('quantity').value;
            const pricePerTicket = 15000;
            const total = quantity * pricePerTicket;
            
            if (quantity && quantity > 0) {
                document.getElementById('total').value = 'Rp ' + total.toLocaleString('id-ID');
            } else {
                document.getElementById('total').value = '';
            }
        }

        function handleSubmit(event) {
            // Mencegah form redirect ke halaman lain
            event.preventDefault();
            
            // Ambil data form
            const formData = new FormData(event.target);
            
            // Kirim data ke server menggunakan AJAX
            fetch('/submit', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (response.ok) {
                    // Jika berhasil, tampilkan modal sukses
                    document.getElementById('successModal').style.display = 'block';
                    
                    // Reset form setelah berhasil submit
                    event.target.reset();
                    
                    // Reset file input label
                    const fileInput = document.querySelector('.file-path');
                    if (fileInput) {
                        fileInput.value = '';
                    }
                    
                    // Reset total harga
                    document.getElementById('total').value = '';
                } else {
                    // Jika gagal, tampilkan pesan error
                    alert('Terjadi kesalahan saat memproses pesanan. Silakan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan jaringan. Silakan coba lagi.');
            });
        }

        function showPriceModal() {
            document.getElementById('priceModal').style.display = 'block';
        }

        function closePriceModal() {
            document.getElementById('priceModal').style.display = 'none';
        }

        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }

        // Tutup modal jika klik di luar modal
        window.onclick = function(event) {
            const successModal = document.getElementById('successModal');
            const priceModal = document.getElementById('priceModal');
            
            if (event.target === successModal) {
                closeModal();
            }
            if (event.target === priceModal) {
                closePriceModal();
            }
        }
    </script>

</body>
</html>