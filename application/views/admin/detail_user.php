    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Detail User</h3>
              </div>
            </div>
            <h4 align="center">Sistem Informasi Geografis Untuk Pemetaan Kondisi Jalan Dinas PUBM dan PSDA Kota Palembang</h4><hr>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Detail User</h2>
                    </div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <div class="row">
                          <div class="col-md-2">
                            <img src="<?=base_url('assets') ?>/user.png" class="img img-responsive img-thumbnail">
                          </div>
                          <div class="col-md-4">
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>Nip</td>
                                  <td><?= $pegawai->nip ?></td>
                                </tr>
                                <tr>
                                  <td>Nama</td>
                                  <td><?= $pegawai->nama ?></td>
                                </tr>
                                <tr>
                                  <td>Jabatan</td>
                                  <td><?= $pegawai->jabatan ?></td>
                                </tr>
                                <tr>
                                  <td>No telepon</td>
                                  <td><?= $pegawai->nomor_hp ?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

