<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa fa-bars"></i> My Tacit Knowledge</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('direktur') ?>">Dashboard</a></li>
                    <li><i class="fa fa-share"></i><a href="<?= base_url('direktur/knowledge-sharing') ?>">Knowledge Sharing</a></li>
                    <li><i class="fa fa-book"></i>My Tacit Knowledge</li>
                </ol>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>
                        My Tacit Knowledge
                        </h3>
                    </header>
                    <div>
                        <?= $this->session->flashdata('msg') ?>
                    </div>
                    <table class="table table-striped table-advance table-hover">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th><i class="icon_profile"></i> ID Hasil Penilaian</th>
                                <th><i class="icon_profile"></i> Judul</th>
                                <th><i class="icon_profile"></i> Status</th>
                                <th><i class="icon_cogs"></i> Action</th>
                            </tr>
                            <?php $i = 1; foreach($tacit as $row): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row->id_hasil ?></td>
                                <td><p><?= $row->judul ?></p></td>
                                <td>
                                    <?php if($row->status == '1'): ?>
                                        Valid
                                    <?php elseif($row->status == '0'): ?>
                                        Tidak Valid
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a class="btn btn-success" href="<?= base_url('direktur/detail-tacit/'.$row->id_tacit) ?>"><i class="fa fa-info"></i></a>
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
    function changeStatus(id_tacit) {
        $.ajax({
          url: '<?= base_url('direktur/tacit_knowledge') ?>',
          type: 'POST',
          data: {
            id_tacit: id_tacit,
            ubah_status: true
          },
          success: function(response) {
            $('#btn-' + id_tacit).html(response);
          },
          error: function (e) {
            console.log(e.responseText);
          }
        });
      }
</script>