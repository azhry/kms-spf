<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-users fa-fw"></i><a href="<?= base_url('assets/NiceAdmin') ?>/index.html">Daftar Pelamar</a></li>
                </ol>
                  <?= form_open('admin/daftar-pelamar') ?>
                    <input type="submit" value="Hitung Hasil" class="btn btn-danger" name="hitung_hasil" style="margin-bottom: 2%;">
                  <?= form_close() ?>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Daftar Pelamar
              </header>

              <div>
                  <?= $this->session->flashdata('msg') ?>
              </div>

              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th>No</th>
                    <th><i class="icon_profile"></i> Nama</th>
                    <th><i class="icon_mobile"></i> Nomor HP</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Angeline Mcclain</td>
                    <td>176-026-5992</td>
                    <td>dale@chief.info</td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="<?= base_url('admin/input_penilaian') ?>"><i class="fa fa-pencil-square-o"></i></a>
                        <a class="btn btn-success" href="<?= base_url('admin/hasil_penilaian') ?>"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="#"><i class="icon_close_alt2"></i></a>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>

            </section>
          </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->