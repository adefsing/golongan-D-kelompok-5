<?php
// require 'index.php';
require 'functions.php';
$nm = $_GET["NIK"];

if (hapuspsn($nm) > 0) {
    echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href = '?page=customer';
            </script>
            ";
} else {
    echo "
            <script>
                alert('data gagal dihapus');
                document.location.href = '?page=customer';
            </script>
            ";
}
