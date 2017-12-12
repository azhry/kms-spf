<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('admin/daftar_pelamar') ?>">Daftar Pelamar</a></li>
                    <li><i class="fa fa-bars"></i><a href="<?= base_url('admin/input_penilaian') ?>">Penilaian</a></li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Input Penilaian
              </header>
              <div class="panel-body">
                <?= $this->session->flashdata('msg') ?>
                <h3>Pelamar</h3>
                <p>Nama: Ayu Lestari</p>
                <p>Email: lestariayu669@gmail.com</p>

                <?= form_open('admin/input-penilaian') ?>
                  <div class="form-group">
                    <label>Administrasi</label>
                    <select name="administrasi" class="form-control" id=""></select>
                  </div>
                  <div class="form-group">
                    <label>Wawancara</label>
                    <select name="wawancara" class="form-control" id=""></select>
                  </div>
                  <div class="form-group">
                    <label>Psikotes</label>
                    <select name="psikotes" class="form-control" id=""></select>
                  </div>
                  <div class="form-group">
                    <label>MCU</label>
                    <select name="MCU" class="form-control" id=""></select>
                  </div>
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                </form>

              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->