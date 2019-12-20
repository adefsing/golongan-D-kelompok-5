<?php

    require 'functions.php';

    if( isset($_POST["submit"]) ) {
        if(tambahrm($_POST) > 0) {
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
            <label for="NM_RM">Nama Rumah Makan</label>
            <input type="text" name="NM_RM" id="NM_RM" required autocomplete="off">
        </li>
        <br>
        <li>
            <label for="ALAMAT_RM">Alamat</label>
            <input type="text" name="ALAMAT_RM" id="ALAMAT_RM" autocomplete="off">
        </li>
        <br>
        <li>
            <label for="TLP_RM">Telepon</label>
            <input type="text" name="TLP_RM" id="TLP_RM" max = "13" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="off">
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