<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> Daftar Departemen</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('admin/departemen') ?>">Departemen</a></li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                <h3>
                    Daftar Departemen
                    <a href="<?= base_url('admin/tambah_data_departemen') ?>" class="btn btn-success">
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
                    <th><i class="icon_profile"></i> Departemen</th>
                    <th><i class="icon_profile"></i> Deskripsi</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
                  <?php $i = 1; foreach($data as $row): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $row->nama_departemen ?></td>
                    <td>
                      <?php  
                          $desc = $row->deskripsi;
                          echo substr($desc, 0,100).'...'; 
                      ?>
                    </td>
                    <td>
                      <div class="btn-group">
                        <a class="btn btn-primary" href="<?= base_url('admin/edit_data_departemen/'.$row->id_departemen) ?>"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="" class="btn btn-danger" onclick="delete_row(<?= $row->id_departemen ?>)"><i class="fa fa-trash-o"></i></a>
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
        url: '<?= base_url('admin/departemen') ?>',
        type: 'POST',
        data: {
            delete: true,
            id: id
        },
        success: function(response) {
            var json = $.parseJSON(response);
            window.location = '<?= base_url('admin/data-departemen') ?>';
        },
        error: function(e) {
            console.log(e.responseText);
        }
    });
    return false;
  }

</script>