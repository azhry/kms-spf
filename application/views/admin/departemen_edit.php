<!--main content start-->
<section id="main-content">
    <section class="wrapper">

         <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i> Edit Data Departemen</h3>
            <ol class="breadcrumb">
              <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>">Dashboard</a></li>
              <li><i class="fa fa-university"></i><a href="<?= base_url('admin/departemen') ?>">Data Departemen</a></li>
              <li><i class="fa fa-edit"></i>Edit Data</li>
            </ol>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Edit Data Departemen
              </header>
              <div class="panel-body">
                <?= form_open('admin/edit_data_departemen/'.$data->id_departemen, ['id' => 'form']) ?>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div>
                                <style type="text/css">.required{color: red;}</style>
                                <?= $this->session->flashdata('msg') ?>
                            </div>
                            <div class="form-group">
                                <label>Nama Departemen<span class="required">*</span></label>
                                <input type="text" class="form-control" name="departemen" required value="<?= $data->nama_departemen ?>">
                            </div>
                          
                            <div class="form-group">
                                <label>Deskripsi<span class="required">*</span></label>
                                <textarea id="tinymce" class="form-control" name="deskripsi" required><?= $data->deskripsi ?></textarea>
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
                     tinymce.init({
                        selector: 'textarea',
                        height: 500,
                        plugins: [
                            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                            'insertdatetime media nonbreaking save table contextmenu directionality',
                            'emoticons template paste textcolor colorpicker textpattern imagetools'
                        ],
                        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                        toolbar2: 'print preview media | forecolor backcolor emoticons',
                        image_advtab: true
                    })

                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });
            </script>