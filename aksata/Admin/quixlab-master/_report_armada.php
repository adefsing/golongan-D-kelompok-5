<?php
ob_start();
$id = $_GET['id'];
$date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Data Armada</title>
    <link rel="stylesheet" href="css/report_css.css" media="all" />
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="images/logoa.png">
        </div>
        <h1>LAPORAN DATA ARMADA</h1>
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
                    <th>ID ARMADA</th>
                    <th>NAMA ARMADA</th>
                    <th>ALAMAT ARMADA</th>
                    <th>TLP_ARMADA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "../../koneksi.php";
                $query = "Select * from armada";
                $sql = mysqli_query($connect, $query);
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <tr>
                        <td class="no"><?php echo $no; ?></td>
                        <td><?php echo $data['ID_ARM']; ?></td>
                        <td><?php echo $data['NM_ARM']; ?></td>
                        <td><?php echo $data['ALAMAT_ARM']; ?></td>
                        <td><?php echo $data['TLP_ARM']; ?></td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        aksata tour & travel 2019.
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
$dompdf->stream("laporan-armada-pdf");
?>