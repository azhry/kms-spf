<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Knowledge Management System PT. Sumatera Prima Fibreboard</h3>
            </div>
        </div>
        <!-- page start-->
        
        
        <div class="row">
            <a href="<?= base_url('direktur/data-penilaian') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box purple-bg">
                        <i class="fa fa-book"></i>
                        <div class="count"><?= count($hasil_penilaian) ?></div>
                        <div class="title">Data Penilaian</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
            
            <a href="<?= base_url('direktur/tacit-knowledge') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box blue-bg">
                        <i class="fa fa-book"></i>
                        <div class="count"><?= count($tacit) ?></div>
                        <div class="title">Tacit Knowledge</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>
            <a href="<?= base_url('direktur/explicit-knowledge') ?>">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="info-box brown-bg">
                        <i class="fa fa-book"></i>
                        <div class="count"><?= count($explicit) ?></div>
                        <div class="title">Explicit Knowledge</div>
                    </div>
                    <!--/.info-box-->
                </div>
                <!--/.col-->
            </a>

            <a href="<?= base_url('direktur/hasil-penilaian') ?>">
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="info-box green-bg">
                  <i class="fa fa-book"></i>
                  <div class="count"><?= count($hasil_penilaian) ?></div>
                  <div class="title">Hasil Penilaian</div>
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