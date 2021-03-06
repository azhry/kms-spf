<!--main content start-->
<section id="main-content">
    <section class="wrapper">

         <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Edit Data Karyawan</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
              <li><i class="fa fa-users"></i><a href="<?= base_url('officer/data-karyawan') ?>">Data Karyawan</a></li>
              <li><i class="fa fa-edit"></i>Edit Data</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Data Karyawan
              </header>
              <div class="panel-body">
                <?= form_open('officer/edit-data-karyawan/'.$data->id_karyawan, ['id' => 'form']) ?>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div>
                                <style type="text/css">.required{color: red;}</style>
                                <?= $this->session->flashdata('msg') ?>
                            </div>
                          
                            <div class="form-group">
                                <label>Departemen<span class="required">*</span></label>
                                <select name="id_departemen" class="form-control" required>
                                    <!-- <option value="<?= $data->id_departemen ?>"><?= $this->departemen_m->get_row(['id_departemen' => $data->id_departemen])->nama_departemen ?></option> -->
                                    <?php foreach($departemen as $row): ?>
                                        <option value="<?= $row->id_departemen ?>"><?= $row->nama_departemen ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                          
                            <div class="form-group">
                                <label>Jabatan<span class="required">*</span></label>
                                <select name="id_jabatan" class="form-control" required>
                                    <!-- <option value="<?= $data->id_jabatan ?>"><?= $this->jabatan_m->get_row(['id_jabatan' => $data->id_jabatan])->nama_jabatan ?></option> -->
                                    <?php foreach($jabatan as $row): ?>
                                        <option value="<?= $row->id_jabatan ?>"><?= $row->nama_jabatan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Username<span class="required">*</span></label>
                                <input type="text" class="form-control" name="username" required value="<?= $data->username ?>">
                            </div>

                            <div class="form-group">
                                <label>Password <span class="required">* tidak perlu diisi jika tidak ingin mengubah password</span></label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                <label>NIK<span class="required">*</span></label>
                                <input type="text" class="form-control" name="NIK" required value="<?= $data->NIK?>">
                            </div>

                            <div class="form-group">
                                <label>Nama<span class="required">*</span></label>
                                <input type="text" class="form-control" name="nama" required value="<?= $data->nama ?>">
                            </div>

                            <div class="form-group">
                                <label>Tempat Lahir<span class="required">*</span></label>
                                <input type="text" class="form-control" name="tempat_lahir" required value="<?= $data->tempat_lahir ?>">
                            </div>

                            <div class="form-group">
                                <label>Tanggal Lahir<span class="required">*</span></label>
                                <div class="input-group date">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                      <input type="text" name="tgl_lahir" class="form-control" placeholder="YYYY-MM-DD" value="<?= $data->tgl_lahir ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin<span class="required">*</span></label>  <br>
                                <?php if($data->jenis_kelamin == "l"): ?>
                                <input type="radio" name="jenis_kelamin" value="l" checked> Laki-laki <br>
                                <input type="radio" name="jenis_kelamin" value="p"> Perempuan <br>
                                <?php elseif($data->jenis_kelamin == "p"): ?>
                                <input type="radio" name="jenis_kelamin" value="l"> Laki-laki <br>
                                <input type="radio" name="jenis_kelamin" value="p" checked> Perempuan <br>
                                <?php else: ?>
                                <input type="radio" name="jenis_kelamin" value="l"> Laki-laki <br>
                                <input type="radio" name="jenis_kelamin" value="p"> Perempuan <br>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label>Agama<span class="required">*</span></label>
                                <input type="text" class="form-control" name="agama" required value="<?= $data->agama ?>">
                            </div>

                            <div class="form-group">
                                <label>Pendidikan<span class="required">*</span></label>
                                <input type="text" class="form-control" name="pendidikan" required value="<?= $data->pendidikan ?>">
                            </div>

                            <div class="form-group">
                                <label>Alamat<span class="required">*</span></label>
                                <textarea class="form-control" name="alamat" required><?= $data->alamat ?></textarea>
                            </div>

                            <div>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
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
                // function submit_form() {
                //     $('#form').submit();
                // }

                $(document).ready(function() {
                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });
            </script>