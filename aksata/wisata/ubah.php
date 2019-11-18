<?php
require 'functions.php';

// ambil data di URL
$id = $_GET["ID_WST"];
$ubah = query ("SELECT * FROM wisata WHERE ID_WST = '$id'")[0];
// var_dump($ubah); 

// cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil diubah atau tidak
        if(ubahwst($_POST) > 0) {
            echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'ubah.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubah.php';
            </script>
            ";
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
    <input type="hidden" name="ID_WST" value="<?= $ubah["ID_WST"]; ?>">
    <ul>
        <li>
            <label for="NM_WST">Nama Wisata</label>
            <input type="text" name="NM_WST" id="NM_WST" required value="<?= $ubah["NM_WST"]; ?>">
        </li>
        <br>
        <li>
            <label for="ALAMAT_WST">Alamat</label>
            <input type="text" name="ALAMAT_WST" id="ALAMAT_WST" value="<?= $ubah["ALAMAT_WST"]; ?>">
        </li>
        <br>
        <li>
            <label for="TLP_WST">Telepon</label>
            <input type="text" name="TLP_WST" id="TLP_WST" value="<?= $ubah["TLP_WST"]; ?>">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">UBAH</button>
        </li>
    </ul>
        

    </form>

</body>
</html>