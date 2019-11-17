<?php
require 'koneksi.php';
$nm = $_GET["NM_WST"];

function hapus($nm) {
    global $connect;
    mysqli_query($connect, "DELETE FROM wisata WHERE NM_WST = $nm");
}

?>