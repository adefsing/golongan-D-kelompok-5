<?php
require 'functions.php';

// ambil data di URL
if(isset($_GET["ID_RM"])){
$idr = $_GET["ID_RM"];
$ubah = query ("SELECT * FROM rm WHERE ID_RM = '$idr'")[0];
// var_dump($ubah); 

// cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil diubah atau tidak
        if(ubahrm($_POST) > 0) {
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
                document.location.href = 'ubah.php?ID_RM=".$_POST['ID_RM']."';
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
    <input type="hidden" name="ID_RM" value="<?= $ubah["ID_RM"]; ?>">
    <ul>
        <li>
            <label for="NM_RM">Nama Wisata</label>
            <input type="text" name="NM_RM" id="NM_RM" required value="<?= $ubah["NM_RM"]; ?>">
        </li>
        <br>
        <li>
            <label for="ALAMAT_RM">Alamat</label>
            <input type="text" name="ALAMAT_RM" id="ALAMAT_RM" value="<?= $ubah["ALAMAT_RM"]; ?>">
        </li>
        <br>
        <li>
            <label for="TLP_RM">Telepon</label>
            <input type="text" name="TLP_RM" id="TLP_RM" value="<?= $ubah["TLP_RM"]; ?>">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">UBAH</button>
        </li>
    </ul>
        

    </form>

</body>
</html>