<?php
// require 'index.php';
require 'functions.php';
$nm = $_GET["DTL_PEMESAN"];
$idps = $_GET["ID_PEMESAN"];
$ang = $_GET["JMLH_ANGGOTA"];

if (hapusdtlpsn($nm) > 0 ){
    echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = 'detailpemesan.php?JMLH_ANGGOTA=$ang&ID_PEMESAN=$idps';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal dihapus');
                document.location.href = 'detailpemesan.php?JMLH_ANGGOTA=$ang&ID_PEMESAN=$idps';
            </script>
            ";
}


?>