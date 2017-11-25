    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <h4 align="center">Sistem Informasi Geografis Untuk Pemetaan Kondisi Jalan Dinas PUBM dan PSDA Kota Palembang</h4><hr>
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Data Jalan</h3>
              </div>

              <style type="text/css">.required{color:red;}</style>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div id="map" style="width: 100%; height: 300px;"></div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div>
                        <h2>Data Jalan</h2>
                    </div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <div>
                            <?= $this->session->flashdata('msg') ?>
                        </div>

                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Kelurahan</th>
                                        <th class="text-center">Kecamatan</th>
                                        <th class="text-center">Tipe</th>
                                        <th class="text-center">Kondisi</th>
                                        <th class="text-center">Koordinat</th>
                                    </tr>
                            </thead>
                            <tbody>
                              <?php $i = 0; foreach ($jalan as $row): ?>
                                <tr>
                                  <td class="text-center"><?= ++$i ?></td>
                                  <td class="text-center"><?= $row->nama ?></td>
                                  <td class="text-center"><?= $row->kelurahan ?></td>
                                  <td class="text-center"><?= $row->kecamatan ?></td>
                                  <td class="text-center"><?= $row->tipe ?></td>
                                  <td class="text-center"><?= $row->kondisi ?></td>
                                  <td class="text-center"><?= $row->latitude ?>, <?= $row->longitude ?></td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                        </table>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="<?= base_url('kepala-dinas/unduh-laporan-jalan') ?>" class="btn btn-success btn-lg"><i class="fa fa-download"></i> Unduh Laporan</a>
              </div>
        </div>
    </div>
</div>

            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });

                    initMap();
                });

                function initMap() {
                  var coordinate = {lat: -6.121435, lng: 106.774124};
                  var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 8,
                    center: coordinate
                  });

                  <?php foreach ($jalan as $row): ?>
                    var marker_<?= $row->id_data ?> = new google.maps.Marker({
                      position: {lat: <?= $row->latitude ?>, lng: <?= $row->longitude ?>},
                      map: map
                    });
                    var infoWindow_<?= $row->id_data ?> = new google.maps.InfoWindow({
                      content: '<?= $row->nama ?>'
                    });
                    infoWindow_<?= $row->id_data ?>.open(map, marker_<?= $row->id_data ?>);
                  <?php endforeach; ?>
                  
                  google.maps.event.addListener(map, 'mousemove', function(event){
                    map.setOptions({draggableCursor: 'pointer'});
                  });
                }
            </script>