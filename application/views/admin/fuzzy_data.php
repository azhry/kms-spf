<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Daftar Fuzzy</h3>
                <ol class="breadcrumb">
                  <li><i class="fa fa-home"></i><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                  <li><i class="fa fa-pencil-square-o"></i>Data Fuzzy</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>
                    Daftar Fuzzy
                    <a href="<?= base_url('admin/tambah_data_fuzzy') ?>" class="btn btn-success btn-sm">
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
                    <th><i class="icon_profile"></i> Fuzzy</th>
                    <th><i class="icon_profile"></i> Kriteria</th>
                    <th><i class="icon_profile"></i> Bobot Min</th>
                    <th><i class="icon_profile"></i> Bobot Max</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <?php $i = 1; foreach($data as $row): ?>
                  <tr>
                    <td><?= $i++ ?></td>

                    <td><?= $row->fuzzy ?></td>
                    
                    <?php 
                      $kriteria =  $this->kriteria_m->get_row(['id_kriteria' => $row->id_kriteria]);
                      if($kriteria == NULL): 
                    ?>
                      <td>-</td>
                    <?php else: ?>
                      <td><?= $kriteria->nama ?></td>
                    <?php endif; ?>
                    <td><?= $row->bobot_min ?></td>
                    <td><?= $row->bobot_max ?></td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="<?= base_url('admin/edit_data_fuzzy/'.$row->id_fuzzy) ?>"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="" class="btn btn-danger" onclick="delete_row(<?= $row->id_fuzzy ?>)"><i class="fa fa-trash-o"></i></a>
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
        url: '<?= base_url('admin/fuzzy') ?>',
        type: 'POST',
        data: {
            delete: true,
            id: id
        },
        success: function(response) {
            var json = $.parseJSON(response);
            window.location = '<?= base_url('admin/data-fuzzy') ?>';
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });
    return false;
  }

</script>