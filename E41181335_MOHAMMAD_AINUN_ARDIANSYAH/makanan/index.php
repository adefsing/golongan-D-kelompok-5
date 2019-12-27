<?php
require 'functions.php';
$rm = query("SELECT * FROM menu");

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
    </tr>
    <?php $i = 1; ?>
    <?php foreach( $rm as $rmm ) : ?>
    <tr>
        <td> <?= $i; ?> </td>
        <td> <?= $rmm["makanan"]; ?> </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>

    <form method="post" action="input.php">		
	<table>
		<tr>
			<td>
				<input type="checkbox" name="makanan[]" value="Nasi Goreng">
			</td>
			<td>
				Nasi Goreng
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="makanan[]" value="Mie Goreng">
			</td>
			<td>
				Mie Goreng
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="makanan[]" value="Bakso">
			</td>
			<td>
				Bakso
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="makanan[]" value="Soto Ayam">
			</td>
			<td>
				Soto Ayam
			</td>
		</tr>
		<tr>
			<td>
				<input type="checkbox" name="makanan[]" value="Sate Padang">
			</td>
			<td>
				Sate Padang
			</td>
		</tr>
		<tr>
			<td>				
			</td>
			<td>
				<input type="submit" value="Input">
			</td>
		</tr>
	</table>
	</form>
</table>
<br>
<a href="tambah.php">Tambah</a>

</body>
</html>