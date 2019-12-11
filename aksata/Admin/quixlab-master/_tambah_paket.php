<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_paket = $_POST['nm_paket'];
    $harga = $_POST['harga'];
    $rincian  = $_POST['rincian'];

    $data = mysqli_query($connect, "select ID_PKT from paket ORDER BY ID_PKT DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $pkt_id = $admin_data['ID_PKT'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_pkt = autonumber($pkt_id, 3, 3);
    } else {
        $id_pkt = '1';
    }

    $sql = mysqli_query($connect, "INSERT INTO paket (ID_PKT,NM_PKT,HARGA,RINCIAN) values ('$id_pkt','$nm_paket','$harga','$rincian')");

    if ($sql) {
        echo "<script>alert('Data Berhasil Di Inputkan');document.location.href='index.php?page=paket'</script>";
    } else {
        echo "<script>alert('Data Gagal Dimasukkan');document.location.href='index.php?page=paket'</script>";
    }
}
