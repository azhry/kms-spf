    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <h4 align="center">Sistem Informasi Geografis Untuk Pemetaan Kondisi Jalan Dinas PUBM dan PSDA Kota Palembang</h4><hr>
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Data Jalan <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button>
                </h3>
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
                                        <th class="text-center">Action</th>
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
                                  <td>
                                    <center>
                                      <a href="<?= base_url('admin/detail-jalan/' . $row->id_data) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit" onclick="get_jalan(<?= $row->id_data ?>);"><i class="fa fa-edit"></i> Edit</a>
                                      <a href="<?= base_url('admin/jalan?delete=true&id=' . $row->id_data) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    </center>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="add">
              <div class="modal-dialog" role="document">
                <?= form_open_multipart('admin/jalan') ?>
               <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data Jalan</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Nama<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan<span class="required">*</span></label>
                            <input type="text" class="form-control" name="kelurahan" required>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan<span class="required">*</span></label>
                            <input type="text" class="form-control" name="kecamatan" required>
                        </div>
                        <div class="form-group">
                          <label for="tipe">Tipe<span class="required">*</span></label>
                          <select class="form-control" name="tipe" required>
                            <option>-- Pilih Tipe --</option>
                            <option value="Tanah">Tanah</option>
                            <option value="Semen">Semen</option>
                            <option value="Aspal">Aspal</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="kondisi">Kondisi<span class="required">*</span></label>
                          <select class="form-control" name="kondisi" required>
                            <option>-- Pilih Kondisi --</option>
                            <option value="Baik">Baik</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Buruk">Buruk</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Pilih Koordinat Jalan</label>
                          <div class="gmap" id="map-add" style="width: 100%; height: 250px;"></div>
                          <p>Koordinat: <span id="map-add-latitude"></span>, <span id="map-add-longitude"></span></p>
                          <input type="hidden" id="map-add-hidden_latitude" name="latitude" required>
                          <input type="hidden" id="map-add-hidden_longitude" name="longitude" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Upload Foto Jalan<span class="required">*</span></label>
                            <input type="file" name="foto">
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                  </div>
                  <?= form_close() ?>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="modal fade" tabindex="-1" role="dialog" id="edit">
              <div class="modal-dialog" role="document">
                <?= form_open_multipart('admin/jalan') ?>
               <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Data Jalan</h4>
                  </div>
                  <div class="modal-body">
                        <input type="hidden" name="id_data" id="id_data">
                        <div class="form-group">
                            <label for="nama">Nama<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan<span class="required">*</span></label>
                            <input type="text" class="form-control" name="kelurahan" id="kelurahan" required>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan<span class="required">*</span></label>
                            <input type="text" class="form-control" name="kecamatan" id="kecamatan" required>
                        </div>
                        <div class="form-group">
                          <label for="tipe">Tipe<span class="required">*</span></label>
                          <div id="tipe"></div>
                        </div>
                        <div class="form-group">
                          <label for="kondisi">Kondisi<span class="required">*</span></label>
                          <div id="kondisi"></div>
                        </div>
                        <div class="form-group">
                          <label>Pilih Koordinat Jalan</label>
                          <div class="gmap" id="map-edit" style="width: 100%; height: 250px;"></div>
                          <p>Koordinat: <span id="map-edit-latitude"></span>, <span id="map-edit-longitude"></span></p>
                          <input type="hidden" id="map-edit-hidden_latitude" name="latitude" required>
                          <input type="hidden" id="map-edit-hidden_longitude" name="longitude" required>
                        </div>
                        <!-- <div class="form-inline">
                          <div class="form-group">
                            <label for="latitude">Latitude<span class="required">*</span></label>
                            <input type="text" name="latitude" id="latitude" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label for="longitude">Longitude<span class="required">*</span></label>
                            <input type="text" name="longitude" id="longitude" class="form-control" required>
                          </div>
                        </div> -->
                        <br>
                        <div id="img-placeholder">
                          <img src="<?= base_url('img/150x150.png') ?>" width="150" height="150">
                        </div>
                        <div class="form-group">
                            <label for="foto">Upload Foto Jalan<span class="required">*</span></label>
                            <input type="file" name="foto" id="foto">
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                  </div>
                  <?= form_close() ?>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
</div>

            <script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });

                    $('#add').on('shown.bs.modal', function() {
                      initMap('map-add');
                    });
                });

                function get_jalan(id_data) {
                  $.ajax({
                    url: '<?= base_url('admin/jalan') ?>',
                    type: 'POST',
                    data: {
                      id_data: id_data,
                      get: true
                    },
                    success: function(response) {
                      var json = $.parseJSON(response);
                      $('#id_data').val(json.id_data);
                      $('#nama').val(json.nama);
                      $('#kelurahan').val(json.kelurahan);
                      $('#kecamatan').val(json.kecamatan);
                      $('#latitude').val(json.latitude);
                      $('#longitude').val(json.longitude);
                      
                      $('#tipe').html(json.tipe_jalan);
                      $('#kondisi').html(json.kondisi_jalan);
                      $('#img-placeholder').html('<img src="<?= base_url('img') ?>/' + json.id_data + '.jpg?' + json.id_data + '" width="150" height="150">');

                      editMap('map-edit', json.latitude, json.longitude);
                    },
                    error: function(e) {
                      console.log(e.responseText);
                    }
                  });
                }

                function initMap(id) {
                  $('#' + id + '-latitude').text('');
                  $('#' + id + '-longitude').text('');
                  $('#' + id + '-hidden_latitude').val(null);
                  $('#' + id + '-hidden_longitude').val(null);
                  var coordinate = {lat: -6.121435, lng: 106.774124};
                  var map = new google.maps.Map(document.getElementById(id), {
                    zoom: 8,
                    center: coordinate
                  });
                  var marker = new google.maps.Marker({
                    position: coordinate,
                    map: map
                  });
                  google.maps.event.addListener(map, 'click', function(event){
                    var latLng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                    marker.setPosition(latLng);
                    $('#' + id + '-latitude').text(event.latLng.lat());
                    $('#' + id + '-longitude').text(event.latLng.lng());
                    $('#' + id + '-hidden_latitude').val(event.latLng.lat());
                    $('#' + id + '-hidden_longitude').val(event.latLng.lng());

                  });
                  google.maps.event.addListener(map, 'mousemove', function(event){
                    map.setOptions({draggableCursor: 'pointer'});
                  });
                }

                function editMap(id, latitude, longitude) {
                  $('#' + id + '-latitude').text(latitude);
                  $('#' + id + '-longitude').text(longitude);
                  $('#' + id + '-hidden_latitude').val(latitude);
                  $('#' + id + '-hidden_longitude').val(longitude);
                  var coordinate = {lat: parseFloat(latitude), lng: parseFloat(longitude)};
                  var map = new google.maps.Map(document.getElementById(id), {
                    zoom: 8,
                    center: coordinate
                  });
                  var marker = new google.maps.Marker({
                    position: coordinate,
                    map: map
                  });
                  google.maps.event.addListener(map, 'click', function(event){
                    var latLng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                    marker.setPosition(latLng);
                    $('#' + id + '-latitude').text(event.latLng.lat());
                    $('#' + id + '-longitude').text(event.latLng.lng());
                    $('#' + id + '-hidden_latitude').val(event.latLng.lat());
                    $('#' + id + '-hidden_longitude').val(event.latLng.lng());

                  });
                  google.maps.event.addListener(map, 'mousemove', function(event){
                    map.setOptions({draggableCursor: 'pointer'});
                  });
                }
            </script>