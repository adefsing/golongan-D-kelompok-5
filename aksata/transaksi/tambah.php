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

    <form action="" method="post">
    <ul>
        <li>
            <label for="ID_TRNS">ID</label>
            <input type="text" name="ID_TRNS" id="ID_TRNS" value="<?=$idtrns;?>" required disabled>
        </li>
        <br>
        <!-- <li>
            <label for="ID_TRNS">No.</label>
            <input type="text" name="ID_TRNS" id="ID_TRNS" required disabled>
        </li> -->
        <br>
        <li>
            <label for="NM_PEMESAN">Nama Pemesan</label>
            <input type="text" name="NM_PEMESAN" id="NM_PEMESAN">
        </li>
        <br>
        <li>
            <label for="TLP_RM">Telepon</label>
            <input type="text" name="TLP_RM" id="TLP_RM" max = "13" onkeypress="return event.charCode >= 48 && event.charCode <=57">
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