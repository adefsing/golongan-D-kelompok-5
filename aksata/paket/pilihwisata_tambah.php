<?php

    require 'functions.php';
    $wst = query("SELECT * FROM wisata ORDER BY ID_WST ASC");
    $rm  = query("SELECT * FROM rm ORDER BY ID_RM ASC");
    $pkt = query("SELECT * FROM paket ORDER BY ID_PKT DESC");
    $gtnm = $_GET["NM_PKT"];
    $gtidpk = $_GET["ID_PKT"];

    if( isset($_POST["submit"]) ) {
        if(tambahpilihwst($_POST) > 0) {
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
    <label for="NM_PKT"><?= $gtnm; ?></label>
    <label for="ID_PKT"><?= $gtidpk; ?></label>
    <input type="hidden" name="ID_PKT" value="<?= $gtidpk; ?>">
    <table border="1" cellpadding="10" cellspacing="1">
    <tr>
        <th>Pilih Wisata</th>
        <th>Pilih Rumah Makan</th>
    </tr>

    <tr>
        <td>
            <?php foreach( $wst as $wstt ) : ?>
            <input type="checkbox" name="ID_WST[]" value="<?= $wstt["ID_WST"]; ?>">
                <?= $wstt["NM_WST"]; ?>
            </input>
            <br><br>
            <?php endforeach; ?>
        </td>
        <td>
        <?php foreach( $rm as $rmm ) : ?>
            <input type="checkbox" name="ID_RM[]" value="<?= $rmm["ID_RM"]; ?>">
                <?= $rmm["NM_RM"]; ?>
            </input>
            <br><br>
        <?php endforeach; ?>
        </td>
    </tr>
    </table>
    <li>
        <button type="submit" name="submit">TAMBAH</button>
    </li>    
    </form>
</body>
</html>