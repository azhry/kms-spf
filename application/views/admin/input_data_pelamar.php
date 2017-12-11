<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('admin/input_data_pelamar') ?>/index.html">Input Data Pelamar</a></li>
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

                <?= form_open('admin/input-penilaian') ?>
                  <div class="form-group">
                    <label>Nama <span class="required">*</span></label>
                    <input type="text" name="nama" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label> <br>
                    <input type="radio" name="jk" value="Laki-Laki"> Laki-Laki <br>
                    <input type="radio" name="jk" value="Perempuan"> Perempuan
                  </div>
                  <div class="form-group">
                    <label>Tempat Lahir <span class="required">*</span></label>
                    <input type="text" name="tempat_lahir" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Tanggal Lahir <span class="required">*</span></label>
                    <input type="text" name="tanggal_lahir" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Nomor HP <span class="required">*</span></label>
                    <input type="text" name="no_hp" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Email <span class="required">*</span></label>
                    <input type="text" name="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Alamat <span class="required">*</span></label>
                    <textarea name="" class="form-control" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Upload Foto <span class="required">*</span></label>
                    <input type="file" name="" required>
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