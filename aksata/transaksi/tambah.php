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
            <label for="ID_TRNS">ID</label>
            <input type="text" name="ID_TRNS" id="ID_TRNS" value="<?=$idtrns;?>" disabled>
        </li>
        <br>
        <!-- <li>
            <label for="ID_TRNS">No.</label>
            <input type="text" name="ID_TRNS" id="ID_TRNS" required disabled>
        </li> -->
        <br>
        <li>
            <label for="NM_PEMESAN">Jumlah Anggota</label>
            <select>
                    <?php
                    $query = "SELECT * FROM pemesan ORDER BY TGL_PSN DESC";
                    $hasil = mysqli_query($connect, $query);
                    while ($tabel = mysqli_fetch_assoc($hasil)){
                        echo '<option>'.$tabel["NM_PEMESAN"].'</option>';
                    }
                    ?>
            </select>
        </li>
        <br>
        <li>
            <label for="JMLH_ANGGOTA">Nama Pemesan</label>
            <select>
                    <?php
                    $query = "SELECT * FROM pemesan ORDER BY TGL_PSN DESC";
                    $hasil = mysqli_query($connect, $query);
                    while ($tabel = mysqli_fetch_assoc($hasil)){
                        echo '<option>'.$tabel["JMLH_ANGGOTA"].'</option>';
                    }
                    ?>
            </select>
        </li>
        <br>
        <li>
            <label for="NM_PKT">Paket</label>
            <select>
                    <?php
                    $query = "SELECT * FROM paket";
                    $hasil = mysqli_query($connect, $query);
                    while ($tabel = mysqli_fetch_assoc($hasil)){
                        echo '<option>'.$tabel["NM_PKT"].'</option>';
                    }
                    ?>
            </select>
        </li>
        <br>
        <li>
            <label for="TGL_PSN">Tanggal Pesan</label>
            <select>
                    <?php
                    $query = "SELECT DATE_FORMAT( TGL_PSN, '%d-%m-%Y' ) AS TGL_PSN FROM pemesan ORDER BY TGL_PSN DESC ";
                    $hasil = mysqli_query($connect, $query);
                    while ($tabel = mysqli_fetch_assoc($hasil)){
                        echo '<option>'.$tabel["TGL_PSN"].'</option>';
                    }
                    ?>
            </select>
            <!-- INSERT INTO tanggal VALUES (STR_TO_DATE ('13-07-2013', '%d-%m-%Y')) -->
        </li>
        <br>
        <li>
            <label for="TGL_BRKT">Tanggal Berangkat</label>
            <input type="date">
           
        </li>
        <br>
        <li>
            <label for="TMPT_JPT">Tempat Jemput</label>
            <input type="text" name="TMPT_JPT" id="TMPT_JPT">
        </li>
        <br>
        <li>
            <label for="HARGA">Harga</label>
            <input type="text" name="HARGA" id="HARGA">
        </li>
        <br>
        <li>
            <label for="BAYAR">Bayar</label>
            <input type="text" name="BAYAR" id="BAYAR">
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