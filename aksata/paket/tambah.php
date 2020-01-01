<?php

    require 'functions.php';

    if( isset($_POST["submit"]) ) {
        if(tambahpkt($_POST) > 0) {
            echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'pilihwisata_tambah.php?NM_PKT=".$_POST['NM_PKT']."&ID_PKT=".$_POST['ID_PKT']."';
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
    <input type="hidden" name="ID_PKT" id="ID_PKT" value="<?=$idpkt;?>">
    <ul>
        <li>
            <label for="NM_PKT">Nama Paket</label>
            <input type="text" name="NM_PKT" id="NM_PKT" required autocomplete="off">
        </li>
        <br>
        
        <li>
            <button type="submit" name="submit">TAMBAH</button>
        </li>
    </ul>
        

    </form>
</body>
</html>