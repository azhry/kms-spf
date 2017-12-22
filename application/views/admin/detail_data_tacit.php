<!--main content start-->
<section id="main-content">
    <section class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header" style="text-align: left;">Detail Data Pengetahuan Tacit</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detail Data Pengetahuan Tacit 
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: left;}
                                    </style>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <tbody>
                                            <tr>
                                                <th>Pengunggah</th>
                                                <td>
                                                    <?php 
                                                        $user = $this->user_m->get_row(['nip' => $tacit->nip]);
                                                        echo $user ? $user->nama : '-';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Judul</th>
                                                <td><?= $tacit->judul ?></td>
                                            <tr>
                                                <th>Katgeori</th>
                                                <td><?= $tacit->kategori ?></td>
                                            </tr>
                                            <tr>
                                                <th>Waktu</th>
                                                <td><?= $tacit->waktu ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><?= $tacit->status ? 'Valid' : 'Belum Valid' ?></td>
                                            </tr>
                                            <tr>
                                                <th>Masalah</th>
                                                <td>
                                                    <p style="text-align: justify;">
                                                        <?= $tacit->masalah ?>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Solusi</th>
                                                <td>
                                                    <p style="text-align: justify;">
                                                        <?= $tacit->solusi ?>
                                                    </p>
                                                </td>
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