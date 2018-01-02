<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Daftar Hak Akses</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('admin/hak_akses') ?>">Hak Akses</a></li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>
                    Daftar Hak Akses
                    <a href="<?= base_url('admin/tambah_data_hak_akses') ?>" class="btn btn-success">
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
                    <th><i class="icon_profile"></i> Role</th>
                    <th><i class="icon_profile"></i> Karyawan</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <?php $i = 1; foreach($data as $row): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $this->role_m->get_row(['id_role' => $row->id_role])->role ?></td>
                    <td><?= $this->karyawan_m->get_row(['id_karyawan' => $row->id_karyawan])->nama ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="<?= base_url('admin/hapus_hak_akses/'.$row->id_role.'_'.$row->id_karyawan) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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
        url: '<?= base_url('admin/hak_akses') ?>',
        type: 'POST',
        data: {
            delete: true,
            id: id
        },
        success: function(response) {
            var json = $.parseJSON(response);
            window.location = '<?= base_url('admin/data-hak_akses') ?>';
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });
    return false;
  }

</script>