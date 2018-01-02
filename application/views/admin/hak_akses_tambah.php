<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Tambah Data Hak Akses</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>">Dashboard</a></li>
              <li><i class="icon_document_alt"></i><a href="<?= base_url('admin/hak_akses') ?>">Data hak_akses</a></li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Tambah Data Hak Akses
              </header>
              <div class="panel-body">
                <?= form_open('admin/tambah-data-hak-akses', ['id' => 'form']) ?>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div>
                                <style type="text/css">.required{color: red;}</style>
                                <?= $this->session->flashdata('msg') ?>
                            </div>
                            <div class="form-group">
                                <label>Role<span class="required">*</span></label>
                                <select name="id_role" class="form-control" required>
                                    <option>-Pilih-</option>
                                    <?php foreach($role as $row): ?>
                                        <option value="<?= $row->id_role ?>"><?= $row->role ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                          
                            <div class="form-group">
                                <label>Karyawan<span class="required">*</span></label>
                                <select name="id_karyawan" class="form-control" required>
                                    <option>-Pilih-</option>
                                    <?php foreach($karyawan as $row): ?>
                                        <option value="<?= $row->id_karyawan ?>"><?= $row->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
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

                    $('.input-group.date').datetimepicker({format: "yyyy-mm-dd H:i:s"});
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });
            </script>