<?php
require 'functions.php';
$trns = query("SELECT transaksi.ID_TRNS, 
                    -- transaksi.ID_PEMESAN, 
                    pemesan.NM_PEMESAN, 
                    pemesan.JMLH_ANGGOTA, 
                    -- transaksi.ID_PKT, 
                    paket.NM_PKT, 
                    pemesan.TGL_PSN, 
                    transaksi.TGL_BRKT, 
                    transaksi.TMPT_JPT, 
                    -- transaksi.ID_ARM, 
                    armada.NM_ARM, 
                    -- transaksi.ID_HOTEL, 
                    hotel.NM_HOTEL,
                    transaksi.HARGA,
                    transaksi.BAYAR,
                    transaksi.STATUS_BAYAR
                    FROM (((transaksi INNER JOIN paket ON transaksi.ID_PKT = paket.ID_PKT) 
                    INNER JOIN pemesan ON transaksi.ID_PEMESAN = pemesan.ID_PEMESAN) 
                    INNER JOIN armada ON transaksi.ID_ARM = armada.ID_ARM) 
                    INNER JOIN hotel ON transaksi.ID_HOTEL = hotel.ID_HOTEL 
                    ORDER BY transaksi.ID_TRNS DESC");

// tombol search
if(isset($_POST["cari"]) ) {
    $trns = caritrns ($_POST["keyword"]);
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
<h1>Transaksi</h1>

<br>

<form action="" method="post">
<input type="text" name="keyword" size="35" placeholder="masukkan 
keyoword.." autocomplete="off">
<button type="submit" name="cari">Cari</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing="1">
    <tr>
        <th>No.</th>
        <!-- <th>ID_PEMESAN</th> -->
        <th>Nama Pemesan</th>
        <th>Anggota</th>
        <!-- <th>ID_PKT</th> -->
        <th>Paket</th>
        <th>Pesan</th>
        <th>Berangkat</th>
        <th>Tempat</th>
        <!-- <th>ID_ARM</th> -->
        <th>Armada</th>
        <!-- <th>ID_HOTEL</th> -->
        <th>Hotel</th>
        <th>Harga</th>
        <th>Bayar</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach( $trns as $trans ) : ?>
    <tr>
        <td> <?= $i; ?> </td>
        <!-- <td> <?= $trans["ID_TRNS"]; ?> </td> -->
        <!-- <td> <?= $trans["ID_PEMESAN"]; ?> </td> -->
        <td> <?= $trans["NM_PEMESAN"]; ?> </td>
        <td> <?= $trans["JMLH_ANGGOTA"]; ?> <a href="anggota.php">detail</a></td>
        <!-- <td> <?= $trans["ID_PKT"]; ?> </td> -->
        <td> <?= $trans["NM_PKT"]; ?> <a href="detailpaket.php">detail</a></td>
        <td> <?= $trans["TGL_PSN"]; ?> </td>
        <td> <?= $trans["TGL_BRKT"]; ?> </td>
        <td> <?= $trans["TMPT_JPT"]; ?> </td>
        <!-- <td> <?= $trans["ID_ARM"]; ?> </td> -->
        <td> <?= $trans["NM_ARM"]; ?> </td>
        <!-- <td> <?= $trans["ID_HOTEL"]; ?> </td> -->
        <td> <?= $trans["NM_HOTEL"]; ?> </td>
        <td> <?= $trans["HARGA"]; ?></td>
        <td> <?= $trans["BAYAR"]; ?> </td>
        <td> <?= $trans["STATUS_BAYAR"]; ?> </td>
        <td>
            <a href="ubah.php?ID_RM=<?=$trans["ID_RM"];?>">Ubah</a>
            <a href="hapus.php?ID_TRNS=<?=$trans["ID_TRNS"];?>">Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<br>
<a href="tambah.php">Tambah</a>

</body>
</html>