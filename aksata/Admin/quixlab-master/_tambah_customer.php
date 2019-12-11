<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_customer = $_POST['nm_customer'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $data = mysqli_query($connect, "select ID_CUST from customer ORDER BY ID_CUST DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $cust_id = $admin_data['ID_CUST'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_cust = autonumber($cust_id, 1, 2);
    } else {
        $id_cust = 'c01';
    }

    $sql = mysqli_query($connect, "INSERT INTO customer (ID_CUST,NAMA_CUST,ALAMAT_CUST,TLP_CUST) values ('$id_cust','$nm_customer','$alamat','$tlp')");

    if ($sql) {
        echo "<script>alert('Data Berhasil Di Inputkan');document.location.href='index.php?page=customer'</script>";
    } else {
        echo "<script>alert('Data Gagal Dimasukkan');document.location.href='index.php?page=customer'</script>";
    }
}
