<?php
ob_start();
$id = $_GET['id'];
$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$id_pemesan = $_GET['ID_PEMESAN'];
$jmla = $_GET['JMLH_ANGGOTA'];
$tanggal = $_GET['TGL_PELAKSANAAN'];
$nmpkt = $_GET['NM_PKT'];
$id_trans = $_GET['ID_TRANS'];
$nmpms = $_GET['NM_PEMESAN'];
$harga = $_GET['HARGA'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>INVOICE <?= $id_pemesan ?></title>
    <link rel="stylesheet" href="css/report_css.css" media="all" />
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="images/logoa.png">
        </div>
        <h1>INVOICE</h1>
        <div id="company" class="clearfix">
            PT. AKSATA DILAS JAYA<br /> JL. Sumatra 21,<br /> Jember,<br /> Tlp/Fax (0331) 5442678 <br />
            <a href="mailto:adjaduasatu@gmail.com">adjaduasatu@gmail.com</a>
        </div>
        <div id="project">
            <div><span>ADMIN</span> <?php echo $id ?></div>
            <div><span>Event Org</span> PT. AKSATA TOUR & TRAVEL</div>
            <div><span>PEMESAN</span> <?php echo $nmpms ?></div>
            <div><span>JUMLAH PESERTA</span> <?php echo $jmla ?></div>
            <div><span>TANGGAL_PELAKSANAAN</span> <?php echo $tanggal; ?></div>
        </div>
    </header>
    <main>
        <table>
            <thead>

                <tr>
                    <th class="no">NO</th>
                    <th class="th">JENIS LAYANAN <br />WISATA</th>
                    <th class="th">HARGA LAYANAN <br />WISATA PER UNIT</th>
                    <th>JUMLAH <br />PEMAKAIAN</th>
                    <th>JUMLAH <br />UNIT</th>
                    <th class="th">&nbsp; &nbsp;JUMLAH TOTAL &nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../../koneksi.php";
                $bagi = $harga / $jmla;
                $no = 1;

                ?>
                <tr>
                    <td class=" no"><?php echo $no; ?></td>
                    <td><?= $nmpkt ?></td>
                    <td>Rp <?= number_format($bagi, 0, ".", "."); ?></td>
                    <td>1</td>
                    <td><?= $jmla ?></td>
                    <td>Rp <?= number_format($harga, 0, ".", "."); ?></td>
                </tr>
                <tr>
                    <td colspan="5" class="grand total">GRAND TOTAL</td>
                    <td class="grand total">Rp <?= number_format($harga, 0, ".", "."); ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td style="background-color: white;" colspan="3" width="50%" class="hi">
                        <b> TOUR DEPT</b><br />Tanggal : <?php echo $date->format('d F Y '); ?>
                        <br /><br /><br /><br /><br /><br /><br /><b>HARIADI,SE,SPd,MSi</b>
                    </td>
                    <td style="background-color: white;" colspan="3" width="50%" class="hi">
                        <b>PEMESAN</b><br />
                        <br /><br /><br /><br /><br /><br /><br />
                        <b><?php echo $nmpms ?></b> </td>
                </tr>
            </tfoot>
        </table>
        <div id=" notices ">
            <div>NOTICE:</div>
            <div class=" notice ">Jangan Sampai Hilang, Simpan Sebagai Barang Bukti.
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
$dompdf->set_paper('A4');
$dompdf->set_option('defaultMediaType', 'all');
$dompdf->set_option('isFontSubsettingEnabled', true);
$dompdf->render();
$dompdf->stream("INVOICE-$id_pemesan-pdf");
?>