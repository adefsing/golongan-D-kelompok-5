<?php
require 'function.php';
if (isset($_POST['submit'])) {


    $nm_pemesan = $_POST['nm_pemesan'];
    $testi = $_POST['testi'];
    $ft  = $_POST['ft'];

    $data = mysqli_query($connect, "select ID_TESTI from testimoni ORDER BY ID_TESTI DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $id_testi = $admin_data['ID_TESTI'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_testi = autonumber($id_testi, 3, 2);
    } else {
        $id_testi = 'tes01';
    }

    $sql = mysqli_query($connect, "INSERT INTO testimoni (ID_TESTI,NM_PEMESAN,ISI_TESTI,FOTO) values ('$id_testi','$nm_pemesan','$testi','$ft')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambahkan');document.location.href='index.php?page=testimoni'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');document.location.href='index.php?page=testimoni'</script>";
    }
}

