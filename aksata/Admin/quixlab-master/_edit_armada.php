<?php
include "../../koneksi.php";


$id = $_GET['id'];
$nm_armada = $_POST['nm_armada'];
$alamat = $_POST['alamat'];
$tlp  = $_POST['tlp'];

$sql = mysqli_query($connect, "UPDATE armada SET  NM_ARM = '$nm_armada' ,ALAMAT_ARM = '$alamat',TLP_ARM = '$tlp' WHERE ID_ARM = '$id'");

if ($sql) {
    echo "<script>alert('Data berhasil diubah');document.location.href='index.php?page=armada'</script>";
} else {
    echo "<script>alert('Data Gagal diubah');document.location.href='index.php?page=armada'</script>";
}
