<?php
require 'functions.php';
$wisata = query("SELECT * FROM wisata ORDER BY ID_WST ASC");

// tombol search
if(isset($_POST["cari"]) ) {
    $wisata = cariwst ($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<header>
        <div class="logo">
        <img src="" alt="logo aksata" width="60%"> 
        </div>
   
    </header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<h1>Wisata</h1>

<br>

<form action="" method="post">
<div class="input-group mb-3">
  <input type="text"  name="keyword" class="form-control" placeholder="Input Keyword..">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="cari">Cari</button>
  </div>
<!-- </div>
<input type="text" name="keyword" size="35" placeholder="masukkan 
keyoword.." autocomplete="off">
<button type="submit" name="cari">Cari</button> -->
</form>

<br>
<div class="container" style="margin-top:20px">
		<h2>Daftar Wisata</h2>
		
		<hr>
		
		<table class="table table-striped table-hover table-sm table-bordered">
			<thead class="thead-dark">
				<tr>
					
					<th>ID</th>
					<th>NAMA WISATA</th>
                    <th>ALAMAT</th>
                    <th>TELEPON</th>
					<th>AKSI</th>
					
				</tr>
			</thead>
			<tbody>

    <?php $a ="wst"; ?>
    <?php $i = 1; ?>
    <?php foreach( $wisata as $wst ) : ?>
    <tr>
        <td> <?= $a.$i; ?> </td>
        <td> <?= $wst["NM_WST"]; ?> </td>
        <td> <?= $wst["ALAMAT_WST"]; ?> </td>
        <td> <?= $wst["TLP_WST"]; ?> </td>
        <td>
        <button type="button" class="btn btn-outline-dark"><a href="ubah.php?ID_WST=<?=$wst["ID_WST"];?>">Ubah</a></button>
        <button type="button" class="btn btn-outline-dark"><a href="hapus.php?NM_WST=<?=$wst["NM_WST"];?>">Hapus</a></button>  
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>
<br>
<a href="tambah.php">Tambah</a>

</body>
</html>