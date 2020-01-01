<?php

    require 'functions.php';

    if( isset($_POST["submit"]) ) {
        if(tambahtrns($_POST) > 0) {
            echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'tambah.php';
            </script>
            ";
        }
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
    <h1>Tambah Data</h1>
    <br>
    <br>

    <form action="" method="post">
    <ul>
        <li>
            <label for="ID_PEMESAN">Nama Pemesan</label>
            <select name="ID_PEMESAN" id="ID_PEMESAN">
                <?php
                    $query = "SELECT * FROM pemesan ORDER BY TGL_PSN DESC";
                    $hasil = mysqli_query($connect, $query);
                    $jumlah = mysqli_num_rows($hasil);
                    $urut = 0;
                    while ($row = mysqli_fetch_array($hasil)){?>
                        <option name="ID_PEMESAN" value="<?= $row["ID_PEMESAN"]; ?>">
                            <?= $row["NM_PEMESAN"]; ?>
                        </option>
                <?php } ?>                    
            </select>
        </li>
        <br>
        
        <li>
            <label for="ID_PKT">Paket</label>
            <select name="ID_PKT" id="ID_PKT">
                <?php
                    $query = "SELECT * FROM paket ORDER BY ID_PKT ASC";
                    $hasil = mysqli_query($connect, $query);
                    $jumlah = mysqli_num_rows($hasil);
                    $urut = 0;
                    while ($row = mysqli_fetch_array($hasil)){?>
                        <option name="ID_PKT" value="<?= $row["ID_PKT"]; ?>">
                            <?= $row["NM_PKT"]; ?>
                        </option>                        
                <?php }?>                    
            </select>
        </li>
        <br>

        <li>
            <label for="ID_ARM">Armada</label>
            <select name="ID_ARM" id="ID_ARM">
                <?php
                    $query = "SELECT * FROM armada";
                    $hasil = mysqli_query($connect, $query);
                    $jumlah = mysqli_num_rows($hasil);
                    $urut = 0;
                    while ($row = mysqli_fetch_array($hasil)){?>
                        <option name="ID_ARM" value="<?= $row["ID_ARM"]; ?>">
                            <?= $row["NM_ARM"]; ?>
                        </option>
                <?php } ?>
            </select>        
        </li>
        <br>

        <li>
            <label for="ID_HOTEL">Hotel</label>
            <select name="ID_HOTEL" id="ID_HOTEL">
                <?php
                    $query = "SELECT * FROM hotel";
                    $hasil = mysqli_query($connect, $query);
                    $jumlah = mysqli_num_rows($hasil);
                    $urut = 0;
                    while ($row = mysqli_fetch_assoc($hasil)){?>
                        <option name="ID_HOTEL" value="<?= $row["ID_HOTEL"]; ?>">
                            <?= $row["NM_HOTEL"]; ?>
                    </option>
                <?php } ?>
            </select>
        </li>
        <br>
        
        <li>
            <label for="TGL_PELAKSANAAN">Tanggal Pelaksanaan</label>
            <input type="text" name="TGL_PELAKSANAAN" id="TGL_PELAKSANAAN" autocomplete="off" required title="isikan tanggal awal sampai akhir keberangkatan">
        </li>
        <br>
        <li>
            <label for="TMPT_JPT">Tempat Jemput</label>
            <input type="text" name="TMPT_JPT" id="TMPT_JPT" autocomplete="off" required>
        </li>
        <br>
        <li>
            <label for="HARGA">Harga</label>
            <input type="text" name="HARGA" id="HARGA" autocomplete="off" required title="isikan hanya angka" onkeypress="return event.charCode >= 48 && event.charCode <=57">
        </li>
        <br>
        <li>
            <label for="BAYAR">Bayar</label>
            <input type="text" name="BAYAR" id="BAYAR" autocomplete="off" required title="isikan hanya angka" onkeypress="return event.charCode >= 48 && event.charCode <=57">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">TAMBAH</button>
        </li>
    </ul>
    <br>
        

    </form>
</body>
</html>