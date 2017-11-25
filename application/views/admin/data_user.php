    <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <h4 align="center">Sistem Informasi Geografis Untuk Pemetaan Kondisi Jalan Dinas PUBM dan PSDA Kota Palembang</h4><hr>
            <div class="page-title">
              <div class="title_left">
                <h3 class="page-header">Data User <button class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i></button>
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
                        <h2>Data User</h2>
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
                                    <th class="text-center">NIP</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Nomor HP</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i = 0; foreach ($pegawai as $row): ?>
                                <tr>
                                  <td class="text-center"><?= ++$i ?></td>
                                  <td class="text-center"><?= $row->nip ?></td>
                                  <td class="text-center"><?= $row->nama ?></td>
                                  <td class="text-center"><?= $row->jabatan ?></td>
                                  <td class="text-center"><?= $row->email ?></td>
                                  <td class="text-center"><?= $row->nomor_hp ?></td>
                                  <td>
                                    <center>
                                      <a href="<?= base_url('admin/detail-user/' . $row->nip) ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detail</a>
                                      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit" onclick="get_user('<?= $row->nip ?>');"><i class="fa fa-edit"></i> Edit</a>
                                      <a href="<?= base_url('admin/user?delete=true&id=' . $row->nip) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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
                <?= form_open_multipart('admin/user') ?>
               <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Data User</h4>
                  </div>
                  <div class="modal-body">
                        <div class="form-group">
                            <label for="nip">NIP<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nip" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan<span class="required">*</span></label>
                            <input type="text" class="form-control" name="jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span class="required">*</span></label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                          <label for="role">Role<span class="required">*</span></label>
                          <select name="role" class="form-control" required>
                            <option>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="kepala dinas">Kepala Dinas</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor HP<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nomor_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password<span class="required">*</span></label>
                            <input type="password" class="form-control" name="password" required>
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
                <?= form_open_multipart('admin/user') ?>
               <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">ubah Data user</h4>
                  </div>
                  <div class="modal-body">
                        <input type="hidden" name="nip_pk" id="nip_pk">
                        <div class="form-group">
                            <label for="nip">NIP<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nip" id="nip" required>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan<span class="required">*</span></label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span class="required">*</span></label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                          <label for="role">Role<span class="required">*</span></label>
                          <div id="role-dropdown"></div>
                        </div>
                        <div class="form-group">
                            <label for="nomor_hp">Nomor HP<span class="required">*</span></label>
                            <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
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
                });

                function get_user(nip) {
                  $.ajax({
                    url: '<?= base_url('admin/user') ?>',
                    type: 'POST',
                    data: {
                      nip: nip,
                      get: true
                    },
                    success: function(response) {
                        var json = $.parseJSON(response);
                        $('#nip_pk').val(json.nip);
                        $('#nip').val(json.nip);
                        $('#nama').val(json.nama);
                        $('#jabatan').val(json.jabatan);
                        $('#email').val(json.email);
                        $('#nomor_hp').val(json.nomor_hp);
                        $('#role-dropdown').html(json.dropdown);
                    },
                    error: function(e) {
                      console.log(e.responseText);
                    }
                  });
                }
            </script>