<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Input Keputusan</h3>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url( 'admin' ) ?>"><i class="fa fa-bars"></i> Dashboard</a></li>
                    <li><a href="<?= base_url( 'admin/data-keputusan' ) ?>"><i class="fa fa-bars"></i> Data Keputusan</a></li>
                    <li class="active"><i class="fa fa-users fa-fw"></i> Input Keputusan</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('msg') ?>
                <section class="panel">
                    <div class="panel-body">
                        <?= form_open( 'admin/input-keputusan' ) ?>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nmin">Bobot Min</label>
                            <input type="number" id="nmin" name="nmin" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nmax">Bobot Max</label>
                            <input type="number" id="nmax" name="nmax" class="form-control">
                        </div>

                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">

                        <?= form_close() ?>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->