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
<!-- id trns -->
        <li>
            <label for="ID_TRNS">ID</label>
            <input type="text" name="ID_TRNS" id="ID_TRNS" value="<?=$idtrns;?>" disabled>
        </li>
        <br>

<!-- id pemesan -->
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

<!-- jumlah anggota -->
        <!-- <li>
            <label for="JMLH_ANGGOTA">Jumlah Anggota</label>
            <select>
                    <?php
                    $query = "SELECT * FROM pemesan ORDER BY TGL_PSN DESC";
                    $hasil = mysqli_query($connect, $query);
                    while ($tabel = mysqli_fetch_assoc($hasil)){
                        echo '<option name="JMLH_ANGGOTA" value="'.$tabel["JMLH_ANGGOTA"].'">'.$tabel["JMLH_ANGGOTA"].'</option>';
                    }
                    // pake jquery
                    ?>
            </select>
        </li> 
        <br>-->
        
<!-- id paket -->
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

<!-- id armada -->
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

<!-- nama hotel -->
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

<!-- tanggal pesan -->
        <!-- <li>
            <label for="TGL_PSN">Tanggal Pesan</label>
            <select>
                    <?php
                    $query = "SELECT DATE_FORMAT( TGL_PSN, '%d-%m-%Y' ) AS TGL_PSN FROM pemesan ORDER BY TGL_PSN DESC ";
                    $hasil = mysqli_query($connect, $query);
                    while ($tabel = mysqli_fetch_assoc($hasil)){
                        echo '<option>'.$tabel["TGL_PSN"].'</option>';
                    }
                    //pake jquery
                    ?>
            </select>
             INSERT INTO tanggal VALUES (STR_TO_DATE ('13-07-2013', '%d-%m-%Y'))
        </li> 
        <br>-->
        
<!-- tanggal berangkat -->
        
        <li>
            <label for="TGL_BRKT">Tanggal Berangkat</label>
            <input type="date" name="TGL_BRKT" id="TGL_BRKT">
        </li>
        <br>
        <li>
            <label for="TMPT_JPT">Tempat Jemput</label>
            <input type="text" name="TMPT_JPT" id="TMPT_JPT">
        </li>
        <br>
        <li>
            <label for="HARGA">Harga</label>
            <input type="text" name="HARGA" id="HARGA" onkeypress="return event.charCode >= 48 && event.charCode <=57">
        </li>
        <br>
        <li>
            <label for="BAYAR">Bayar</label>
            <input type="text" name="BAYAR" id="BAYAR" onkeypress="return event.charCode >= 48 && event.charCode <=57">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">TAMBAH</button>
        </li>
    </ul>
    <br>
        

    </form>
    <!-- <script>
function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
</script>   -->




</body>
</html>