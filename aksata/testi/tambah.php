<?php

    require 'function.php';

    if( isset($_POST["submit"]) ) {
        if(tambahtesti($_POST) > 0) {
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
    <h1>Tambah Testi</h1>

    <form action="" method="post">
    <ul>
        <!-- <li>
            <label for="ID_WST">ID</label>
            <input type="text" name="ID_WST" id="ID_WST" value="<?=$idwst;?>" required disabled>
        </li>
        <br> -->
        <li>
            <label for="NM_PEMESAN">Nama Pelanggan</label>
            <input type="text" name="NM_PEMESAN" id="NM_PEMESAN" required>
        </li>
        <br>
        <li>
            <label for="ISI_TESTI">Testimoni</label>
            <input type="text" name="ISI_TESTI" id="ISI_TESTI">
        </li>
        <br>
        <li>
            <label for="FOTO">Foto</label>
            <input type="file" name="FOTO" accept="image/*" id="FOTO">
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