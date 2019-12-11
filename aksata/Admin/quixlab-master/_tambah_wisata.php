<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_wisata = $_POST['nm_wisata'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $data = mysqli_query($connect, "select ID_WST from wisata ORDER BY ID_WST DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $wst_id = $admin_data['ID_WST'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_wst = autonumber($wst_id, 3, 2);
    } else {
        $id_wst = 'wst01';
    }

    $sql = mysqli_query($connect, "INSERT INTO wisata (ID_WST,NM_WST,ALAMAT_WST,TLP_WST) values ('$id_wst','$nm_wisata','$alamat','$tlp')");

    if ($sql) {
        echo "<script>alert('Data Berhasil Di Inputkan');document.location.href='index.php?page=wisata'</script>";
    } else {
        echo "<script>alert('Data Gagal Dimasukkan');document.location.href='index.php?page=wisata'</script>";
    }
}
