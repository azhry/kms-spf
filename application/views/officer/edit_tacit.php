<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Edit Tacit Knowledge</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-share"></i><a href="<?= base_url('officer/knowledge-sharing') ?>">Knowledge Sharing</a></li>
                    <li><i class="fa fa-share"></i><a href="<?= base_url('officer/tacit-knowledge') ?>">My Tacit Knowledge</a></li>
                    <li><i class="fa fa-edit"></i> Edit Tacit Knowledge</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Edit Tacit Knowledge
                    </header>
                    <div class="panel-body">
                        <?= $this->session->flashdata( 'msg' ) ?>
                        <?= form_open( 'officer/edit-tacit/' . $id_tacit ) ?>

                        <div class="form-group">
                            <label for="id_hasil">ID Hasil Penilaian</label>
                            <?php 
                                $nilai_opt = [];
                                foreach ( $nilai as $row ) $nilai_opt[$row->id_hasil] = $row->id_hasil;
                                echo form_dropdown( 'id_hasil', $nilai_opt, $tacit->id_hasil, [ 'required' => '', 'class' => 'form-control' ] ); 
                            ?>
                        </div>
                        <input type="submit" name="edit" value="Edit" class="btn btn-primary">

                        <?= form_close() ?>
                    </div>
                </section>
            </div>
        </div>
    <!-- page end-->
    </section>
</section>
<!--main content end-->