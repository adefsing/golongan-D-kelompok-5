<?php
require 'functions.php';
$data = $_GET["ID_PKT"];

if (hapuspkt($data) > 0 ){
    echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = 'index.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal dihapus');
                document.location.href = 'index.php';
            </script>
            ";
}


?>