<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_rm = $_POST['nm_rm'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $data = mysqli_query($connect, "SELECT ID_RM FROM rm ORDER BY ID_RM DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $rm_id = $admin_data['ID_RM'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_rm = autonumber($rm_id, 2, 2);
    } else {
        $id_rm = 'rm01';
    }

    $sql = mysqli_query($connect, "INSERT INTO rm (ID_RM,NM_RM,ALAMAT_RM,TLP_RM) values ('$id_rm','$nm_rm','$alamat','$tlp')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambahkan');document.location.href='index.php?page=rm'</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');document.location.href='index.php?page=rm'</script>";
    }
}
