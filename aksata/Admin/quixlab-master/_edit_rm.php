<?php
include "../../koneksi.php";
if (isset($_POST['Esubmit'])) {

    $id = $_GET['id'];
    $nm_rm = $_POST['nm_rm'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $sql = mysqli_query($connect, "UPDATE rm SET  NM_RM = '$nm_rm' ,ALAMAT_RM = '$alamat',TLP_RM = '$tlp' WHERE ID_RM = '$id'");

    if ($sql) {
        echo "<script>alert('Data Rumah Makan Berhasil Di Ubah');document.location.href='index.php?page=rm'</script>";
    } else {
        echo "<script>alert('Data Gagal Di Ubah');document.location.href='index.php?page=rm'</script>";
    }
}
