<?php
require 'functions.php';

// ambil data di URL
if(isset($_GET["DTL_PEMESAN"])){
$id = $_GET["ID_PEMESAN"];
$dtlpsn = $_GET["DTL_PEMESAN"];
$ubah = query("SELECT * FROM dtl_pemesan WHERE DTL_PEMESAN = '$dtlpsn'")[0];
$uubah = query("SELECT JMLH_ANGGOTA FROM pemesan WHERE ID_PEMESAN = '$id'");

foreach( $uubah as $uubh ) :
    $ang = $uubh["JMLH_ANGGOTA"];
    endforeach;
// var_dump($ubah); 

// cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil diubah atau tidak
        if(ubahdtlpsn($_POST) > 0) {
            echo "
            <script>
                document.location.href = 'detailpemesan.php?JMLH_ANGGOTA=$ang&ID_PEMESAN=$id';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubahdetail.php?DTL_PEMESAN=".$_POST['DTL_PEMESAN']."';
            </script>
            ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ubah data nama anggota</h1>
    <form action="" method="post">
    <input type="hidden" name="ID_PEMESAN" value="<?= $ubah["ID_PEMESAN"]; ?>">
    <input type="hidden" name="DTL_PEMESAN" value="<?= $ubah["DTL_PEMESAN"]; ?>">
    <ul>
    <li>
        <label for="NM_ANGGOTA">Nama anggota</label>
        <input type="text" name="NM_ANGGOTA" id="NM_ANGGOTA" required value="<?= $ubah["NM_ANGGOTA"]; ?>">
    </li>
    <li>
        <button type="submit" name="submit">UBAH</button>
    </li>
    </ul>
    </form>
</body>
</html>