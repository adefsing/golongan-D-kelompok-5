<?php
// require 'index.php';
require 'functions.php';
$nm = $_GET["ID_TRNS"];

if (hapustrns($nm) > 0) {
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
