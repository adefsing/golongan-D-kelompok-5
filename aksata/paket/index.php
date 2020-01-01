<?php
require 'functions.php';
$pkt = query("SELECT * FROM paket ORDER BY ID_PKT DESC");

// tombol search
if(isset($_POST["cari"]) ) {
    $pkt = caripkt ($_POST["keyword"]);
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
<h1>rm</h1>

<br>

<form action="" method="post">
<input type="text" name="keyword" size="35" placeholder="masukkan 
keyoword.." autocomplete="off">
<button type="submit" name="cari">Cari</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing="1">
    <tr>
        <th>Nomor</th>
        <th>Paket</th>
        <th>Detail</th>
        <th>Aksi</th>
    </tr>

    <?php $i = 1; ?>
    <?php foreach( $pkt as $pktt ) : ?>
    <tr>
        <td> <?= $i; ?> </td>
        <td> <?= $pktt["NM_PKT"]; ?> </td>
        <td> <a href="pilihwisata.php?ID_PKT=<?=$pktt["ID_PKT"];?>&NM_PKT=<?=$pktt["NM_PKT"];?>">detail</a> </td>
        <td>
            <a href="ubah.php?ID_PKT=<?=$pktt["ID_PKT"];?>">Ubah</a>
            <a href="hapus.php?ID_PKT=<?=$pktt["ID_PKT"];?>" onclick='return confirmation()'>Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<br>
<a href="tambah.php">Tambah</a>

<script type="text/javascript">
    function confirmation(){
        if (confirm("Anda yakin ingin menghapus data?")){
            location.href='hapus.php';
           }
        else {
            return false;
           }
    } 
</script>

</body>
</html>