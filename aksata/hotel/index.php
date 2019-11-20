<?php
require 'functions.php';
$hotel = query("SELECT * FROM hotel ORDER BY ID_HOTEL ASC");

// tombol search
if(isset($_POST["cari"]) ) {
    $hotel = carihtl ($_POST["keyword"]);
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
<h1>hotel</h1>

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
    <?php $a ="hl"; ?>
    <?php $i = 1; ?>
    <?php foreach( $hotel as $htl ) : ?>
    <tr>
        <td> <?= $a.$i; ?> </td>
        <td> <?= $htl["NM_HOTEL"]; ?> </td>
        <td> <?= $htl["ALAMAT_HOTEL"]; ?> </td>
        <td> <?= $htl["TLP_HOTEL"]; ?> </td>
        <td>
            <a href="ubah.php?ID_HOTEL=<?=$htl["ID_HOTEL"];?>">Ubah</a>
            <a href="hapus.php?NM_HOTEL=<?=$htl["NM_HOTEL"];?>">Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<br>
<a href="tambah.php">Tambah</a>

</body>
</html>