<?php
require 'functions.php';

// ambil data di URL
if(isset($_GET["ID_PEMESAN"])){
$idr = $_GET["ID_PEMESAN"];
$ubah = query ("SELECT * FROM pemesan WHERE ID_PEMESAN = '$idr'")[0];
// var_dump($ubah); 

// cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        // cek apakah data berhasil diubah atau tidak
        if(ubahpsn($_POST) > 0) {
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
                document.location.href = 'ubah.php?ID_PEMESAN=".$_POST['ID_PEMESAN']."';
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
    <input type="hidden" name="ID_PEMESAN" value="<?= $ubah["ID_PEMESAN"]; ?>">
    <ul>
        <li>
            <label for="TGL_PSN">Tanggal Pesan</label>
            <input type="text" name="TGL_PSN" id="TGL_PSN" value="<?= $ubah["TGL_PSN"]; ?>">
        </li>
        <br>
        <li>
            <label for="NM_PEMESAN">Nama Pemesan</label>
            <input type="text" name="NM_PEMESAN" id="NM_PEMESAN" required value="<?= $ubah["NM_PEMESAN"]; ?>">
        </li>
        <br>
        <li>
            <label for="NIK">NIK</label>
            <input type="text" name="NIK" id="NIK" value="<?= $ubah["NIK"]; ?>">
        </li>
        <br>
        <li>
            <label for="JMLH_ANGGOTA">Jumlah Anggota</label>
            <input type="text" name="JMLH_ANGGOTA" id="JMLH_ANGGOTA" value="<?= $ubah["JMLH_ANGGOTA"]; ?>">
        </li>
        <br>
        <li>
            <button type="submit" name="submit">UBAH</button>
        </li>
    </ul>
        

    </form>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(".ubah").click(function () {
        var jawab = confirm("Anda Yakin Ingin Mengubah Data?");
        if (jawab === true) {
//            kita set hapus false untuk mencegah duplicate request
            var hapus = false;
            if (!hapus) {
                hapus = true;
                $.post('ubah.php', /*{id: $(this).attr('data-id')},*/
                function (data) {
                    alert(data);
                });
                hapus = false;
            }
        } else {
            return false;
        }
    });
</script> -->

</body>
</html>