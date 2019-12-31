<?php
include "../../koneksi.php";
if (isset($_POST['Esubmit'])) {

    $id = $_GET['id'];
    $nm_hotel = $_POST['nm_hotel'];
    $alamat = $_POST['alamat'];
    $tlp  = $_POST['tlp'];

    $sql = mysqli_query($connect, "UPDATE hotel SET  NM_HOTEL = '$nm_hotel' ,
                                                    ALAMAT_HOTEL = '$alamat',
                                                    TLP_HOTEL = '$tlp' 
                                                    WHERE ID_HOTEL = '$id'");

    if ($sql) {
        echo "<script>alert('Data berhasil diubah');document.location.href='index.php?page=hotel'</script>";
    } else {
        echo "<script>alert('Data gagal diubah');document.location.href='index.php?page=hotel'</script>";
    }
}
