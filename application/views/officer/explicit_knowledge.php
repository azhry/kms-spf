<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> My Explicit Knowledge</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-share"></i><a href="<?= base_url('officer/knowledge-sharing') ?>">Knowledge Sharing</a></li>
                    <li><i class="fa fa-book"></i>My Explicit Knowledge</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>
                        My Explicit Knowledge
                        <a href="<?= base_url('officer/insert-explicit') ?>" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i></a>
                        </h3>
                    </header>
                    <div>
                        <?= $this->session->flashdata('msg') ?>
                    </div>
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th><i class="icon_profile"></i> Judul</th>
                                <th><i class="icon_profile"></i> ID Hasil Penilaian</th>
                                <th><i class="icon_profile"></i> Status</th>
                                <th><i class="icon_cogs"></i> Action</th>
                            </tr>
                            <?php $i = 1; foreach($explicit as $row): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->judul ?></td>
                                <td><?= $row->id_hasil ?></td>
                                <td><?= $row->status ? '<span class="text-success">Valid</span>' : '<span class="text-danger">Tidak Valid</span>' ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="<?= base_url('officer/detail-explicit/'.$row->id_explicit) ?>"><i class="fa fa-info"></i></a>
                                        <a class="btn btn-primary" href="<?= base_url('officer/edit-explicit/'.$row->id_explicit) ?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="<?= base_url( 'officer/explicit-knowledge?id_explicit=' . $row->id_explicit . '&delete=true') ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>