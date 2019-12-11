<?php
include "../../koneksi.php";
if (isset($_POST['Esubmit'])) {

    $id = $_GET['id'];
    $nm_wisata = $_POST['nm_wisata'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $sql = mysqli_query($connect, "UPDATE wisata SET  NM_WST = '$nm_wisata' ,ALAMAT_WST = '$alamat',TLP_WST = '$tlp' WHERE ID_WST = '$id'");

    if ($sql) {
        echo "<script>alert('Data wisata Berhasil Di Ubah');document.location.href='index.php?page=wisata'</script>";
    } else {
        echo "<script>alert('Data Gagal Di Ubah');document.location.href='index.php?page=wisata'</script>";
    }
}
