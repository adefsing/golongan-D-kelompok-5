<?php
require 'functions.php';
$rm = query("SELECT * FROM rm ORDER BY ID_RM ASC");

// tombol search
if(isset($_POST["cari"]) ) {
    $rm = carirm ($_POST["keyword"]);
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
        <th>Id</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Aksi</th>
    </tr>
    <!-- <?php $a ="rm"; ?> -->
    <?php $i = 1; ?>
    <?php foreach( $rm as $rmm ) : ?>
    <tr>
        <td> <?= $i; ?> </td>
        <td> <?= $rmm["NM_RM"]; ?> </td>
        <td> <?= $rmm["ALAMAT_RM"]; ?> </td>
        <td> <?= $rmm["TLP_RM"]; ?> </td>
        <td>
            <a href="ubah.php?ID_RM=<?=$rmm["ID_RM"];?>">Ubah</a>
            <a href="hapus.php?NM_RM=<?=$rmm["NM_RM"];?>">Hapus</a>
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<br>
<a href="tambah.php">Tambah</a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(".hapus").click(function () {
        var jawab = confirm("Anda Yakin Ingin Menghapus Data?");
        if (jawab === true) {
//            kita set hapus false untuk mencegah duplicate request
            var hapus = false;
            if (!hapus) {
                hapus = true;
                $.post('hapus.php', /*{id: $(this).attr('data-id')},*/
                function (data) {
                    alert(data);
                });
                hapus = false;
            }
        } else {
            return false;
        }
    });
</script>

</body>
</html>