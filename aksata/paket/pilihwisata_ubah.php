<?php
require 'functions.php';
$wst = query("SELECT * FROM wisata ORDER BY ID_WST ASC");
$rm  = query("SELECT * FROM rm ORDER BY ID_RM ASC");
$gt_pkt = $_GET["ID_PKT"];
$nmpkt = $_GET["NM_PKT"];

if( isset($_POST["submit"]) ) {
    if(ubahpilihwisata($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'pilihwisata.php?ID_PKT=$gt_pkt&NM_PKT=$nmpkt';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambahkan');
            document.location.href = 'pilihwisata_ubah.php?ID_PKT=$gt_pkt&NM_PKT=$nmpkt';
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
<h1>atur sendiri paket liburanmu!</h1>

<br>
<br>
<form action="" method="post">
<label for="NM_PKT"><?= $nmpkt; ?></label>
<label for="ID_PKT"><?= $gt_pkt; ?></label>
<input type="hidden" name="ID_PKT" value="<?= $gt_pkt; ?>">
<table border="1" cellpadding="10" cellspacing="1">
    <tr>
        <th>Pilih Wisata</th>
        <th>Pilih Rumah Makan</th>
    </tr>

<tr>
    <td>
    <?php foreach( $wst as $wstt ) : 
        $ws =  $wstt["ID_WST"];
        $checked_wst = query("SELECT paket.NM_PKT, wisata.ID_WST, wisata.NM_WST FROM pkt_wst, paket, wisata 
                        WHERE pkt_wst.ID_PKT = paket.ID_PKT AND pkt_wst.ID_WST = wisata.ID_WST AND pkt_wst.ID_PKT = '$gt_pkt'");
        ?>
        
        <input type="checkbox" name="ID_WST[]" value="<?=$wstt["ID_WST"];?>" 
            <?php
            foreach($checked_wst as $checked_wstt) :
                
                if ($ws == $checked_wstt["ID_WST"]) {
                    echo "checked";
                }
                endforeach;
            ?> > <?= $wstt["NM_WST"]; ?>
                
                 
        </input>
        <br>
        <br>
    <?php endforeach; ?>
    </td>

    <td>
    <?php foreach( $rm as $rmm ) : 
        $r =  $rmm["ID_RM"];
        $checked_rm = query("SELECT paket.NM_PKT, rm.ID_RM, rm.NM_RM FROM pkt_rm, paket, rm 
                        WHERE pkt_rm.ID_PKT = paket.ID_PKT AND pkt_rm.ID_RM = rm.ID_RM AND pkt_rm.ID_PKT = '$gt_pkt'");
        ?>
        
        <input type="checkbox" name="ID_RM[]" value="<?=$rmm["ID_RM"];?>" 
            <?php
            foreach($checked_rm as $checked_rmm) :
                
                if ($r == $checked_rmm["ID_RM"]) {
                    echo "checked";
                }
                endforeach;
            ?> > <?= $rmm["NM_RM"]; ?>
                
                 
        </input>
        <br>
        <br>
    <?php endforeach; ?>
    </td>

</tr>
</table>
<button type="submit" name="submit">UBAH</button>
</form>
</body>
</html>