      <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <h4 align="center">Sistem Informasi Geografis Untuk Pemetaan Kondisi Jalan Dinas PUBM dan PSDA Kota Palembang</h4><hr>
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/jalan') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count"><?= count($jalan) ?></div>
                    <h3>Data Jalan</h3>
                  </div>
                </a>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/user') ?>">
                  <div class="tile-stats">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="count"><?= count($pegawai) ?></div>
                    <h3>Data User</h3>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->