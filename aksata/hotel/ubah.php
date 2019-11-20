<?php
require 'functions.php';

// ambil data di URL
if(isset($_GET["ID_HOTEL"])){
$idh = $_GET["ID_HOTEL"];
$ubah = query ("SELECT * FROM hotel WHERE ID_HOTEL = '$idh'")[0];
// var_dump($ubah); 

// cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil diubah atau tidak
        if(ubahhtl($_POST) > 0) {
            echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubah.php?ID_HOTEL=".$_POST['ID_HOTEL']."';
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
    <h1>ubah Data</h1>
    
    <form action="" method="post">
    <input type="hidden" name="ID_HOTEL" value="<?= $ubah["ID_HOTEL"]; ?>">
    <ul>
        <li>
            <label for="NM_HOTEL">Nama Wisata</label>
            <input type="text" name="NM_HOTEL" id="NM_HOTEL" required value="<?= $ubah["NM_HOTEL"]; ?>">
        </li>
        <br>
        <li>
            <label for="ALAMAT_HOTEL">Alamat</label>
            <input type="text" name="ALAMAT_HOTEL" id="ALAMAT_HOTEL" value="<?= $ubah["ALAMAT_HOTEL"]; ?>">
        </li>
        <br>
        <li>
            <label for="TLP_HOTEL">Telepon</label>
            <input type="text" name="TLP_HOTEL" id="TLP_HOTEL" value="<?= $ubah["TLP_HOTEL"]; ?>">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">UBAH</button>
        </li>
    </ul>
        

    </form>

</body>
</html>