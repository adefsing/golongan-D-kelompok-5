<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_pemesan = $_POST['nm_pemsan'];
    $jml = $_POST['jml'];
    $nik  = $_POST['nik'];
    $tgl  = $_POST['tgl'];

    $data = mysqli_query($connect, "select ID_PEMESAN from pemesan ORDER BY ID_PEMESAN DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $cust_id = $admin_data['ID_PEMESAN'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_pemesan = autonumber($cust_id, 3, 2);
    } else {
        $id_pemesan = 'psn01';
    }

    $sql = mysqli_query($connect, "INSERT INTO pemesan (ID_PEMESAN,NM_PEMESAN,JMLH_ANGGOTA,TGL_PSN) 
    values ('$id_pemesan','$nm_pemesan','$jml','$tgl')");

    if ($sql) {
        echo "<script>alert('Data Berhasil Di Inputkan');document.location.href='index.php?page=customer'</script>";
    } else {
        echo "<script>alert('Data Gagal Dimasukkan');document.location.href='index.php?page=customer'</script>";
    }
}
