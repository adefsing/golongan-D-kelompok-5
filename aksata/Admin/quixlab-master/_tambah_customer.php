<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_pemesan = $_POST['nama_pemesan'];
    $jml = $_POST['jml'];
    $nik  = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $tlp = $_POST["tlp"];
    $tgl  = date('Y-m-d');

    $data = mysqli_query($connect, "SELECT ID_PEMESAN FROM pemesan ORDER BY ID_PEMESAN DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $cust_id = $admin_data['ID_PEMESAN'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_pemesan = autonumber($cust_id, 3, 2);
    } else {
        $id_pemesan = 'psn01';
    }

    $sql = mysqli_query($connect, "INSERT INTO pemesan VALUES ('$id_pemesan', '$nm_pemesan', '$jml', '$nik', '$alamat', '$tlp', '$tgl')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambahkan');document.location.href='index.php?page=customer'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');document.location.href='index.php?page=customer'</script>";
    }
}
