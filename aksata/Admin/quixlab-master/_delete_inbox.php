 <?php

    var_dump($_POST);
    $makanan = $_POST['pilih'];
    $jumlah_dipilih = count($makanan);

    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        mysqli_query($connect, "DELETE FROM inbox WHERE id_inbox='$makanan[$x]'");
    }

    ?>