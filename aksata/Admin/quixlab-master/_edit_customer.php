<?php
include "../../koneksi.php";
if (isset($_POST['Esubmit'])) {

    $id = $_GET['ID_PEMESAN'];
    $nm_pemesan = $_POST['NM_PEMESAN'];
    $jmlh_anggota = $_POST['JMLH_ANGGOTA'];
    $nik = $_POST['NIK'];
    $alamat = $_POST['ALAMAT_PEMESAN'];
    $tlp  = $_POST['TLP_PEMESAN'];

    $sql = mysqli_query($connect, "UPDATE pemesan SET NM_PEMESAN  = '$nm_pemesan',
                                                    JMLH_ANGGOTA = '$jmlh_anggota',
                                                    NIK = '$nik',
                                                    ALAMAT_PEMESAN = '$alamat',
                                                    TLP_PEMESAN = '$tlp' WHERE ID_PEMESAN = '$id'");

    if ($sql) {
        echo "<script>alert('Data berhasil diubah');document.location.href='index.php?page=customer'</script>";
    } else {
        echo "<script>alert('Data gagal diubah');document.location.href='index.php?page=customer'</script>";
    }
}
