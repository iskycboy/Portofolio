<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['selected']) && isset($_POST['action'])) {
        $selected = $_POST['selected'];
        $action = $_POST['action'];

        // Sambungkan ke database
        include 'koneksi.php'; // atau sesuai file kamu

        if ($action === 'approve') {
            foreach ($selected as $id) {
                mysqli_query($conn, "UPDATE tickets SET status='Disetujui' WHERE id=$id");
            }
        } elseif ($action === 'delete') {
            foreach ($selected as $id) {
                mysqli_query($conn, "DELETE FROM tickets WHERE id=$id");
            }
        }

        header("Location: dashboard.php?msg=sukses");
        exit();
    }
}
?>
