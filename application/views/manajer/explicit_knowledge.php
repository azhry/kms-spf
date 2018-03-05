<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> My Explicit Knowledge</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('manajer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-share"></i><a href="<?= base_url('manajer/knowledge-sharing') ?>">Knowledge Sharing</a></li>
                    <li><i class="fa fa-book"></i>My Explicit Knowledge</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>
                        My Explicit Knowledge
                        </h3>
                    </header>
                    <div>
                        <?= $this->session->flashdata('msg') ?>
                    </div>
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th><i class="icon_profile"></i> Judul</th>
                                <th><i class="icon_profile"></i> ID Hasil Penilaian</th>
                                <th><i class="icon_profile"></i> Status</th>
                                <th><i class="icon_cogs"></i> Action</th>
                            </tr>
                            <?php $i = 1; foreach($explicit as $row): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->judul ?></td>
                                <td><?= $row->id_hasil ?></td>
                                <td id="btn-<?= $row->id_explicit?>">
                                      <?php if ($row->status == 1): ?>
                                        <button onclick="changeStatus(<?= $row->id_explicit ?>)" class="btn btn-success"><i class="fa fa-check"></i> Valid</button>
                                      <?php else: ?>
                                        <button onclick="changeStatus(<?= $row->id_explicit ?>)" class="btn btn-danger"><i class="fa fa-close"></i> Tidak Valid</button>
                                      <?php endif; ?>

                                    </td>
                                <td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="<?= base_url('manajer/detail-explicit/'.$row->id_explicit) ?>"><i class="fa fa-info"></i></a>
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

<script type="text/javascript">
    function changeStatus(id_explicit) {
        $.ajax({
          url: '<?= base_url('manajer/explicit_knowledge') ?>',
          type: 'POST',
          data: {
            id_explicit: id_explicit,
            ubah_status: true
          },
          success: function(response) {
            $('#btn-' + id_explicit).html(response);
          },
          error: function (e) {
            console.log(e.responseText);
          }
        });
      }
</script>