<?php
error_reporting(0);
session_start();

$koneksi = new mysqli("localhost", "root", "", "db_emperium");

$sql3 = $koneksi->query("select * from tb_anggota");

while ($tampil3 = $sql3->fetch_assoc()) {

    $id_m = $tampil3['id_m'];
    $masah_aktif = $tampil3['tgl_expired'];
    $tgl_sekarng = date('Y-m-d');
    if (strtotime($tgl_sekarng) < strtotime($masah_aktif)) {
        $sqlll = $koneksi->query("update  tb_anggota set expired=1 where id_m='$id_m'");
    } else {
        $sqlll = $koneksi->query("update  tb_anggota set expired=0 where id_m='$id_m'");
    }
};


// include "function.php";

if ($_SESSION['admin'] || $_SESSION['user']) {

?>

    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Emperium Gym</title>
        <!-- BOOTSTRAP STYLES-->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
        <!-- FONTAWESOME STYLES-->
        <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
        <link href="assets/css/custom.css" rel="stylesheet" />
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

        <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

        <link rel='stylesheet' href='../bower_components/angular-loading-bar/build/loading-bar.min.css' type='text/css' media='all' />
        <!-- Angular Loader -->
        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
        <!--     <link href="../bower_components/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" /> -->
        <link href="css/material-icons.css" rel="stylesheet" type="text/css" />
        <link href="../bower_components/animate.css/animate.min.css" rel="stylesheet" type="text/css" />
        <!-- CSS FRAMEWORK - END -->

        <link rel="stylesheet" href="css/app.css">
    </head>

    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Emperium Gym</a>
                </div>
                <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="?page=bayarlansung" class="btn btn-info square-btn-adjust">User Visit</a> &nbsp; <?php echo date('d-M-Y'); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <?php
                            if ($_SESSION['admin']) {
                                $user_l = $_SESSION['admin'];
                            } elseif ($_SESSION['user']) {
                                $user_l = $_SESSION['user'];
                            }

                            $sql_u = $koneksi->query("select* from tb_user where id='$user_l'");
                            $data_u = $sql_u->fetch_assoc();
                            ?>

                            <a>Hai, <?php echo $data_u['username']; ?>&nbsp;&nbsp;<img src="images/<?php echo $data_u['foto']; ?>" alt="" width="75" height="50" style=""></a></li>
                        </li>


                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-3x"></i> Pengelohan Data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="?page=anggota"><i class="fa fa-user fa-3x"></i>Data Anggota</a>
                                </li>

                                <li>
                                    <a href="?page=paket"><i class="fa fa-table fa-3x"></i> Data Paket</a>
                                </li>

                                <li>
                                    <a href="?page=barang"><i class="fa fa-table fa-3x"></i> Data Barang</a>
                                </li>

                                <li>
                                    <a href="?page=kategori"><i class="fa fa-table fa-3x"></i> Data kategori</a>
                                </li>


                            </ul>
                        </li>


                        <li>
                            <a href="?page=transaksi"><i class="fa fa-edit fa-3x"></i></i> Transaksi</a>
                        </li>

                        <?php if ($_SESSION['admin']) { ?>


                            <li>
                                <a href="?page=pengguna"><i class="fa fa-laptop fa-3x"></i></i> Pengguna</a>
                            </li>

                        <?php } ?>



                        <li>
                            <a href="?page=laporan"><i class="fa fa-flag fa-3x"></i></i> Laporan</a>
                        </li>


                    </ul>

                </div>

            </nav>
            <!-- /. NAV SIDE  -->
            <div id="page-wrapper">
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">

                            <?php

                            $page = $_GET['page'];
                            $aksi = $_GET['aksi'];

                            if ($page == "barang") {
                                if ($aksi == "") {
                                    include "page/barang/barang.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/barang/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/barang/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/barang/hapus.php";
                                } elseif ($aksi == "cetak") {
                                    include "page/barang/form_laporan_barang.php";
                                }
                            } elseif ($page == "anggota") {
                                if ($aksi == "") {
                                    include "page/anggota/anggota.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/anggota/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/anggota/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/anggota/hapus.php";
                                } elseif ($aksi == "proses") {
                                    include "page/anggota/proses.php";
                                }
                            } elseif ($page == "anggota_expired") {
                                if ($aksi == "") {
                                    include "page/anggota/anggota_expired.php";
                                }
                            } elseif ($page == "transaksi") {
                                if ($aksi == "") {
                                    include "page/transaksi/transaksi.php";
                                } elseif ($aksi == "bayar") {
                                    include "page/transaksi/bayar_anggota.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/transaksi/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/transaksi/hapus.php";
                                } elseif ($aksi == "proses") {
                                    include "page/transaksi/proses.php";
                                }
                            } elseif ($page == "transaksi_anggota") {
                                if ($aksi == "") {
                                    include "page/transaksi/transaksi_anggota.php";
                                } elseif ($aksi == "bayar") {
                                    include "page/transaksi/bayar_anggota.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/transaksi/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/transaksi/hapus.php";
                                } elseif ($aksi == "proses") {
                                    include "page/transaksi/proses.php";
                                }
                            } elseif ($page == "transaksi_barang") {
                                if ($aksi == "") {
                                    include "page/transaksi/transaksi_barang.php";
                                } elseif ($aksi == "bayar") {

                                    include "page/transaksi/bayar_anggota.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/transaksi/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/transaksi/hapus.php";
                                } elseif ($aksi == "proses") {
                                    include "page/transaksi/proses.php";
                                }
                            } elseif ($page == "bayarlansung") {
                                if ($aksi == "") {
                                    include "page/transaksi/bayarlansung.php";
                                } elseif ($aksi == "bayar") {
                                    include "page/transaksi/bayar_anggota.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/transaksi/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/transaksi/hapus.php";
                                } elseif ($aksi == "proses") {
                                    include "page/transaksi/proses.php";
                                }
                            } elseif ($page == "pengguna") {
                                if ($aksi == "") {
                                    include "page/pengguna/pengguna.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/pengguna/tambah.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/pengguna/ubah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/pengguna/hapus.php";
                                }
                            } elseif ($page == "laporan") {
                                if ($aksi == "") {
                                    include "page/laporan/laporan.php";
                                } elseif ($aksi == "cetak_anggota") {
                                    include "page/laporan/form_transaksi_anggota.php";
                                } elseif ($aksi == "cetak_barang") {
                                    include "page/laporan/form_transaksi_barang.php";
                                } elseif ($aksi == "kembali") {
                                    include "page/transaksi/kembali.php";
                                } elseif ($aksi == "perpanjang") {
                                    include "page/transaksi/perpanjang.php";
                                }
                            } elseif ($page == "paket") {
                                if ($aksi == "") {
                                    include "page/paket/paket.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/paket/tambah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/paket/hapus.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/paket/ubah.php";
                                }
                            } elseif ($page == "kategori") {
                                if ($aksi == "") {
                                    include "page/kategori/kategori.php";
                                } elseif ($aksi == "tambah") {
                                    include "page/kategori/tambah.php";
                                } elseif ($aksi == "hapus") {
                                    include "page/kategori/hapus.php";
                                } elseif ($aksi == "ubah") {
                                    include "page/kategori/ubah.php";
                                }
                            } elseif ($page == "") {
                                include "home.php";
                            }

                            ?>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
        <!-- JQUERY SCRIPTS -->
        <script src="assets/js/jquery-1.10.2.js"></script>
        <!-- BOOTSTRAP SCRIPTS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- METISMENU SCRIPTS -->
        <script src="assets/js/jquery.metisMenu.js"></script>
        <!-- CUSTOM SCRIPTS -->



        <script src="assets/js/dataTables/jquery.dataTables.js"></script>

        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function() {
                $('#dataTables-example').dataTable();
            });
        </script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>

        <script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
        <!-- Angular Scripts -->
        <script src="../bower_components/angular/angular.js"></script>
        <script src="../bower_components/angular-animate/angular-animate.js"></script>
        <!--    <script src="../bower_components/angular-cookies/angular-cookies.js"></script>-->
        <!--    <script src="../bower_components/angular-resource/angular-resource.js"></script>-->
        <script src="../bower_components/angular-sanitize/angular-sanitize.js"></script>
        <script src="../bower_components/angular-touch/angular-touch.js"></script>
        <script src="../bower_components/angular-ui-router/release/angular-ui-router.js"></script>
        <!--<script src="../bower_components/ngstorage/ngStorage.js"></script>-->
        <script src="../bower_components/angular-ui-utils/ui-utils.js"></script>
        <script src="../bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
        <!-- Angular ui bootstrap -->
        <script src="../bower_components/oclazyload/dist/ocLazyLoad.js"></script>
        <!-- lazyload -->
        <script type='text/javascript' src='../bower_components/angular-loading-bar/build/loading-bar.min.js'></script>
        <script src="../bower_components/perfect-scrollbar/min/perfect-scrollbar.min.js" type="text/javascript"></script>
        <script src="../bower_components/angular-perfect-scrollbar/src/angular-perfect-scrollbar.js" type="text/javascript"></script>
        <script src="../bower_components/angular-inview/angular-inview.js" type="text/javascript"></script>
        <!-- JS FRAMEWORK - END -->

        <!-- App JS - Start -->
        <script src="js/app.js"></script>
        <script src="js/app.config.js"></script>
        <script src="js/app.lazyload.js"></script>

        <script src="js/app.router.js"></script>
        <!--
    <script src="js/app.router.js"></script>
    <script src="js/app.router.hospital.js"></script>
    <script src="js/app.router.university.js"></script>
    <script src="js/app.router.music.js"></script>
    -->



        <script src="js/app.main.js"></script>
        <!-- App JS - End -->

        <!-- App JS Utilities - Start -->
        <script src="js/services/ui-load.js"></script>
        <script src="js/filters/moment-fromNow.js"></script>
        <script src="js/directives/nganimate.js"></script>
        <script src="js/directives/ui-jq.js"></script>
        <script src="js/directives/ui-module.js"></script>
        <script src="js/directives/ui-nav.js"></script>
        <script src="js/directives/ui-bootstrap.js"></script>
        <script src="js/directives/ui-chatwindow.js"></script>
        <script src="js/directives/ui-sectionbox.js"></script>
        <script src="js/controllers/bootstrap.js"></script>
        <script src="js/controllers/topbar.js"></script>
        <script src="js/controllers/chat.js"></script>
        <script src='../bower_components/Chart.js/Chart.js'></script>

    </body>

    </html>

<?php
} else {
    header("location:login.php");
}
?>