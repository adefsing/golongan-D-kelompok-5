<?php

    require 'functions.php';

    if( isset($_POST["submit"]) ) {
        if(tambaharm($_POST) > 0) {
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
            <label for="ID_WST">ID</label>
            <input type="text" name="ID_WST" id="ID_WST" value="<?=$idwst;?>" required disabled>
        </li>
        <br> -->
        <li>
            <label for="NM_ARM">Nama Armada</label>
            <input type="text" name="NM_ARM" id="NM_ARM" required = "halo">
        </li>
        <br>
        <li>
            <label for="ALAMAT_ARM">Alamat</label>
            <input type="text" name="ALAMAT_ARM" id="ALAMAT_ARM">
        </li>
        <br>
        <li>
            <label for="TLP_ARM">Telepon</label>
            <input type="text" name="TLP_ARM" id="TLP_ARM" max = "13" onkeypress="return event.charCode >= 48 && event.charCode <=57">
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