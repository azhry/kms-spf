<script type="text/javascript" src="<?= base_url('assets/MathJax/MathJax.js?config=TeX-MML-AM_CHTML') ?>"></script>
<script type="text/x-mathjax-config">
  MathJax.Hub.Config({
    tex2jax: {
      inlineMath: [ ['$','$'], ["\\(","\\)"] ],
      processEscapes: true
    },
    displayAlign: "left"
  });
</script>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Input Penilaian Karyawan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer/data-karyawan') ?>">Daftar Karyawan</a></li>
                    <li><i class="fa fa-bars"></i><a href="<?= base_url('officer/input-penilaian') ?>">Penilaian</a></li>
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
                        <p>Nama: <?= $data_karyawan->nama ?></p>
                        <p>NIK: <?= $data_karyawan->NIK ?></p>

                        <?php 
                            $nilai = $this->session->flashdata( 'nilai' );
                            if ( $nilai ):
                        ?>
                        <div id="proses-perhitungan">
                            <?php $hasil_penilaian = []; ?>

                            <h4>KI = <?= $nilai['kompetensi_inti'] ?></h4>
                            $${μKIKurangBaik [<?= $nilai['kompetensi_inti'] ?>] = \frac{(60 - x)}{55} = \frac{(60 - <?= $nilai['kompetensi_inti'] ?>)}{55} = <?= (60 - $nilai['kompetensi_inti']) / 55 ?>}$$
                            $${μKIBaik [<?= $nilai['kompetensi_inti'] ?>] = \frac{(x - 55)}{60} = \frac{(<?= $nilai['kompetensi_inti'] ?> - 55)}{60} = <?= ($nilai['kompetensi_inti'] - 55) / 60 ?>}$$
                            $${μKISangatBaik [<?= $nilai['kompetensi_inti'] ?>] = \frac{(x - 80)}{100} = \frac{(<?= $nilai['kompetensi_inti'] ?> - 80)}{100} = <?= ($nilai['kompetensi_inti'] - 80) / 100 ?>}$$
                            <br><br>
                            <?php  
                                $hasil_penilaian['KI'] = [
                                    'KurangBaik'    => (60 - $nilai['kompetensi_inti']) / 55,
                                    'Baik'          => ($nilai['kompetensi_inti'] - 55) / 60,
                                    'SangatBaik'    => ($nilai['kompetensi_inti'] - 80) / 100
                                ];
                            ?>

                            <h4>KP = <?= $nilai['kompetensi_peran'] ?></h4>
                            $${μKPKurangBisaMemimpin [<?= $nilai['kompetensi_peran'] ?>] = \frac{(60 - x)}{55} = \frac{(60 - <?= $nilai['kompetensi_peran'] ?>)}{55} = <?= (60 - $nilai['kompetensi_peran']) / 55 ?>}$$
                            $${μKPBisaMemimpin [<?= $nilai['kompetensi_peran'] ?>] = \frac{(x - 55)}{60} = \frac{(<?= $nilai['kompetensi_peran'] ?> - 55)}{60} = <?= ($nilai['kompetensi_peran'] - 55) / 60 ?>}$$
                            $${μKPSangatBisaMemimpin [<?= $nilai['kompetensi_peran'] ?>] = \frac{(x - 80)}{100} = \frac{(<?= $nilai['kompetensi_peran'] ?> - 80)}{100} = <?= ($nilai['kompetensi_peran'] - 80) / 100 ?>}$$
                            <br><br>
                            <?php  
                                $hasil_penilaian['KP'] = [
                                    'KurangBisaMemimpin'    => (60 - $nilai['kompetensi_peran']) / 55,
                                    'BisaMemimpin'          => ($nilai['kompetensi_peran'] - 55) / 60,
                                    'SangatBisaMemimpin'    => ($nilai['kompetensi_peran'] - 80) / 100
                                ];
                            ?>

                            <h4>KF = <?= $nilai['kompetensi_fungsional'] ?></h4>
                            $${μKFKurangMenguasai [<?= $nilai['kompetensi_fungsional'] ?>] = \frac{(60 - x)}{55} = \frac{(60 - <?= $nilai['kompetensi_fungsional'] ?>)}{55} = <?= (60 - $nilai['kompetensi_fungsional']) / 55 ?>}$$
                            $${μKFMenguasai [<?= $nilai['kompetensi_fungsional'] ?>] = \frac{(x - 55)}{60} = \frac{(<?= $nilai['kompetensi_fungsional'] ?> - 55)}{60} = <?= ($nilai['kompetensi_fungsional'] - 55) / 60 ?>}$$
                            $${μKFSangatMenguasai [<?= $nilai['kompetensi_fungsional'] ?>] = \frac{(x - 80)}{100} = \frac{(<?= $nilai['kompetensi_fungsional'] ?> - 80)}{100} = <?= ($nilai['kompetensi_fungsional'] - 80) / 100 ?>}$$
                            <br><br>
                            <?php  
                                $hasil_penilaian['KF'] = [
                                    'KurangMenguasai'    => (60 - $nilai['kompetensi_fungsional']) / 55,
                                    'Menguasai'          => ($nilai['kompetensi_fungsional'] - 55) / 60,
                                    'SangatMenguasai'    => ($nilai['kompetensi_fungsional'] - 80) / 100
                                ];
                            ?>

                            <h4>KPd = <?= $nilai['kompetensi_pendidikan'] ?></h4>
                            $${μKPdSMA [<?= $nilai['kompetensi_pendidikan'] ?>] = \frac{(60 - x)}{55} = \frac{(60 - <?= $nilai['kompetensi_pendidikan'] ?>)}{55} = <?= (60 - $nilai['kompetensi_pendidikan']) / 55 ?>}$$
                            $${μKPdD3 [<?= $nilai['kompetensi_pendidikan'] ?>] = \frac{(x - 55)}{60} = \frac{(<?= $nilai['kompetensi_pendidikan'] ?> - 55)}{60} = <?= ($nilai['kompetensi_pendidikan'] - 55) / 60 ?>}$$
                            $${μKPdS1 [<?= $nilai['kompetensi_pendidikan'] ?>] = \frac{(x - 80)}{100} = \frac{(<?= $nilai['kompetensi_pendidikan'] ?> - 80)}{100} = <?= ($nilai['kompetensi_pendidikan'] - 80) / 100 ?>}$$
                            <br><br>
                            <?php  
                                $hasil_penilaian['KPd'] = [
                                    'SMA'   => (60 - $nilai['kompetensi_pendidikan']) / 55,
                                    'D3'    => ($nilai['kompetensi_pendidikan'] - 55) / 60,
                                    'S1'    => ($nilai['kompetensi_pendidikan'] - 80) / 100
                                ];
                            ?>

                            <h4>KPK = <?= $nilai['kompetensi_pengalaman_kerja'] ?></h4>
                            $${μKPKKurangPengalaman [<?= $nilai['kompetensi_pengalaman_kerja'] ?>] = \frac{(60 - x)}{55} = \frac{(60 - <?= $nilai['kompetensi_pengalaman_kerja'] ?>)}{55} = <?= (60 - $nilai['kompetensi_pengalaman_kerja']) / 55 ?>}$$
                            $${μKPKPengalaman [<?= $nilai['kompetensi_pengalaman_kerja'] ?>] = \frac{(x - 55)}{60} = \frac{(<?= $nilai['kompetensi_pengalaman_kerja'] ?> - 55)}{60} = <?= ($nilai['kompetensi_pengalaman_kerja'] - 55) / 60 ?>}$$
                            $${μKPKSangatPengalaman [<?= $nilai['kompetensi_pengalaman_kerja'] ?>] = \frac{(x - 80)}{100} = \frac{(<?= $nilai['kompetensi_pengalaman_kerja'] ?> - 80)}{100} = <?= ($nilai['kompetensi_pengalaman_kerja'] - 80) / 100 ?>}$$
                            <br><br>
                            <?php  
                                $hasil_penilaian['KPK'] = [
                                    'KurangPengalaman'  => (60 - $nilai['kompetensi_pengalaman_kerja']) / 55,
                                    'Pengalaman'        => ($nilai['kompetensi_pengalaman_kerja'] - 55) / 60,
                                    'SangatPengalaman'  => ($nilai['kompetensi_pengalaman_kerja'] - 80) / 100
                                ];
                            ?>

                            <h4>[R1] = IF Kompetensi Inti  BAIK dan Kompetensi Peran BISA MEMPIMPIN dan Kompetensi Fungsional MENGUASAI dan Kompetensi Pendidikan D3 dan Kompetensi Pengalaman Kerja PENGALAMAN maka Kinerja karyawan BAIK.</h4>
                            $${α-predikat_1 = μKIBaik ∩ μKPBisaMemimpin ∩ μKFMenguasai ∩ μKPdD3 ∩ μKPKPengalaman}$$
                            $${= Min (<?= $hasil_penilaian['KI']['Baik'] ?>; <?= $hasil_penilaian['KP']['BisaMemimpin'] ?>; <?= $hasil_penilaian['KF']['Menguasai'] ?>; <?= $hasil_penilaian['KPd']['D3'] ?>; <?= $hasil_penilaian['KPK']['Pengalaman'] ?>)}$$
                            $${= <?= $pred_1 = min([ $hasil_penilaian['KI']['Baik'], $hasil_penilaian['KP']['BisaMemimpin'], $hasil_penilaian['KF']['Menguasai'], $hasil_penilaian['KPd']['D3'], $hasil_penilaian['KPK']['Pengalaman'] ]) ?>}$$
                            <h4>Hasil himpunan kinerja karyawan Baik :</h4>
                            $${\frac{(Z_1 - 60)}{50} = <?= $pred_1 ?>}$$
                            $${Z_1 - 60 = <?= $pred_1 ?> * 50}$$
                            $${Z_1 - 60 = <?= $pred_1 * 50 ?>}$$
                            $${Z_1 = <?= $pred_1 * 50 ?> + 60 = <?= $Z1 = $pred_1 * 50 + 60 ?>}$$
                            <br><br>

                            <h4>[R2] = IF Kompetensi Inti SANGAT BAIK dan Kompetensi Peran SANGAT BISA MEMIMPIN dan Kompetensi Fungsional SANGAT MENGUASAI dan Kompetensi Pendidikan S1 dan Kompetensi Pengamalam Kerja SANGAT PENGALAMAN makan Kinerja Karyawan SANGAT BAIK.</h4>
                            $${α-predikat_2 = μKISangatBaik ∩ μKPSangatBisaMemimpin ∩ μKFSangatMenguasai ∩ μKPdS1 ∩ μKPKSangatPengalaman}$$
                            $${= Min (<?= $hasil_penilaian['KI']['SangatBaik'] ?>; <?= $hasil_penilaian['KP']['SangatBisaMemimpin'] ?>; <?= $hasil_penilaian['KF']['SangatMenguasai'] ?>; <?= $hasil_penilaian['KPd']['S1'] ?>; <?= $hasil_penilaian['KPK']['SangatPengalaman'] ?>)}$$
                            $${= <?= $pred_2 = min([ $hasil_penilaian['KI']['SangatBaik'], $hasil_penilaian['KP']['SangatBisaMemimpin'], $hasil_penilaian['KF']['SangatMenguasai'], $hasil_penilaian['KPd']['S1'], $hasil_penilaian['KPK']['SangatPengalaman'] ]) ?>}$$
                            <h4>Hasil himpunan kinerja karyawan Baik :</h4>
                            $${\frac{(Z_2 - 100)}{50} = <?= $pred_2 ?>}$$
                            $${Z_2 - 100 = <?= $pred_2 ?> * 50}$$
                            $${Z_2 - 100 = <?= $pred_2 * 50 ?>}$$
                            $${Z_2 = <?= $pred_2 * 50 ?> + 100 = <?= $Z2 = $pred_2 * 50 + 100 ?>}$$
                            <br><br>

                            <h4>[R3] = IF Kompetensi Inti BAIK dan Kompetensi Peran BISA MEMIMPIN dan Kompetensi Fungsional MENGUASAI Kompetensi Pendidikan S1 dan    Kompetensi Pengalaman Kerja PENGALAMAN maka Kinerja Karyawan BAIK.</h4>
                            $${α-predikat_3 = μKIBaik ∩ μKPBisaMemimpin ∩ μKFMenguasai ∩ μKPdD3 ∩ μKPKPengalaman}$$
                            $${= Min (<?= $hasil_penilaian['KI']['Baik'] ?>; <?= $hasil_penilaian['KP']['BisaMemimpin'] ?>; <?= $hasil_penilaian['KF']['Menguasai'] ?>; <?= $hasil_penilaian['KPd']['D3'] ?>; <?= $hasil_penilaian['KPK']['Pengalaman'] ?>)}$$
                            $${= <?= $pred_3 = min([ $hasil_penilaian['KI']['Baik'], $hasil_penilaian['KP']['BisaMemimpin'], $hasil_penilaian['KF']['Menguasai'], $hasil_penilaian['KPd']['D3'], $hasil_penilaian['KPK']['Pengalaman'] ]) ?>}$$
                            <h4>Hasil himpunan kinerja karyawan Baik :</h4>
                            $${\frac{(Z_3 - 60)}{50} = <?= $pred_3 ?>}$$
                            $${Z_3 - 60 = <?= $pred_3 ?> * 50}$$
                            $${Z_3 - 60 = <?= $pred_3 * 50 ?>}$$
                            $${Z_3 = <?= $pred_3 * 50 ?> + 60 = <?= $Z3 = $pred_3 * 50 + 60 ?>}$$
                            <br><br>

                            <h4>[R4] = IF Kompetensi Inti SANGAT BAIK dan Kompetensi Peran SANGAT   BISA MEMIMPIN dan Kompetensi Fungsional SANGAT MENGUASAI dan Kompetensi Pendidikan S1 dan Kompetensi Pengalaman Kerja PENGALAMAN maka Kinerja Karyawan SANGAT BAIK.</h4>
                            $${α-predikat_4 = μKISangatBaik ∩ μKPSangatBisaMemimpin ∩ μKFSangatMenguasai ∩ μKPdS1 ∩ μKPKPengalaman}$$
                            $${= Min (<?= $hasil_penilaian['KI']['SangatBaik'] ?>; <?= $hasil_penilaian['KP']['SangatBisaMemimpin'] ?>; <?= $hasil_penilaian['KF']['SangatMenguasai'] ?>; <?= $hasil_penilaian['KPd']['S1'] ?>; <?= $hasil_penilaian['KPK']['SangatPengalaman'] ?>)}$$
                            $${= <?= $pred_4 = min([ $hasil_penilaian['KI']['SangatBaik'], $hasil_penilaian['KP']['SangatBisaMemimpin'], $hasil_penilaian['KF']['SangatMenguasai'], $hasil_penilaian['KPd']['S1'], $hasil_penilaian['KPK']['Pengalaman'] ]) ?>}$$
                            <h4>Hasil himpunan kinerja karyawan Baik :</h4>
                            $${\frac{(Z_4 - 100)}{50} = <?= $pred_4 ?>}$$
                            $${Z_4 - 100 = <?= $pred_4 ?> * 50}$$
                            $${Z_4 - 100 = <?= $pred_4 * 50 ?>}$$
                            $${Z_4 = <?= $pred_4 * 50 ?> + 100 = <?= $Z4 = $pred_4 * 50 + 100 ?>}$$
                            <br><br>

                            <h4>Defuzzifikasi</h4>
                            $${Z = \frac{α-predikat_1 * Z_1 + α-predikat_2 * Z_2 + α-predikat_3 * Z_3 + α-predikat_4 * Z_4}{α-predikat_1 + α-predikat_2 + α-predikat_3 + α-predikat_4}}$$
                            $${Z = \frac{<?= $pred_1 ?> * <?= $Z1 ?> + <?= $pred_2 ?> * <?= $Z2 ?> + <?= $pred_3 ?> * <?= $Z3 ?> + <?= $pred_4 ?> * <?= $Z4 ?>}{<?= $pred_1 ?> + <?= $pred_2 ?> + <?= $pred_3 ?> + <?= $pred_4 ?>}}$$
                            $${Z = \frac{<?= $pred_1 * $Z1 ?> + <?= $pred_2 * $Z2 ?> + <?= $pred_3 * $Z3 ?> + <?= $pred_4 * $Z4 ?>}{<?= $pred_1 + $pred_2 + $pred_3 + $pred_4 ?>}}$$
                            $${Z = \frac{<?= ($pred_1 * $Z1) + ($pred_2 * $Z2) + ($pred_3 * $Z3) + ($pred_4 * $Z4) ?>}{<?= $pred_1 + $pred_2 + $pred_3 + $pred_4 ?>} = <?= $hasil_akhir = (($pred_1 * $Z1) + ($pred_2 * $Z2) + ($pred_3 * $Z3) + ($pred_4 * $Z4)) / ($pred_1 + $pred_2 + $pred_3 + $pred_4) ?>}$$
                            <?php
                                echo 'Kinerja: ';
                                $keputusan = $this->keputusan_m->get_row([
                                    'nmin <=' => $hasil_akhir,
                                    'nmax >=' => $hasil_akhir
                                ]);

                                if ( !isset( $keputusan ) ) {

                                    $keputusan = (object)[
                                        'id_keputusan'  => 3,
                                        'nama'          => 'Kurang Baik',
                                        'nmin'          => 20,
                                        'nmax'          => 55
                                    ];

                                }
                                
                                echo $keputusan->nama;
                            ?>
                            <br><br>
                        </div>
                        <?php endif; ?>

                        <?= form_open('officer/input-penilaian/' . $id_karyawan) ?>
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