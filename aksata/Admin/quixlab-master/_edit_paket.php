<?php
include "../../koneksi.php";
if (isset($_POST['Esubmit'])) {

    $id = $_GET['id'];
    $nm_paket = $_POST['nm_paket'];


    $sql = mysqli_query($connect, "UPDATE paket SET  NM_PKT = '$nm_paket' WHERE ID_PKT = '$id'");

    if ($sql) {
        echo "<script>alert('Data berhasil diubah');document.location.href='index.php?page=paket'</script>";
    } else {
        echo "<script>alert('Data gagal diubah');document.location.href='index.php?page=paket'</script>";
    }
}
