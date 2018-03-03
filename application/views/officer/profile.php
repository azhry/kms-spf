<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Upload Foto</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <!-- <header class="panel-heading">
                Profile Karyawan
              </header> -->
              <div class="panel-body">
                <?= form_open_multipart('officer/upload_foto', ['id' => 'form']) ?>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1" style="margin-top: 2%;">
                            <div>
                                <style type="text/css">.required{color: red;}</style>
                                <?= $this->session->flashdata('msg') ?>
                            </div>

                            <div class="form-group">
                                <label>Upload Foto<span class="required">*</span></label>
                                <br><div class="text-danger">file harus jpg/jpeg/png</div><br>
                                <input type="file" name="foto" required>
                            </div>

                            <div>
                                <input type="submit" onclick="submit_form();" name="upload" value="Simpan" class="btn btn-success">
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
            </script>