<?php
include "../../koneksi.php";


$id = $_GET['id'];
$nm_pemesan = $_POST['nm_pemesan'];
$testi = $_POST['testi'];
$foto  = $_POST['foto'];

$sql = mysqli_query($connect, "UPDATE testimoni SET  NM_PEMESAN = '$nm_pemesan' ,ISI_TESTI= '$testi',FOTO = '$foto' WHERE ID_TESTI = '$id'");

if ($sql) {
    echo "<script>alert('Data berhasil diubah');document.location.href='index.php?page=testi'</script>";
} else {
    echo "<script>alert('Data Gagal diubah');document.location.href='index.php?page=testi'</script>";
}
