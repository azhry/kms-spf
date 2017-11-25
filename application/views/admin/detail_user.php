    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Detail User</h3>
              </div>
            </div>

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
                    <?= $this->session->flashdata('msg') ?>
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>NIP</td>
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
                          <td>Email</td>
                          <td><?= $pegawai->email ?></td>
                        </tr>
                        <tr>
                          <td>Nomor HP</td>
                          <td><?= $pegawai->nomor_hp ?></td>
                        </tr>
                        <tr>
                          <td>Role</td>
                          <td><?= $pegawai->role ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>
