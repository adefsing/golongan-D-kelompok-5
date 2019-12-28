<?php

    require 'functions.php';
    if(isset($_GET["ID_PEMESAN"])){
    $idps = $_GET["ID_PEMESAN"];
    $ang = $_GET["JMLH_ANGGOTA"];

    $dtl = query("SELECT * FROM dtl_pemesan WHERE ID_PEMESAN = '$idps'");
    $baru = query("SELECT COUNT(*) AS bauk FROM dtl_pemesan WHERE ID_PEMESAN = '$idps'");
    foreach( $baru as $barupss ) :
    $jumlah = $barupss["bauk"];
    endforeach;
    }

    if( isset($_POST["submit"]) ) {
        if(tambahdtlpsn($_POST) > 0) {
            echo "
            <script>
                document.location.href = 'detailpemesan.php?JMLH_ANGGOTA=$ang&ID_PEMESAN=$idps';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'detailpemesan.php?JMLH_ANGGOTA=$ang&ID_PEMESAN=$idps';
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
    <h1>tambah nama anggota</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="NM_ANGGOTA">Nama Pemesan</label>
                <input type="hidden" name="ID_PEMESAN" value="<?= $idps; ?>">
                <input type="text" name="NM_ANGGOTA" id="NM_ANGGOTA" autocomplete="off" autofocus pattern="^[A-Za-z -]+$" title="masukkan hanya huruf">
            </li>
            <li>
                <button type="submit" name="submit" <?php if($jumlah >= $ang){ echo "disabled"; } ?>>TAMBAH</button>
            </li>
        </ul>
    </form>

    <table border="1" cellpadding="10" cellspacing="1">
        <tr>
        <th>Nomor</th>
        <th>Nama Anggota</th>
        <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $dtl as $idpss ) : ?>
        <tr>
        <td> <?= $i; ?> </td>
        <td> <?= $idpss["NM_ANGGOTA"]; ?> </td>
        <td>
        <a href="ubahdetail.php?DTL_PEMESAN=<?=$idpss["DTL_PEMESAN"];?>&ID_PEMESAN=<?=$idps;?>">ubah</a>
        <a href="hapusdetail.php?DTL_PEMESAN=<?=$idpss["DTL_PEMESAN"];?>&ID_PEMESAN=<?=$idps;?>&JMLH_ANGGOTA=<?= $ang; ?>">hapus</a>
        </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>