<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Dashboard</h3>
            </div>
        </div>
        <!-- page start-->
        
        
        <div class="row">
            <a href="<?= base_url('officer/data-karyawan') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box blue-bg">
                        <i class="fa fa-users"></i>
                        <div class="count"><?= count($data_karyawan) ?></div>
                        <div class="title">Karyawan</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
            <a href="<?= base_url('officer/data-departemen') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box brown-bg">
                        <i class="fa fa-university"></i>
                        <div class="count"><?= count($departemen) ?></div>
                        <div class="title">Departemen</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
            <a href="<?= base_url('officer/data-kriteria') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box dark-bg">
                        <i class="fa fa-list-alt"></i>
                        <div class="count"><?= count($kriteria) ?></div>
                        <div class="title">Kriteria</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
            <a href="<?= base_url('officer/data-keputusan') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box red-bg">
                        <i class="fa fa-list-alt"></i>
                        <div class="count"><?= count($keputusan) ?></div>
                        <div class="title">Keputusan</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
        </div>
        <!--/.row-->
        <div class="row">
            <a href="<?= base_url('officer/data-fuzzy') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box orange-bg">
                        <i class="fa fa-pencil-square-o"></i>
                        <div class="count"><?= count($fuzzy) ?></div>
                        <div class="title">Fuzzy</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
            <a href="<?= base_url('officer/data-jabatan') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box green-bg">
                        <i class="fa fa-book"></i>
                        <div class="count"><?= count($jabatan) ?></div>
                        <div class="title">Jabatan</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
            <a href="<?= base_url('officer/data-penilaian') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box purple-bg">
                        <i class="fa fa-book"></i>
                        <div class="count"><?= count($hasil_penilaian) ?></div>
                        <div class="title">Penilaian</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
        </div>
        <!--/.row-->
        <!-- page end-->
    </section>
</section>
<!--main content end-->