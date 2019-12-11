<?php
include "../../koneksi.php";
if (isset($_POST['Esubmit'])) {

    $id = $_GET['id'];
    $nm_hotel = $_POST['nm_hotel'];
    $id_paket = $_POST['id_paket'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $sql = mysqli_query($connect, "UPDATE hotel SET  ID_PKT ='$id_paket' ,NM_HOTEL = '$nm_hotel' ,ALAMAT_HOTEL = '$alamat',TLP_HOTEL = '$tlp' WHERE ID_HOTEL = '$id'");

    if ($sql) {
        echo "<script>alert('Data Hotel Berhasil Di Ubah');document.location.href='index.php?page=hotel'</script>";
    } else {
        echo "<script>alert('Data Gagal Di Ubah');document.location.href='index.php?page=hotel'</script>";
    }
}
