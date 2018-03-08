<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Data Penilaian</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('manajer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-users"></i>Data Penilaian</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Data Penilaian</h3>
                    </header>
                    <div class="panel-body">
                        <div>
                            <?= $this->session->flashdata('msg') ?>
                        </div>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th><i class="icon_profile"></i> Nama</th>
                                    <?php foreach ( $kriteria as $row ): ?>
                                    <th><i class="icon_profile"></i> <?= $row->label ?></th>
                                    <?php endforeach; ?>
                                </tr>
                                <?php $i = 1; foreach($hasil_penilaian as $row): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->nama_karyawan ?></td>
                                    <?php  
                                        $nilai = $this->penilaian_karyawan_m->get([ 'id_karyawan' => $row->id_karyawan ]);
                                        foreach ( $nilai as $n ):
                                    ?>
                                    <td><?= $n->bobot ?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->