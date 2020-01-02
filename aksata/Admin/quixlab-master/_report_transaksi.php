<?php
ob_start();
require 'functions.php';
$id = $_GET['id'];
$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$trns = query("SELECT transaksi.ID_TRNS, 
                    -- transaksi.ID_PEMESAN,
                    pemesan.ID_PEMESAN, 
                    pemesan.NM_PEMESAN, 
                    pemesan.JMLH_ANGGOTA, 
                    transaksi.ID_PKT, 
                    paket.ID_PKT,
                    paket.NM_PKT, 
                    DATE_FORMAT(pemesan.TGL_PSN, '%d-%m-%Y') AS TGL_PSN,
                    transaksi.TGL_PELAKSANAAN, 
                    transaksi.TMPT_JPT, 
                    -- transaksi.ID_ARM, 
                    armada.NM_ARM, 
                    -- transaksi.ID_HOTEL, 
                    hotel.NM_HOTEL,
                    transaksi.HARGA,
                    transaksi.BAYAR,
                    transaksi.STATUS_BAYAR
                    FROM (((transaksi INNER JOIN paket ON transaksi.ID_PKT = paket.ID_PKT) 
                    INNER JOIN pemesan ON transaksi.ID_PEMESAN = pemesan.ID_PEMESAN) 
                    INNER JOIN armada ON transaksi.ID_ARM = armada.ID_ARM) 
                    INNER JOIN hotel ON transaksi.ID_HOTEL = hotel.ID_HOTEL 
                    ORDER BY transaksi.ID_TRNS DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Data Transaksi</title>
    <link rel="stylesheet" href="css/report_css.css" media="all" />
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="images/logoa.png">
        </div>
        <h1>LAPORAN DATA TRANSAKSI</h1>
        <div id="company" class="clearfix">
            PT. AKSATA DILAS JAYA<br /> JL. Sumatra 21,<br /> Jember,<br /> Tlp/Fax (0331) 5442678 <br />
            <a href="mailto:adjaduasatu@gmail.com">adjaduasatu@gmail.com</a>
        </div>
        <div id="project">
            <div><span>ADMIN</span> <?php echo $id ?></div>

            <div><span>DATE</span> <?php echo $date->format('l , d F Y H:ia'); ?></div>
        </div>
    </header>
    <main>
        <table>
            <thead>

                <tr>
                    <th class="no">NO</th>
                    <th>Nama Pemesan</th>
                    <th>Anggota</th>
                    <th>Paket</th>
                    <th>Tanggal Pesan</th>
                    <th>Pelaksanaan</th>
                    <th>Tempat</th>
                    <th>Armada</th>
                    <th>Hotel</th>
                    <th>Harga</th>
                    <th>Bayar</th>

            </thead>
            <tbody>

                <?php $no = 1;
                foreach ($trns as $trans) :
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td> <?= $trans["NM_PEMESAN"]; ?> </td>
                        <td> <?= $trans["JMLH_ANGGOTA"]; ?> </td>
                        <td> <?= $trans["NM_PKT"]; ?> </td>
                        <td> <?= $trans["TGL_PSN"]; ?> </td>
                        <td> <?= $trans["TGL_PELAKSANAAN"]; ?> </td>
                        <td> <?= $trans["TMPT_JPT"]; ?> </td>
                        <td> <?= $trans["NM_ARM"]; ?> </td>
                        <td> <?= $trans["NM_HOTEL"]; ?> </td>
                        <td> <?= $trans["HARGA"]; ?></td>
                        <td> <?= $trans["BAYAR"]; ?> </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Aksata tour & travel 2019.
    </footer>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

include("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html, 'UTF-8');
$dompdf->set_paper('A4', 'landscape');
$dompdf->set_option('defaultMediaType', 'all');
$dompdf->set_option('isFontSubsettingEnabled', true);
$dompdf->render();
$dompdf->stream("laporan-transaksi-pdf");
?>