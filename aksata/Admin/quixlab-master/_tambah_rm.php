<?php
include "../../koneksi.php";
if (isset($_POST['submit'])) {

    $nm_rm = $_POST['nm_rm'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $data = mysqli_query($connect, "select ID_RM from rm ORDER BY ID_RM DESC LIMIT 1");
    while ($admin_data = mysqli_fetch_array($data)) {
        $rm_id = $admin_data['ID_RM'];
    }

    $row = mysqli_num_rows($data);
    if ($row > 0) {
        $id_rm = autonumber($rm_id, 2, 3);
    } else {
        $id_rm = 'rm001';
    }

    $sql = mysqli_query($connect, "INSERT INTO rm (ID_RM,NM_RM,ALAMAT_RM,TLP_RM) values ('$id_rm','$nm_rm','$alamat','$tlp')");

    if ($sql) {
        echo "<script>alert('Data Berhasil Di Inputkan');document.location.href='index.php?page=rm'</script>";
    } else {
        echo "<script>alert('Data Gagal Dimasukkan');document.location.href='index.php?page=rm'</script>";
    }
}
