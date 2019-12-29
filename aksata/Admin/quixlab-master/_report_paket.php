<?php
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Laporan Paket</title>
    <link rel="stylesheet" href="css/report_css.css" media="all" />
</head>

<body>
    <header class="clearfix">
        <div id="logo">
            <img src="images/logoa.png">
        </div>
        <h1>LAPORAN PAKET</h1>
        <div id="company" class="clearfix">
            PT. AKSATA DILAS JAYA<br /> JL. Sumatra 21,<br /> Jember,<br /> Fax (0331) 5442678 <br />
            <a href="mailto:adjaduasatu@gmail.com">adjaduasatu@gmail.com</a>
        </div>
        <div id="project">
            <div><span>PROJECT</span> Website development</div>
            <div><span>CLIENT</span> John Doe</div>
            <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
            <div><span>EMAIL</span> <a href="mailto:john@example.com">john@example.com</a></div>
            <div><span>DATE</span> August 17, 2015</div>
            <div><span>DUE DATE</span> September 17, 2015</div>
        </div>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th class="service">SERVICE</th>
                    <th class="desc">DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>QTY</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="service">Design</td>
                    <td class="desc">Creating a recognizable design solution based on the company's existing visual identity
                    </td>
                    <td class="unit">$40.00</td>
                    <td class="qty">26</td>
                    <td class="total">$1,040.00</td>
                </tr>
                <tr>
                    <td class="service">Development</td>
                    <td class="desc">Developing a Content Management System-based Website</td>
                    <td class="unit">$40.00</td>
                    <td class="qty">80</td>
                    <td class="total">$3,200.00</td>
                </tr>
                <tr>
                    <td class="service">SEO</td>
                    <td class="desc">Optimize the site for search engines (SEO)</td>
                    <td class="unit">$40.00</td>
                    <td class="qty">20</td>
                    <td class="total">$800.00</td>
                </tr>
                <tr>
                    <td class="service">Training</td>
                    <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
                    <td class="unit">$40.00</td>
                    <td class="qty">4</td>
                    <td class="total">$160.00</td>
                </tr>
                <tr>
                    <td class="service">Design</td>
                    <td class="desc">Creating a recognizable design solution based on the company's existing visual identity
                    </td>
                    <td class="unit">$40.00</td>
                    <td class="qty">26</td>
                    <td class="total">$1,040.00</td>
                </tr>
                <tr>
                    <td class="service">Development</td>
                    <td class="desc">Developing a Content Management System-based Website</td>
                    <td class="unit">$40.00</td>
                    <td class="qty">80</td>
                    <td class="total">$3,200.00</td>
                </tr>
                <tr>
                    <td class="service">SEO</td>
                    <td class="desc">Optimize the site for search engines (SEO)</td>
                    <td class="unit">$40.00</td>
                    <td class="qty">20</td>
                    <td class="total">$800.00</td>
                </tr>
                <tr>
                    <td class="service">Training</td>
                    <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
                    <td class="unit">$40.00</td>
                    <td class="qty">4</td>
                    <td class="total">$160.00</td>
                </tr>
                <tr>
                    <td class="service">Design</td>
                    <td class="desc">Creating a recognizable design solution based on the company's existing visual identity
                    </td>
                    <td class="unit">$40.00</td>
                    <td class="qty">26</td>
                    <td class="total">$1,040.00</td>
                </tr>
                <tr>
                    <td class="service">Development</td>
                    <td class="desc">Developing a Content Management System-based Website</td>
                    <td class="unit">$40.00</td>
                    <td class="qty">80</td>
                    <td class="total">$3,200.00</td>
                </tr>
                <tr>
                    <td class="service">SEO</td>
                    <td class="desc">Optimize the site for search engines (SEO)</td>
                    <td class="unit">$40.00</td>
                    <td class="qty">20</td>
                    <td class="total">$800.00</td>
                </tr>
                <tr>
                    <td class="service">Training</td>
                    <td class="desc">Initial training sessions for staff responsible for uploading web content</td>
                    <td class="unit">$40.00</td>
                    <td class="qty">4</td>
                    <td class="total">$160.00</td>
                </tr>


            </tbody>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
    </main>
    <footer>
        Invoice was created on a computer and is valid without the signature and seal.
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
$dompdf->stream("sample-pdf");
?>