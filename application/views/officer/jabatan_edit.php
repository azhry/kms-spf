<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Edit Data Jabatan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-book"></i><a href="<?= base_url('officer/data-jabatan') ?>">Data Jabatan</a></li>
                    <li><i class="fa fa-edit"></i>Edit Data</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Data Jabatan
                    </header>
                    <div class="panel-body">
                        <?= form_open('officer/edit-data-jabatan/'.$data->id_jabatan, ['id' => 'form']) ?>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div>
                                    <style type="text/css">.required{color: red;}</style>
                                    <?= $this->session->flashdata('msg') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Jabatan<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="nama_jabatan" required value="<?= $data->nama_jabatan ?>">
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