<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Tambah User</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('admin/user') ?>">User</a></li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-8">
            <section class="panel">
              <header class="panel-heading">
                Tambah User
              </header>

              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <div>
                        <?= $this->session->flashdata('msg') ?>
                    </div>

                    <?= form_open('admin/tambah_user') ?>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password1" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password2" class="form-control">
                      </div>
                      <input type="submit" name="tambah" value="Simpan" class="btn btn-primary">
                    </form>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->