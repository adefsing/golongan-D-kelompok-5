<?php

    require 'functions.php';

    if( isset($_POST["submit"]) ) {
        if(tambahwst($_POST) > 0) {
            echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'tambah.php';
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
    <h1>Tambah Data</h1>

    <form action="" method="post">
    <ul>
        <!-- <li>
            <label for="ID_WST">ID</label>
            <input type="text" name="ID_WST" id="ID_WST" value="<?=$idwst;?>" required disabled>
        </li>
        <br> -->
        <li>
            <label for="NM_WST">Nama Wisata</label>
            <input type="text" name="NM_WST" id="NM_WST" required>
        </li>
        <br>
        <li>
            <label for="ALAMAT_WST">Alamat</label>
            <input type="text" name="ALAMAT_WST" id="ALAMAT_WST">
        </li>
        <br>
        <li>
            <label for="TLP_WST">Telepon</label>
            <input type="text" name="TLP_WST" id="TLP_WST">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">TAMBAH</button>
        </li>
    </ul>
        

    </form>

</body>
</html>