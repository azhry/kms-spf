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
                    <label>Kompetensi Inti</label>
                    <select name="kompetensi_inti" class="form-control" id="">
                      <option>- Pilih -</option>
                      <option value="Kurang Baik">Kurang Baik</option>
                      <option value="Baik">Baik</option>
                      <option value="Sangat Baik">Sangat Baik</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kompetensi Peran</label>
                    <select name="kompetensi_peran" class="form-control" id="">
                      <option>- Pilih -</option>
                      <option value="Kurang Bisa Memimpin">Kurang Bisa Memimpin</option>
                      <option value="Bisa Memimpin">Bisa Memimpin</option>
                      <option value="Sangat Bisa Memimpin">Sangat Bisa Memimpin</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kompetensi Fungsional</label>
                    <select name="kompetensi_fungsional" class="form-control" id="">
                      <option>- Pilih -</option>
                      <option value="Kurang Menguasai">Kurang Menguasai</option>
                      <option value="Menguasai">Menguasai</option>
                      <option value="Sangat Menguasai">Sangat Menguasai</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kompetensi Pendidikan</label>
                    <select name="kompetensi_pendidikan" class="form-control" id="">
                      <option>- Pilih -</option>
                      <option value="SMA">SMA</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Kompetensi Pengalaman Kerja</label>
                    <select name="kompetensi_pengalaman_kerja" class="form-control" id="">
                      <option>- Pilih -</option>
                      <option value="Kurang Pengalaman">Kurang Pengalaman</option>
                      <option value="Pengalaman">Pengalaman</option>
                      <option value="Sangat Pengalaman">Sangat Pengalaman</option>
                    </select>
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