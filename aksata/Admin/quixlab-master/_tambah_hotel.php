<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_hotel = $_POST['nm_hotel'];
    $id_paket = $_POST['id_paket'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $data = mysqli_query($connect, "select ID_HOTEL from hotel ORDER BY ID_HOTEL DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $HL_id = $admin_data['ID_HOTEL'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_HL = autonumber($HL_id, 2, 3);
    } else {
        $id_HL = 'htl01';
    }

    $sql = mysqli_query($connect, "INSERT INTO hotel (ID_HOTEL,ID_PKT,NM_HOTEL,ALAMAT_HOTEL,TLP_HOTEL) values ('$id_HL','$id_paket','$nm_hotel','$alamat','$tlp')");

    if ($sql) {
        echo "<script>alert('Data Berhasil Di Inputkan');document.location.href='index.php?page=hotel'</script>";
    } else {
        echo "<script>alert('Data Gagal Dimasukkan');document.location.href='index.php?page=hotel'</script>";
    }
}
