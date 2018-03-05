<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Edit Explicit Knowledge</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('direktur') ?>">Dashboard</a></li>
                    <li><i class="fa fa-share"></i><a href="<?= base_url('direktur/knowledge-sharing') ?>">Knowledge Sharing</a></li>
                    <li><i class="fa fa-share"></i><a href="<?= base_url('direktur/explicit-knowledge') ?>">My Explicit Knowledge</a></li>
                    <li><i class="fa fa-list"></i> Detail Explicit Knowledge</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Detail Explicit Knowledge
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td width="30%"><b>Penerbit</b></td>
                                    <td><?= $penerbit->nama ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Karyawan</b></td>
                                    <td>
                                        <?php  
                                            $karyawan = $this->karyawan_m->get_row([ 'id_karyawan' => $hasil_penilaian->id_karyawan ]);
                                            echo isset( $karyawan ) ? $karyawan->nama : '-';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Dokumen</b></td>
                                    <td>
                                        <a href="<?= base_url( 'assets/dokumen/' . $explicit->filename ) ?>"><?= $explicit->filename ?></a>
                                    </td>
                                </tr>
                                <?php foreach ( $penilaian as $row ): ?>
                                <tr>
                                    <td>
                                        <b>
                                            <?php  
                                                $kriteria = $this->kriteria_m->get_row([ 'id_kriteria' => $row->id_kriteria ]);
                                                echo isset( $kriteria ) ? $kriteria->nama : '-';
                                            ?>
                                        </b>
                                    </td>
                                    <td><?= $row->bobot ?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td><b>Kinerja</b></td>
                                    <td>
                                        <?php  
                                            $hasil = $this->hasil_penilaian_m->get_hasil( $hasil_penilaian->id_karyawan );
                                            echo isset( $hasil ) ? $hasil->nama : '-';
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <?php if ( isset( $explicit ) ): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Komentar
                    </div>
                    <div class="panel-body">
                        <?= form_open( 'direktur/detail-explicit/' . $id_explicit ) ?>

                        <div class="form-group">
                            <textarea rows="4" class="form-control" name="komentar" placeholder="Komentar"></textarea>
                        </div>

                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                        <?= form_close() ?>
                        <br>
                        <?php foreach ( $komentar as $row ): ?>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?= $row->komentar ?>
                            </div>
                            <div class="panel-footer">
                                <?= $row->waktu ?>
                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    <!-- page end-->
    </section>
</section>
<!--main content end-->