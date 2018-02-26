<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Knowledge Management System - PT. Sumatera Prima Fibreboard">
        <meta name="author" content="Harsi Rahayu">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="<?= base_url('assets/NiceAdmin') ?>/img/logo-big.png">
        <title>Hasil Penilaian Karyawan</title>
        <!-- Bootstrap CSS -->
        <link href="<?= base_url('assets/NiceAdmin') ?>/css/bootstrap.min.css" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="<?= base_url('assets/NiceAdmin') ?>/css/bootstrap-theme.css" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="<?= base_url('assets/NiceAdmin') ?>/css/elegant-icons-style.css" rel="stylesheet" />
        <link href="<?= base_url('assets/NiceAdmin') ?>/css/font-awesome.min.css" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="<?= base_url('assets/NiceAdmin') ?>/css/style.css" rel="stylesheet">
        <link href="<?= base_url('assets/NiceAdmin') ?>/css/style-responsive.css" rel="stylesheet" />

        <script src="<?= base_url('assets/NiceAdmin') ?>/js/jquery.js"></script>

        <!-- Bootstrap Datepicker CSS -->
        <link href="<?= base_url('assets/datepicker') ?>/css/bootstrap-datepicker3.min.css" rel="stylesheet">


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <script src="js/lte-ie7.js"></script>
        <![endif]-->
        <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
        ======================================================= -->

        <!-- TinyMCE -->
        <script src="<?=base_url('assets/vendor/tinymce/jquery.tinymce.min.js')?>"></script>
        <script src="<?=base_url('assets/vendor/tinymce/tinymce.js')?>"></script>
    </head>
    <body>


    <!--header start-->
    <header class="header dark-bg">
        <!--logo start-->
        <a href="<?= base_url('karyawan') ?>" class="logo">KMS <span class="lite">SPF</span></a>
        <!--logo end-->
        <div class="top-nav notification-row">
            <!-- notificatoin dropdown start-->
            <ul class="nav pull-right top-menu">
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <!-- <span class="profile-ava">
                            <img alt="" src="<?= base_url('assets/NiceAdmin') ?>/img/avatar1_small.jpg">
                        </span> -->
                        <span class="username"><?= $karyawan->nama ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li>
                            <a href="<?= base_url('logout') ?>"><i class="icon_key_alt"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!-- notificatoin dropdown end-->
        </div>
    </header>
    <!--header end-->


        <!-- container section start -->
        <section id="container" class="">
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-top: 3%;">
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Data Karyawan dan Penilaian
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <style type="text/css">
                                tr th, tr td {text-align: left;}
                                </style>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <tbody>
                                        <tr>
                                            <th>NIK</th>
                                            <td><?= $data_karyawan->NIK ?></td>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <td><?= $data_karyawan->nama ?></td>
                                        </tr>
                                        <tr>
                                            <th>Departemen</th>
                                            <td>
                                                <?php
                                                $departemen = $this->departemen_m->get_row(['id_departemen' => $data_karyawan->id_departemen]);
                                                if($departemen == NULL):
                                                ?>
                                                -
                                                <?php else: ?>
                                                <?= $departemen->nama_departemen ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <td>
                                                <?php
                                                $jabatan =  $this->jabatan_m->get_row(['id_jabatan' => $data_karyawan->id_jabatan]);
                                                if($jabatan == NULL):
                                                ?>
                                                -
                                                <?php else: ?>
                                                <?= $jabatan->nama_jabatan ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <?php foreach ( $nilai as $row ): ?>

                                        <tr>
                                            <th><?= $row->nama ?></th>
                                            <td><?= $row->bobot ?></td>
                                        </tr>

                                        <?php endforeach; ?>
                                        <tr>
                                            <th>Kinerja</th>
                                            <td><?= isset( $hasil ) ? $hasil->nama : '-' ?></td>    
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </section>
        </section>



            <div class="text-right">
                <div class="credits">
                    <!--
                    All the links in the footer should remain intact.
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                    -->
                    <a href="https://bootstrapmade.com/">Free Bootstrap Templates</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </section>
        <!-- container section end -->
        <!-- javascripts -->
        <script src="<?= base_url('assets/NiceAdmin') ?>/js/bootstrap.min.js"></script>
        <!-- nice scroll -->
        <script src="<?= base_url('assets/NiceAdmin') ?>/js/jquery.scrollTo.min.js"></script>
        <script src="<?= base_url('assets/NiceAdmin') ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="<?= base_url('assets/NiceAdmin') ?>/js/scripts.js"></script>

        <!-- Bootstrap Datepicker JavaScript -->
    <script src="<?= base_url('assets/datepicker') ?>/js/bootstrap-datepicker.min.js"></script>
    </body>
</html>