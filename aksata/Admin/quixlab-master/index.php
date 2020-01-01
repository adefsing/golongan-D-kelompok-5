<?php
error_reporting(0);
session_start();

include "../../koneksi.php";

$username = $_SESSION['username'];
$password = $_SESSION['password'];
$harga    = mysqli_query($connect, "select SUM(HARGA) AS total from transaksi");
$jmlt     = mysqli_query($connect, "select COUNT(ID_TRNS) AS jmlt from transaksi");
$jmlp     = mysqli_query($connect, "select COUNT(ID_PEMESAN) AS jmlp from pemesan");
$row      = mysqli_fetch_array($harga);
$row2     = mysqli_fetch_array($jmlt);
$row3     = mysqli_fetch_array($jmlp);
$sum      = $row['total'];
$jmltr    = $row2['jmlt'];
$jmlcs    = $row3['jmlp'];

$newm    = mysqli_query($connect, "select count(status) as message from inbox where status like '%1%'");
$cnewm   = mysqli_fetch_array($newm);
$message = $cnewm['message'];

if ($username == "" || $username == NULL || empty($username)) {

    echo "<script>document.location.href='../login.php'</script>\n";
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>AKSATA | Tour & Travel</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
        <!-- Pignose Calender -->
        <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
        <!-- Chartist -->
        <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
        <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
        <link href="./plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
        <!-- Custom Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

    </head>

    <body>

        <!--*******************
        Preloader start
    ********************-->
        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>
        <!--*******************
        Preloader end
    ********************-->


        <!--**********************************
        Main wrapper start
    ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
            Nav header start
        ***********************************-->
            <div class="nav-header">
                <div class="brand-logo">
                    <a href="index.php">
                        <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                        <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                        <span class="brand-title">
                            <img src="images/logo-text.png" alt="">
                        </span>
                    </a>
                </div>
            </div>
            <!--**********************************
            Nav header end
        ***********************************-->

            <!--**********************************
            Header start
        ***********************************-->
            <div class="header">
                <div class="header-content clearfix">

                    <div class="nav-control">
                        <div class="hamburger">
                            <span class="toggle-icon"><i class="icon-menu"></i></span>
                        </div>
                    </div>
                    <div class="header-left">
                        <div class="input-group icons">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                            </div>
                            <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                            <div class="drop-down animated flipInX d-md-none">
                                <form action="#">
                                    <input type="text" class="form-control" placeholder="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="header-right">
                        <ul class="clearfix">
                            <li class="icons dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown">
                                    <i class="mdi mdi-email-outline"></i>
                                    <span class="badge badge-pill gradient-1"><?php echo $message; ?></span>
                                </a>
                                <div class="drop-down animated fadeIn dropdown-menu">
                                    <div class="dropdown-content-heading d-flex justify-content-between">
                                        <span class=""><?php echo $message; ?> New Messages</span>
                                        <a href="javascript:void()" class="d-inline-block">
                                            <span class="badge badge-pill gradient-1"><?php echo $message; ?></span>
                                        </a>
                                    </div>
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <?php
                                            $query = "Select * from inbox order by tanggal DESC limit 4";
                                            $sql = mysqli_query($connect, $query);
                                            $no = 1;
                                            while ($data = mysqli_fetch_array($sql)) {
                                            ?>
                                                <li class="notification-unread">
                                                    <a href="javascript:void()">
                                                        <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                        <div class="notification-content">
                                                            <div class="notification-heading"><?php echo $data['nama']; ?></div>
                                                            <div class="notification-timestamp"><?php echo $data['tanggal']; ?></div>
                                                            <div class="notification-text"><?php echo $data['pesan']; ?> ...</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>

                                    </div>
                                </div>
                            </li>

                            <li class="icons dropdown d-none d-md-flex">
                                <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                                    <span><?php echo $_SESSION['username']; ?></span>
                                </a>
                            </li>
                            <li class="icons dropdown">
                                <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                    <span class="activity active"></span>
                                    <img src="images/user/<?php echo $_SESSION['foto_adm']; ?>" height="40" width="40" alt="">
                                </div>
                                <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="?page=edit_profil&id=<?php echo $_SESSION['id_adm']; ?>"><i class="icon-user"></i> <span>Profile</span></a>
                                            </li>
                                            <li>
                                                <a href="?page=inbox">
                                                    <i class="icon-envelope-open"></i> <span>Inbox</span>
                                                    <div class="badge  badge-pill gradient-1"><?php echo $message; ?></div>
                                                </a>
                                            </li>

                                            <hr class="my-2">

                                            <li><a href="?page=logout" onclick="return confirm('Anda yakin mau Logout ?')"><i class=" icon-key"></i> <span>Logout</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

            <!--**********************************
            Sidebar start
        ***********************************-->
            <div class="nk-sidebar">
                <div class="nk-nav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="nav-label"><b>Dashboard</b></li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="?page=home">Home</a></li>
                                <li><a href="?page=inbox">Inbox</a></li>
                                <li><a href="?page=#">Transaksi</a></li>
                                <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                            </ul>
                        </li>
                        <li class="nav-label"><b>Forms Master</b></li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-note menu-icon"></i><span class="nav-text">Forms Master</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="?page=paket">Paket</a></li>
                                <li><a href="?page=armada">Armada</a></li>
                                <li><a href="?page=wisata">Wisata</a></li>
                                <li><a href="?page=customer">Customer</a></li>
                                <li><a href="?page=hotel">Hotel</a></li>
                                <li><a href="?page=rm">Rumah Makan</a></li>
                            </ul>
                        </li>
                        <li class="nav-label"><b>Forms Template</b></li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Forms Template</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="?page=#">Home</a></li>
                                <li><a href="?page=#">About</a></li>
                                <li><a href="?page=#">Proses Pemesanan</a></li>
                                <li><a href="?page=#">Testimoni</a></li>
                                <li><a href="?page=#">Galeri</a></li>
                                <li><a href="?page=#">Kontak</a></li>
                                <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!--**********************************
            Sidebar end
        ***********************************-->

            <!--**********************************
            Content body start
        ***********************************-->
            <div class="content-body">
                <?php
                require 'functions.php';
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                    switch ($page) {
                        case 'home':
                            include "./_index.php";
                            break;
                        case 'paket':
                            include "./_paket.php";
                            break;
                        case 'armada':
                            include "./_armada.php";
                            break;
                        case 'wisata':
                            include "./_wisata.php";
                            break;
                        case 'logout':
                            include "../logout.php";
                            break;
                        case 'customer':
                            include "./_customer.php";
                            break;
                        case 'hotel':
                            include "./_hotel.php";
                            break;
                        case 'rm':
                            include "./_rumahmakan.php";
                            break;
                        case 'fedit_paket':
                            include "./_fedit_paket.php";
                            break;
                        case 'fedit_armada':
                            include "./_fedit_armada.php";
                            break;
                        case 'fedit_wisata':
                            include "./_fedit_wisata.php";
                            break;
                        case 'fedit_customer':
                            include "./_fedit_customer.php";
                            break;
                        case 'fedit_hotel':
                            include "./_fedit_hotel.php";
                            break;
                        case 'fedit_rm':
                            include "./_fedit_rumahmakan.php";
                            break;
                        case 'edit_profil':
                            include "./_edit_profile.php";
                            break;
                        case 'inbox':
                            include "./_inbox.php";
                            break;
                        case 'pinbox':
                            include "./_baca_inbox.php";
                            break;
                        case 'hapusdetail':
                            include "./_hapusdetail.php";
                            break;
                        case 'ubahdetail':
                            include "./_ubahdetail.php";
                            break;
                        case 'detailpemesan':
                            include "./_detail_pemesan.php";
                            break;
                        default:
                            include "./_index.php";
                            break;
                    }
                }
                ?>
                <!-- #/ container -->
            </div>
            <!--**********************************
            Content body end
        ***********************************-->


            <!--**********************************
            Footer start
        ***********************************-->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Aksata</a> 2018</p>
                </div>
            </div>
            <!--**********************************
            Footer end
        ***********************************-->
        </div>
        <!--**********************************
        Main wrapper end
    ***********************************-->

        <!--**********************************
        Scripts
    ***********************************-->
        <script src="plugins/common/common.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/settings.js"></script>
        <script src="js/gleek.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/styleSwitcher.js"></script>

        <!-- Chartjs -->
        <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
        <!-- Circle progress -->
        <script src="./plugins/circle-progress/circle-progress.min.js"></script>
        <!-- Datamap -->
        <script src="./plugins/d3v3/index.js"></script>
        <script src="./plugins/topojson/topojson.min.js"></script>
        <script src="./plugins/datamaps/datamaps.world.min.js"></script>
        <!-- Morrisjs -->
        <script src="./plugins/raphael/raphael.min.js"></script>
        <script src="./plugins/morris/morris.min.js"></script>
        <!-- Pignose Calender -->
        <script src="./plugins/moment/moment.min.js"></script>
        <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
        <!-- ChartistJS -->
        <script src="./plugins/chartist/js/chartist.min.js"></script>
        <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

        <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
        <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
        <script src="./plugins/tables/js/datatable-init/datatable-basic.min.js"></script>

        <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
        <script src="./js/plugins-init/chartjs-init.js"></script>

        <script src="./js/dashboard/dashboard-1.js"></script>

    </body>

    </html>

<?php } ?>