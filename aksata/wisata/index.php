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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light alert alert-warning">
		<div class="container">
			<a class="navbar-brand" href="#">WISATA</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambah.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>


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
<!-- <a href="tambah.php">Tambah</a> -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>