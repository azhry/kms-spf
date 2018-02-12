<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Input Penilaian Karyawan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('admin/karyawan') ?>">Daftar Karyawan</a></li>
                    <li><i class="fa fa-bars"></i><a href="<?= base_url('admin/input-penilaian') ?>">Penilaian</a></li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Input Penilaian
                    </header>
                    <div class="panel-body">
                        <?= $this->session->flashdata('msg') ?>
                        <h3>Karyawan</h3>
                        <p>Nama: <?= $karyawan->nama ?></p>
                        <p>NIK: <?= $karyawan->NIK ?></p>
                        <?= form_open('admin/input-penilaian/' . $id_karyawan) ?>
                        <div class="form-group">
                            <label>Kompetensi Inti</label>
                            <input class="form-control" type="number" min="0" max="100" name="kompetensi_inti" value="<?php 
                                    $nilai = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $id_karyawan, 'id_kriteria' => 1 ] );
                                    echo !isset( $nilai ) ? '' : $nilai->bobot;
                                ?>">
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Peran</label>
                            <input class="form-control" type="number" min="0" max="100" name="kompetensi_peran" value="<?php 
                                    $nilai = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $id_karyawan, 'id_kriteria' => 2 ] );
                                    echo !isset( $nilai ) ? '' : $nilai->bobot;
                                ?>">
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Fungsional</label>
                            <input class="form-control" type="number" min="0" max="100" name="kompetensi_fungsional" value="<?php 
                                    $nilai = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $id_karyawan, 'id_kriteria' => 3 ] );
                                    echo !isset( $nilai ) ? '' : $nilai->bobot;
                                ?>">
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Pendidikan</label>
                            <input class="form-control" type="number" min="0" max="100" name="kompetensi_pendidikan" value="<?php 
                                    $nilai = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $id_karyawan, 'id_kriteria' => 4 ] );
                                    echo !isset( $nilai ) ? '' : $nilai->bobot;
                                ?>">
                        </div>
                        <div class="form-group">
                            <label>Kompetensi Pengalaman Kerja</label>
                            <input class="form-control" type="number" min="0" max="100" name="kompetensi_pengalaman_kerja" value="<?php 
                                    $nilai = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $id_karyawan, 'id_kriteria' => 5 ] );
                                    echo !isset( $nilai ) ? '' : $nilai->bobot;
                                ?>">
                        </div>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>
</section>
<!--main content end-->