<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nm = $_POST['name'];
    $email = $_POST['email'];
    $pesan = $_POST['message'];
    $tanggal = $_POST['time'];
    $data = mysqli_query($connect, "select * from inbox ORDER BY id_inbox DESC LIMIT 1");
    while ($produk_data = mysqli_fetch_array($data)) {
        $prd_id = $produk_data['id_inbox'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_inbox = autonumber($prd_id, 4, 3);
    } else {
        $id_inbox = 'INBX001';
    }
    // Proses simpan ke Database
    $sql = mysqli_query($connect, "INSERT INTO `inbox` (`id_inbox`, `nama`, `email`, `pesan`,`tanggal`,`status`) VALUES ('$id_inbox', '$nm', '$email', '$pesan','$tanggal', 1);"); // Eksekusi/ Jalankan query dari variabel $query
    if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
        // Jika Sukses, Lakukan :
        echo "<script>alert('Data Berhasil Disimpan');document.location.href='index.php'</script>\n"; // Redirect ke halaman admin.php
    } else {
        // Jika Gagal, Lakukan :
        echo "<script>alert('Data gagal Disimpan);document.location.href='index.php'</script>\n";
    }
}
