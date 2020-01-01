<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_pemesan = $_POST['nm_pemesan'];
    $testi = $_POST['testi'];
    $foto  = $_POST['foto'];

    $data = mysqli_query($connect, "select ID_TESTI from testimoni ORDER BY ID_TESTI DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $testi_id = $admin_data['ID_TESTI'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_testi = autonumber($testi_id, 3, 2);
    } else {
        $id_testi = 'T001';
    }

    $sql = mysqli_query($connect, "INSERT INTO testimoni (ID_TESTI,NM_PELANGGAN,ISI_TESTI,FOTO) values ('$id_testi','$nm_pemesan','$testi','$foto')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambahkan');document.location.href='index.php?page=testimoni'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');document.location.href='index.php?page=testimoni'</script>";
    }
}
