<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_armada = $_POST['nm_armada'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $data = mysqli_query($connect, "select ID_ARM from armada ORDER BY ID_ARM DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $arm_id = $admin_data['ID_ARM'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_arm = autonumber($arm_id, 3, 2);
    } else {
        $id_arm = 'arm01';
    }

    $sql = mysqli_query($connect, "INSERT INTO armada (ID_ARM,NM_ARM,ALAMAT_ARM,TLP_ARM) values ('$id_arm','$nm_armada','$alamat','$tlp')");

    if ($sql) {
        echo "<script>alert('Data Berhasil Di Inputkan');document.location.href='index.php?page=armada'</script>";
    } else {
        echo "<script>alert('Data Gagal Dimasukkan');document.location.href='index.php?page=armada'</script>";
    }
}
