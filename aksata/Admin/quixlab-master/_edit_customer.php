<?php
include "../../koneksi.php";
if (isset($_POST['Esubmit'])) {

    $id = $_GET['id'];
    $nm_customer = $_POST['nm_customer'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $sql = mysqli_query($connect, "UPDATE customer SET  NAMA_CUST = '$nm_customer' ,ALAMAT_CUST = '$alamat',TLP_CUST = '$tlp' WHERE ID_CUST = '$id'");

    if ($sql) {
        echo "<script>alert('Data Customer Berhasil Di Ubah');document.location.href='index.php?page=customer'</script>";
    } else {
        echo "<script>alert('Data Gagal Di Ubah');document.location.href='index.php?page=customer'</script>";
    }
}
