<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Dashboard</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i>Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        
        
        <div class="row">
            <a href="<?= base_url('manajer/data-karyawan') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box brown-bg">
                        <i class="fa fa-users"></i>
                        <div class="count"><?= count($data_karyawan) ?></div>
                        <div class="title">Karyawan</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
            <a href="<?= base_url('manajer/data-penilaian') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box dark-bg">
                        <i class="fa fa-list-alt"></i>
                        <div class="count"><?= count($penilaian) ?></div>
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