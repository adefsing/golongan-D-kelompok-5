<?php


if (isset($_POST["submit"])) {
    if (tambahpkt($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'pilihwisata_tambah.php?NM_PKT=" . $_POST['NM_PKT'] . "&ID_PKT=" . $_POST['ID_PKT'] . "';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'tambah.php';
            </script>
            ";
    }
}
