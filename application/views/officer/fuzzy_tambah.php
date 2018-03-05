<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Tambah Data Fuzzy</h3>
                <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="<?= base_url('officer') ?>">Dashboard</a></li>
                    <li><i class="fa fa-pencil-square-o"></i><a href="<?= base_url('officer/data-fuzzy') ?>">Data Fuzzy</a></li>
                    <li><i class="fa fa-plus"></i>Tambah Data</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Tambah Data Fuzzy
                    </header>
                    <div class="panel-body">
                        <?= form_open('officer/tambah-data-fuzzy', ['id' => 'form']) ?>
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <div>
                                    <style type="text/css">.required{color: red;}</style>
                                    <?= $this->session->flashdata('msg') ?>
                                </div>
                                <div style="margin-top: 2%; margin-bottom: 2%;">
                                    <button type="button" class="btn btn-primary" onclick="addFormInput(); return false;"><i class="fa fa-plus"></i> Tambah</button>
                                </div>
                                
                                <div id="form-container">
                                    <div class="form-group">
                                        <label>Kriteria<span class="required">*</span></label>
                                        <select name="id_kriteria" class="form-control" required>
                                            <option>-Pilih-</option>
                                            <?php foreach($kriteria as $row): ?>
                                            <option value="<?= $row->id_kriteria ?>"><?= $row->nama ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    
                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fuzzy<span class="required">*</span></label>
                                                <input type="text" class="form-control" name="fuzzy[]" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bobot Minimal<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="bobot_min[]" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Bobot Maksimal<span class="required">*</span></label>
                                                <input type="number" class="form-control" name="bobot_max[]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                                </div>
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->
                        <?= form_close() ?>
                    </div>
                </section>
            </div>
        </div>
    </section>
</section>

<script type="text/javascript">
    // function submit_form() {
    //     $('#form').submit();
    // }

    function addFormInput() {
        $.ajax({
            url: '<?= base_url('officer/tambah-data-fuzzy') ?>',
            type: 'GET',
            async: false,
            success: function(response) {
                console.log(response);
                
                $('#form-container').append('<div class="row" style="margin-top: 2%">' +
                        '<div class="col-md-4">' +
                            '<div class="form-group">' +
                                '<label>Fuzzy<span class="required">*</span></label>' +
                                '<input type="text" class="form-control" name="fuzzy[]" required>' +
                            '</div>' +
                        '</div>' +

                        '<div class="col-md-4">' +
                            '<div class="form-group">' +
                                '<label>Bobot Minimal<span class="required">*</span></label>' +
                                '<input type="number" class="form-control" name="bobot_min[]" required>' +
                            '</div>' +
                        '</div>' +

                       '<div class="col-md-4">' +
                            '<div class="form-group">' +
                                '<label>Bobot Maksimal<span class="required">*</span></label>' +
                                '<input type="number" class="form-control" name="bobot_max[]" required>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>');
            }
        });

        return false;
    }
</script>