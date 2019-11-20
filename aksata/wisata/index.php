<?php
require 'functions.php';
$wisata = query("SELECT * FROM wisata");

// tombol search
if(isset($_POST["cari"])){
    $wisata = cari($_POST["keyword"]);
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
<h1>wisata</h1>

<br>

<form action="" method="post">
<input type="text" name="keyword" size="35" placeholder="masukkan 
keyoword.." autocomplete="off">
<button type="submit" name="cari">Cari</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing="1">
    <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    <?php $a ="wst"; ?>
    <?php $i = 1; ?>
    <?php foreach( $wisata as $wst ) : ?>
    <tr>
        <td> <?= $a.$i; ?> </td>
        <td> <?= $wst["NM_WST"]; ?> </td>
        <td> <?= $wst["ALAMAT_WST"]; ?> </td>
        <td> <?= $wst["TLP_WST"]; ?> </td>
        <td>
            <a href="ubah.php?ID_WST=<?=$wst["ID_WST"];?>">Ubah</a>
            <a href="hapus.php?NM_WST=<?=$wst["NM_WST"];?>">Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<br>
<a href="tambah.php">Tambah</a>

</body>
</html>