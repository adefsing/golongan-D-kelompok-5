<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_hotel = $_POST['nm_hotel'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $data = mysqli_query($connect, "SELECT ID_HOTEL FROM hotel ORDER BY ID_HOTEL DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $HL_id = $admin_data['ID_HOTEL'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_HL = autonumber($HL_id, 3, 2);
    } else {
        $id_HL = 'htl01';
    }

    $sql = mysqli_query($connect, "INSERT INTO hotel VALUES ('$id_HL','$nm_hotel','$alamat','$tlp')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambahkan');document.location.href='index.php?page=hotel'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');document.location.href='index.php?page=hotel'</script>";
    }
}
