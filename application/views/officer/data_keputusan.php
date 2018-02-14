<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Data Keputusan</h3>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url( 'officer' ) ?>"><i class="fa fa-bars"></i> Dashboard</a></li>
                    <li class="active"><i class="fa fa-users fa-fw"></i> Data Keputusan</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('msg') ?>
                <section class="panel">
                    <div class="panel-heading">
                        <a href="<?= base_url( 'officer/input-keputusan' ) ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                        <br><br>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Bobot Min</th>
                                    <th>Bobot Max</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; foreach ( $keputusan as $row ): ?>
                                <tr>
                                    <td><?= ++$i ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= $row->nmin ?></td>
                                    <td><?= $row->nmax ?></td>
                                    <td>
                                        <?= form_open( 'officer/data-keputusan' ) ?>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="<?= base_url('officer/edit-keputusan/' . $row->id_keputusan) ?>"><i class="fa fa-pencil-square-o"></i></a>
                                            <button type="submit" class="btn btn-danger" name="delete" value="Delete"><i class="icon_close_alt2"></i></button>
                                            <input type="hidden" name="id_keputusan" value="<?= $row->id_keputusan ?>">
                                        </div>
                                        <?= form_close() ?>
                                    </td>
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