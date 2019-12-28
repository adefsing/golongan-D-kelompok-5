<?php
require 'functions.php';
$ps = query("SELECT ID_PEMESAN, 
                    NM_PEMESAN, 
                    JMLH_ANGGOTA,
                    NIK,
                    DATE_FORMAT(TGL_PSN, '%d-%m-%Y') AS TGL_PSN  FROM pemesan ORDER BY TGL_PSN DESC");

// tombol search
if(isset($_POST["cari"]) ) {
    $ps = caripsn ($_POST["keyword"]);
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
<h1>PEMESAN</h1>

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
        <th>Nama</th>
        <th>NIK</th>
        <th>Anggota</th>
        <th>Tanggal Pesan</th>
        <th>Aksi</th>
    </tr>
    <!-- <?php $a ="psn"; ?> -->
    <?php $i = 1; ?>
    <?php foreach( $ps as $rmm ) : ?>
    <tr>
        <td> <?= $i; ?> </td>
        <!-- <td> <?= $rmm["ID_PEMESAN"]; ?> </td> -->
        <td> <?= $rmm["NM_PEMESAN"]; ?> </td>
        <td> <?= $rmm["NIK"]; ?> </td>
        <td> <?= $rmm["JMLH_ANGGOTA"]; ?> 
            <a href="detailpemesan.php?JMLH_ANGGOTA=<?= $rmm["JMLH_ANGGOTA"]; ?>&ID_PEMESAN=<?= $rmm["ID_PEMESAN"]; ?>">a</a>
        </td>
        <td> <?= $rmm["TGL_PSN"]; ?> </td>
        <td>
            <a href="ubah.php?ID_PEMESAN=<?=$rmm["ID_PEMESAN"];?>">Ubah</a>
            <a href="hapus.php?NIK=<?=$rmm["NIK"];?>"  onclick='return confirmation()'>Hapus</a>
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