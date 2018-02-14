<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Tambah Data Karyawan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-users"></i><a href="<?= base_url('officer/data-karyawan') ?>">Data Karyawan</a></li>
                    <li><i class="fa fa-plus"></i>Tambah Data</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Tambah Data Karyawan
                    </header>
                    <div class="panel-body">
                        <?= form_open('officer/tambah-data-karyawan', ['id' => 'form']) ?>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div>
                                    <style type="text/css">.required{color: red;}</style>
                                    <?= $this->session->flashdata('msg') ?>
                                </div>
                                <div class="form-group">
                                    <label>Departemen<span class="required">*</span></label>
                                    <select name="id_departemen" class="form-control" required>
                                        <option>-Pilih-</option>
                                        <?php foreach($departemen as $row): ?>
                                        <option value="<?= $row->id_departemen ?>"><?= $row->nama_departemen ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Jabatan<span class="required">*</span></label>
                                    <select name="id_jabatan" class="form-control" required>
                                        <option>-Pilih-</option>
                                        <?php foreach($jabatan as $row): ?>
                                        <option value="<?= $row->id_jabatan ?>"><?= $row->nama_jabatan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Username<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password<span class="required">*</span></label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label>NIK<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="NIK" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="tempat_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir<span class="required">*</span></label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                        <input type="text" name="tgl_lahir" class="form-control" placeholder="YYYY-MM-DD">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin<span class="required">*</span></label>  <br>
                                    <input type="radio" name="jenis_kelamin" value="l"> Laki-laki <br>
                                    <input type="radio" name="jenis_kelamin" value="p"> Perempuan <br>
                                </div>
                                <div class="form-group">
                                    <label>Agama<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="agama" required>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="pendidikan" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat<span class="required">*</span></label>
                                    <textarea class="form-control" name="alamat" required></textarea>
                                </div>
                                <div>
                                    <input type="submit" onclick="submit_form();" name="simpan" value="Simpan" class="btn btn-success">
                                </div>
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->
                        <?= form_close() ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>



            <script type="text/javascript">
                function submit_form() {
                    $('#form').submit();
                }

                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });
            </script>