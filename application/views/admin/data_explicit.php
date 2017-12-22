<!--main content start-->
<section id="main-content">
    <section class="wrapper">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Data Pengetahuan Explicit <a href="<?= base_url('admin/tambah-data-explicit') ?>" class="btn btn-success"><i class="fa fa-plus"></i></a></h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Daftar Pengetahuan Explicit 
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <style type="text/css">
                                        tr th, tr td {text-align: center; padding: 1%;}
                                    </style>
                                    <?= $this->session->flashdata('msg') ?>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Kategori</th>
                                                <th>Pengunggah</th>
                                                <th>Waktu</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($data as $row): ?>
                                            <tr>
                                                <td style="width: 20px !important;" ><?= $i ?></td>
                                                <td><?= $row->judul ?></td>
                                                <td><?= $row->kategori ?></td>
                                                <td><?= $row->nama ?></td>
                                                <td><?= $row->waktu ?></td>
                                                <td><?= $row->status ? 'Valid' : 'Belum Valid' ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        Aksi <span class="caret"></span></button>
                                                        <ul class="dropdown-menu" role="menu">
                                                          <li><a href="<?= base_url('admin/edit-data-explicit/'.$row->id_explicit) ?>"><i class="lnr lnr-pencil"></i> Edit</a></li>
                                                          <li><a href="<?= base_url('admin/detail-data-explicit/'.$row->id_explicit) ?>"><i class="fa fa-eye"></i> Detail</a></li>
                                                          <li><a href="" onclick="delete_explicit(<?= $row->id_explicit ?>)"><i class="lnr lnr-trash"></i> Hapus </a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
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


            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });

                function delete_explicit(id_explicit) {
                    $.ajax({
                        url: '<?= base_url('admin/daftar-pengetahuan-explicit') ?>',
                        type: 'POST',
                        data: {
                            delete: true,
                            id_explicit: id_explicit
                        },
                        success: function(response) {
                            var json = $.parseJSON(response);
                            window.location = '<?= base_url('admin/daftar-pengetahuan-explicit') ?>';
                        },
                        error: function(e) {
                            console.log(e.responseText);
                        }
                    });
                    return false;
                }
            </script>