<?php 
 
 $gt_pkt = $_GET["ID_PKT"];
 $nmpkt = $_GET["NM_PKT"];

 if (isset($_POST["submit"])) {
 if (ubahpilihwisata($_POST) > 0) {
 echo "
 <script>
     alert('data berhasil ditambahkan');
     document.location.href = 'index.php?page=detailpaket&ID_PKT=$gt_pkt&NM_PKT=$nmpkt';
 </script>
 ";
 } else {
 echo "
 <script>
     alert('data gagal ditambahkan');
     document.location.href = 'index.php?page=detailpaketubah&ID_PKT=$gt_pkt&NM_PKT=$nmpkt';
 </script>
 ";
 }
 }
