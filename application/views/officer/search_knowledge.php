<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Search Knowledge</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-share"></i><a href="<?= base_url('officer/knowledge-sharing') ?>">Knowledge Sharing</a></li>
                    <li><i class="fa fa-search"></i> Search Knowledge</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Search Knowledge
                    </header>
                    <div class="panel-body">
                        <?= form_open( 'officer/search-knowledge' ) ?>

                        <div class="form-group">
                            <label for="keyword">Keyword</label>
                            <input type="text" name="query" class="form-control">
                        </div>
                        <input type="submit" name="search" value="Search" class="btn btn-primary">

                        <?= form_close() ?>
                    </div>
                </section>

                <?php if ( count( $knowledge ) > 0 ): ?>

                <?php foreach ( $knowledge as $row ): ?>
                <section class="panel">
                    <div class="panel-body">
                        <h3><a href="<?= base_url( 'officer/detail-penilaian/' . $row->id_karyawan ) ?>"><?= $row->judul ?></a></h3>
                        <p>Hasil penilaian: <?= $row->kinerja ?></p>
                    </div>
                </section>
                <?php endforeach; ?>

                <?php endif; ?>
            </div>
        </div>
    <!-- page end-->
    </section>
</section>
<!--main content end-->