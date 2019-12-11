<?php

    require 'functions.php';

    if( isset($_POST["submit"]) ) {
        if(tambahpsn($_POST) > 0) {
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

    <form action="" method="post">
    <ul>
        <!-- <li>
            <label for="ID_PEMESAN">ID</label>
            <input type="text" name="ID_PEMESAN" id="ID_PEMESAN" value="<?=$idpsn;?>" required disabled>
        </li>
        <br> -->
        <li>
            <label for="TGL_PSN">Tanggal Pesan</label>
            <input type="text" name="TGL_PSN" id="TGL_PSN" required value="<?= date('Y-m-d');?>" >
        </li>
        <br>
        <li>
            <label for="NM_PEMESAN">Nama Pemesan</label>
            <input type="text" name="NM_PEMESAN" id="NM_PEMESAN" required placeholder ="isikan huruf" onkeypress="return event.charCode = 'a-z'">
        </li>
        <br>
        <li>
            <label for="NIK">NIK</label>
            <input type="text" name="NIK" id="NIK" required max = '1' placeholder="isikan angka" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
        </li>
        <br>
        <li>
            <label for="JMLH_ANGGOTA">Jumlah Anggota</label>
            <input type="text" name="JMLH_ANGGOTA" id="JMLH_ANGGOTA" required placeholder ="isikan angka" onkeypress="return event.charCode >= 48 && event.charCode <=57">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">TAMBAH</button>
        </li>
    </ul>
        

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