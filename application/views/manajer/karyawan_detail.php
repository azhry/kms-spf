<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Detail Data Karyawan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('manajer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-users"></i><a href="<?= base_url('manajer/data-karyawan') ?>">Data Karyawan</a></li>
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
                                    <th>Departemen</th>
                                    <td>
                                        <?php
                                        $departemen = $this->departemen_m->get_row(['id_departemen' => $data->id_departemen]);
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
                                        $jabatan =  $this->jabatan_m->get_row(['id_jabatan' => $data->id_jabatan]);
                                        if($jabatan == NULL):
                                        ?>
                                        -
                                        <?php else: ?>
                                        <?= $jabatan->nama_jabatan ?>
                                        <?php endif; ?>
                                    </td>
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