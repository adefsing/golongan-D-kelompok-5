<?php
require 'functions.php';

// ambil data di URL
if(isset($_GET["ID_ARM"])){
$idar = $_GET["ID_ARM"];
$ubah = query ("SELECT * FROM armada WHERE ID_ARM = '$idar'")[0];
// var_dump($ubah); 

// cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil diubah atau tidak
        if(ubaharm($_POST) > 0) {
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
                document.location.href = 'ubah.php?ID_ARM=".$_POST['ID_ARM']."';
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
    <input type="hidden" name="ID_ARM" value="<?= $ubah["ID_ARM"]; ?>">
    <ul>
        <li>
            <label for="NM_ARM">Nama Wisata</label>
            <input type="text" name="NM_ARM" id="NM_ARM" required value="<?= $ubah["NM_ARM"]; ?>">
        </li>
        <br>
        <li>
            <label for="ALAMAT_ARM">Alamat</label>
            <input type="text" name="ALAMAT_ARM" id="ALAMAT_ARM" value="<?= $ubah["ALAMAT_ARM"]; ?>">
        </li>
        <br>
        <li>
            <label for="TLP_ARM">Telepon</label>
            <input type="text" name="TLP_ARM" id="TLP_ARM" value="<?= $ubah["TLP_ARM"]; ?>">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">UBAH</button>
        </li>
    </ul>
        

    </form>

</body>
</html>