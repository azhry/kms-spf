<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Hasil Penilaian</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-users"></i>Hasil Penilaian</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('msg') ?>
                <section class="panel">
                    <header class="panel-heading">
                        <h3 class="pull-left">Hasil Penilaian</h3>
                        <?= form_open( 'officer/data-penilaian', [ 'class' => 'navbar-form pull-right', 'id' => 'searchform' ] ) ?>
                            <input class="form-control" name="query" placeholder="Search" type="text" id="searchbox">
                        <?= form_close() ?>
                    </header>
                    <div class="panel-body">
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                    <th>No</th>
                                    <th><i class="icon_profile"></i> NIK</th>
                                    <th><i class="icon_profile"></i> Nama</th>
                                    <th><i class="icon_profile"></i> Jabatan</th>
                                    <th><i class="icon_profile"></i> Departemen</th>
                                    <th><i class="icon_profile"></i> Kinerja</th>
                                    <th><i class="icon_cogs"></i> Action</th>
                                </tr>
                                <?php $i = 1; foreach($hasil_penilaian as $row): ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row->NIK ?></td>
                                    <td><?= $row->nama_karyawan ?></td>
                                    <?php
                                        $jabatan =  $this->jabatan_m->get_row(['id_jabatan' => $row->id_jabatan]);
                                        if($jabatan == NULL):
                                    ?>
                                    <td>-</td>
                                    <?php else: ?>
                                    <td><?= $jabatan->nama_jabatan ?></td>
                                    <?php endif; ?>
                                    <?php
                                        $departemen = $this->departemen_m->get_row(['id_departemen' => $row->id_departemen]);
                                        if($departemen == NULL):
                                    ?>
                                    <td>-</td>
                                    <?php else: ?>
                                    <td><?= $departemen->nama_departemen ?></td>
                                    <?php endif; ?>
                                    <td><?= $row->kinerja ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a class="btn btn-success" href="<?= base_url('officer/detail-penilaian/'.$row->id_karyawan) ?>"><i class="fa fa-info"></i></a>
                                        </div>
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

<script type="text/javascript">
    $( document ).ready(function() {
        $( '#searchbox' ).keypress(function(e) {
            if ( e.which == 13 ) {
                $( '#searchform' ).submit();
            }
        });
    });

    function delete_row(id) {
        $.ajax({
            url: '<?= base_url('officer/data-karyawan') ?>',
            type: 'POST',
            data: {
                delete: true,
                id: id
            },
            success: function(response) {
                var json = $.parseJSON(response);
                window.location = '<?= base_url('officer/data-karyawan') ?>';
            },
            error: function(e) {
                console.log(e.responseText);
            }
        });
        return false;
    }

</script>