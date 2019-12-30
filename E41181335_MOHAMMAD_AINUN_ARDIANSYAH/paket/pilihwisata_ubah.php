<?php
require 'functions.php';
$wst = query("SELECT * FROM wisata ORDER BY ID_WST ASC");
$rm  = query("SELECT * FROM rm ORDER BY ID_RM ASC");
$gt_pkt = $_GET["ID_PKT"];
$nmpkt = $_GET["NM_PKT"];

// tombol search
if(isset($_POST["cari"]) ) {
    $rm = carirm ($_POST["keyword"]);
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

<form action="" method="post">
<input type="text" name="keyword" size="35" placeholder="masukkan 
keyoword.." autocomplete="off">
<button type="submit" name="cari">Cari</button>
</form>

<br>
<label for="NM_PKT"><?= $nmpkt; ?></label>
<label for="ID_PKT"><?= $idpkt; ?></label>
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

</body>
</html>