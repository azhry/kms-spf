<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Detail Data Karyawan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-users"></i><a href="<?= base_url('officer/data-penilaian') ?>">Data Penilaian</a></li>
                    <li><i class="fa fa-info"></i>Detail Data</li>
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
                                    <th>NIK</th>
                                    <td><?= $data_karyawan->NIK ?></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td><?= $data_karyawan->nama ?></td>
                                </tr>
                                <tr>
                                    <th>Departemen</th>
                                    <td>
                                        <?php
                                        $departemen = $this->departemen_m->get_row(['id_departemen' => $data_karyawan->id_departemen]);
                                        if($departemen == NULL):
                                        ?>
                                        -
                                        <?php else: ?>
                                        <?= $departemen->nama_departemen ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jabatan</th>
                                    <td>
                                        <?php
                                        $jabatan =  $this->jabatan_m->get_row(['id_jabatan' => $data_karyawan->id_jabatan]);
                                        if($jabatan == NULL):
                                        ?>
                                        -
                                        <?php else: ?>
                                        <?= $jabatan->nama_jabatan ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php foreach ( $nilai as $row ): ?>

                                <tr>
                                    <th><?= $row->nama ?></th>
                                    <td><?= $row->bobot ?></td>
                                </tr>

                                <?php endforeach; ?>
                                <tr>
                                    <th>Kinerja</th>
                                    <td><?= isset( $hasil ) ? $hasil->nama : '-' ?></td>    
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