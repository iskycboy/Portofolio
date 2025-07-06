<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin</title>

    <!-- Link ke Materialize CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet" />

    <!-- Link ke Google Fonts (Poppins) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0d47a1; /* blue darken-4 */
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container {
            margin-top: 50px;
            flex: 1;
            max-width: 1200px;      /* Lebar maksimal desktop */
            width: 90%;             /* Lebar default, biar gak terlalu melebar */
            margin-left: auto;
            margin-right: auto;
            padding-left: 15px;
            padding-right: 15px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                width: 95%;         /* Lebar container di mobile lebih besar */
                padding-left: 10px;
                padding-right: 10px;
                margin-top: 30px;   /* Margin atas agak lebih kecil di mobile */
            }
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .card-panel {
            background: white;
            padding: 20px;
            border-radius: 12px;
        }
        table.striped > tbody > tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
        table.striped > tbody > tr:nth-child(even) {
            background-color: #ffffff;
        }
        table.striped th {
            color: #1565c0;
            font-weight: 600;
        }
        table.striped td {
            color: #333;
        }
        .badge.green {
            background-color: #43a047;
            color: white;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 12px;
        }
        footer {
            text-align: center;
            padding: 20px;
            color: #ccc;
            font-size: 14px;
        }

        /* Styling untuk gambar bukti transfer */
        img.bukti-transfer {
            max-width: 120px;
            border-radius: 8px;
            margin-top: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        img.bukti-transfer:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        /* Modal styling */
        .modal {
            max-width: 80%;
            max-height: 80%;
            background-color: #1565c0; /* blue darken-3 */
            color: white;
        }

        .modal-content {
            padding: 24px;
            text-align: center;
            background-color: #1565c0; /* blue darken-3 */
            color: white;
        }

        .modal-content h4 {
            color: white;
            margin-bottom: 20px;
        }

        .modal-content img {
            max-width: 100%;
            max-height: 70vh;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            border: 2px solid white;
        }

        .modal-footer {
            text-align: center;
            background-color: #0d47a1; /* blue darken-4 */
        }

        .modal-footer .btn-flat {
            color: white;
            background-color: #1976d2; /* blue darken-2 */
            border-radius: 8px;
            padding: 0 20px;
        }

        .modal-footer .btn-flat:hover {
            background-color: #1565c0; /* blue darken-3 */
        }

        /* Animasi smooth untuk modal */
        .modal.open {
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Loading overlay */
        .image-loading {
            opacity: 0.7;
            pointer-events: none;
        }

        /* Styling untuk material icons */
        @import url('https://fonts.googleapis.com/icon?family=Material+Icons');

        /* Custom styling untuk tombol hapus */
        .btn.red.darken-2 {
            background-color: #d32f2f !important;
            font-size: 14px;
            height: 36px;
            line-height: 36px;
            padding: 0 16px;
        }

        .btn.red.darken-2:hover {
            background-color: #b71c1c !important;
        }

        .btn.red.darken-2 i.material-icons {
            font-size: 16px;
            line-height: inherit;
        }

        /* Input field dalam modal */
        .modal .input-field input {
            color: white;
            border-bottom: 1px solid #ffcdd2;
        }

        .modal .input-field input:focus {
            border-bottom: 1px solid white;
            box-shadow: 0 1px 0 0 white;
        }

        .material-icons {
            font-style: normal !important;
        }

        /* Responsive fix: scroll horizontal untuk tabel */
        .table-wrapper {
            overflow-x: auto;
        }

        /* Responsive tweaks untuk layar kecil */
        @media only screen and (max-width: 600px) {
            table.striped th,
            table.striped td {
                padding: 8px 6px;
                font-size: 12px;
            }
            .btn {
                font-size: 12px;
                padding: 4px 8px;
            }
        }

        /* buat sembunyiin tombol checkbox */
        .bulk-action-buttons {
        display: none;  /* Sembunyikan default */
        margin: 20px 0;
        }

    </style>
</head>

<body>

<nav class="blue darken-4">
    <div class="nav-wrapper container">
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn red darken-2" style="margin-top: 10px;">
                        <i class="material-icons left">logout</i>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="center-align">Dashboard Admin</h1>

    <div class="card-panel z-depth-4">
        
<form action="{{ route('admin.tickets.bulk-action') }}" method="POST"></form>
    @csrf

            <div class="right-align bulk-action-buttons" style="margin: 20px 0; display: none;">
                <button type="submit" name="action" value="approve" class="btn green">Setujui Terpilih</button>
                <button type="submit" name="action" value="delete" class="btn red darken-2" onclick="return confirm('Yakin ingin menghapus tiket yang dipilih?')">Hapus Terpilih</button>
            </div>



            <div class="table-wrapper">
                <table class="striped highlight responsive-table">
                    <thead>
                        <tr>
                            <th>Pilih</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Jumlah Tiket</th>
                            <th>Status Pembayaran</th>
                            <th>Bukti Transfer</th>
                            <th>Aksi</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php foreach ($tickets as $ticket): ?>
                        <tr>
                            <td>
                                <label>
                                    <input type="checkbox" class="ticket-checkbox" name="selected_tickets[]" value="{{ $ticket->id }}" />
                                    <span></span>
                                </label>
                            </td>
                            <td>{{ $ticket->name }}</td>
                            <td>{{ $ticket->email }}</td>
                            <td>{{ $ticket->quantity }}</td>
                            <td>{{ ucfirst($ticket->status) }}</td>
                            <td>
                                @if($ticket->payment_proof)
                                    <img src="/storage/payment_proofs/{{ $ticket->payment_proof }}" 
                                         alt="Bukti Transfer" 
                                         class="bukti-transfer modal-trigger" 
                                         data-target="imageModal"
                                         data-image="/storage/payment_proofs/{{ $ticket->payment_proof }}"
                                         data-name="{{ $ticket->name }}"
                                         title="Klik untuk memperbesar">
                                @else
                                    <span class="red-text">Tidak ada</span>
                                @endif
                            </td>
                            <td>
                                @if(strtolower($ticket->status) === 'lunas')
                                    <span class="badge green">Lunas</span>
                                    <a href="{{ route('tickets.bukti.admin', $ticket->id) }}" class="btn btn-success btn-sm">Bukti</a>
                                @elseif(strtolower($ticket->status) === 'pending')
                                    <a href="{{ route('tickets.updateStatus', $ticket->id) }}" class="btn green">Setujui</a>
                                @else
                                    <span class="red-text">Status tidak diketahui</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('tickets.destroy', $ticket->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn red darken-2">
                                        <i class="material-icons">Hapus</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>

<footer>
    <p>Dashboard Admin &copy; 2023</p>
</footer>

<!-- Modal untuk menampilkan gambar bukti transfer -->
<div id="imageModal" class="modal">
    <div class="modal-content">
        <h4 id="modalTitle"></h4>
        <img id="modalImage" src="" alt="Bukti Transfer" />
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close btn-flat">Tutup</a>
    </div>
</div>

<!-- Script Materialize JS dan inisialisasi modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);

        // Pasang event listener klik untuk semua gambar bukti transfer
        const images = document.querySelectorAll('.bukti-transfer');
        const modalInstance = M.Modal.getInstance(document.getElementById('imageModal'));
        const modalTitle = document.getElementById('modalTitle');
        const modalImage = document.getElementById('modalImage');

        images.forEach(img => {
            img.addEventListener('click', function () {
                modalTitle.textContent = this.getAttribute('data-name') + " - Bukti Transfer";
                modalImage.src = this.getAttribute('data-image');
                modalInstance.open();
            });
        });
    });
    
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const bulkActionButtons = document.querySelector('.bulk-action-buttons');
    const checkboxes = document.querySelectorAll('.ticket-checkbox');

    function toggleBulkButtons() {
        const anyChecked = Array.from(checkboxes).some(chk => chk.checked);
        bulkActionButtons.style.display = anyChecked ? 'block' : 'none';
    }

    // Cek pas halaman pertama kali dibuka
    toggleBulkButtons();

    // Cek tiap kali checkbox diklik
    checkboxes.forEach(chk => {
        chk.addEventListener('change', toggleBulkButtons);
    });
});
</script>

</body>
</html>
