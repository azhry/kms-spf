<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Daftar Karyawan</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-users"></i>Data Karyawan</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>
                        Daftar Karyawan
                        <a href="<?= base_url('officer/tambah-data-karyawan') ?>" class="btn btn-success btn-sm">
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
                                <th><i class="icon_profile"></i> NIK</th>
                                <th><i class="icon_profile"></i> Nama</th>
                                <th><i class="icon_profile"></i> Jabatan</th>
                                <th><i class="icon_profile"></i> Departemen</th>
                                <th><i class="icon_cogs"></i> Action</th>
                            </tr>
                            <?php $i = 1; foreach($data as $row): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->NIK ?></td>
                                <td><?= $row->nama ?></td>
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
                                
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-default" href="<?= base_url( 'officer/input-penilaian/' . $row->id_karyawan ) ?>"><i class="fa fa-edit"></i> Beri Nilai</a>
                                        <a class="btn btn-success" href="<?= base_url('officer/detail-data-karyawan/'.$row->id_karyawan) ?>"><i class="fa fa-info"></i></a>
                                        <a class="btn btn-primary" href="<?= base_url('officer/edit-data-karyawan/'.$row->id_karyawan) ?>"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="" class="btn btn-danger" onclick="delete_row(<?= $row->id_karyawan ?>)"><i class="fa fa-trash-o"></i></a>
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
<!--main content end-->

<script type="text/javascript">

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