<!--main content start-->
<section id="main-content">
    <section class="wrapper">

                    <div class="row">
                      <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-file-text-o"></i> Detail Data Karyawan</h3>
                        <ol class="breadcrumb">
                          <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                          <li><i class="icon_document_alt"></i><a href="<?= base_url('admin/karyawan') ?>">Data Karyawan</a></li>
                        </ol>
                      </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail Data Karyawan 
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: left;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <tbody>
                                            <tr>
                                                <th>Departemen</th>
                                                <td><?= $data->id_departemen ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jabatan</th>
                                                <td><?= $data->id_jabatan ?></td>
                                            </tr>
                                            <tr>
                                                <th>Username</th>
                                                <td><?= $data->username ?></td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td><?= $data->NIK ?></td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td><?= $data->nama ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tempat Lahir</th>
                                                <td><?= $data->tempat_lahir ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td><?= $data->tgl_lahir ?></td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                <td>
                                                    <?php if($data->jenis_kelamin == "p"): ?>
                                                        Perempuan
                                                    <?php else: ?>
                                                        Laki-laki
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Agama</th>
                                                <td><?= $data->agama ?></td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td><?= $data->alamat ?></td>
                                            </tr>
                                            <tr>
                                                <th>Pendidikan</th>
                                                <td><?= $data->pendidikan ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    </section>
</section>



            <script type="text/javascript">
                function submit_form() {
                    $('#form').submit();
                }

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

                    $('.input-group.date').datepicker({format: "yyyy-mm-dd"});
                    
                    $('#dataTables-example').DataTable({
                        responsive: true
                    })
                });
            </script>