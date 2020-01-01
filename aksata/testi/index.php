<?php
require 'function.php';
$testi = query("SELECT * FROM testimoni ORDER BY ID_TESTI ASC");

// tombol search
if(isset($_POST["cari"]) ) {
    $testi = caritesti ($_POST["keyword"]);
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
<h1>Testimoni</h1>

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
        <th>Testimoni</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach( $testi as $ts ) : ?>
    <tr>
        <td> <?= $i; ?> </td>
        <td> <?= $ts["NM_PEMESAN"]; ?> </td>
        <td> <?= $ts["ISI_TESTI"]; ?> </td>
        <td> <?= $ts["FOTO"]; ?> </td>
        <td>
            <a href="ubah.php?ID_TESTI=<?=$htl["ID_TESTI"];?>">Ubah</a>
            <a href="hapus.php?NM_PEMESAN=<?=$htl["NM_PEMESAN"];?>">Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<br>
<a href="tambah.php">Tambah</a>

</body>
</html>