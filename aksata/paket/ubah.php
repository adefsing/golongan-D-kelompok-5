<?php
require 'functions.php';

// ambil data di URL
if(isset($_GET["ID_PKT"])){
$idp = $_GET["ID_PKT"];
$ubah = query ("SELECT * FROM paket WHERE ID_PKT = '$idp'")[0];
// var_dump($ubah); 

// cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil diubah atau tidak
        if(ubahpkt($_POST) > 0) {
            echo "
            <script>
                alert('data berhasil diubah');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'ubah.php?ID_PKT=".$_POST['ID_PKT']."';
            </script>
            ";
        }
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
    <h1>ubah Data</h1>
    
    <form action="" method="post">
    <input type="hidden" name="ID_PKT" value="<?= $ubah["ID_PKT"]; ?>">
    <ul>
        <li>
            <label for="NM_PKT">Nama Paket</label>
            <input type="text" name="NM_PKT" id="NM_PKT" required value="<?= $ubah["NM_PKT"]; ?>" autocomplete="off">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">
            <a onclick='return confirmation()'>UBAH</a>
            </button>
        </li>
    </ul>
        
    </form>

    <script type="text/javascript">
    function confirmation(){
        if (confirm("Anda yakin ingin mengubah data?")){
            location.href='functions.php';
           }
        else {
            return false;
           }
    } 
</script>
</body>
</html>