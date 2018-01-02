<?php 

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['nip']      = $this->session->userdata('nip');
        $this->data['jabatan']  = $this->session->userdata('jabatan');
	}

	public function index()
	{
        $this->load->model('departemen_m');
        $this->load->model('karyawan_m');
		$this->data['title']	= 'Dashboard | ' . $this->title;
		$this->data['content']	= 'admin/dashboard';
        $this->data['departemen']   = $this->departemen_m->get();
        $this->data['karyawan']      = $this->karyawan_m->get();
		$this->template($this->data, 'admin');
	}

	public function daftar_pelamar()
	{
		$this->data['title']	= 'Daftar Pelamar | ' . $this->title;
		$this->data['content']	= 'admin/daftar_pelamar';
		$this->template($this->data, 'admin');
	}	

	public function input_data_pelamar()
	{
		$this->data['title']	= 'Input Data Pelamar | ' . $this->title;
		$this->data['content']	= 'admin/input_data_pelamar';
		$this->template($this->data, 'admin');
	}

	public function input_penilaian()
	{
		$this->data['title']	= 'Input Penilaian | ' . $this->title;
		$this->data['content']	= 'admin/input_penilaian';
		$this->template($this->data, 'admin');
	}

	public function hasil_penilaian()
	{
		$this->data['title']	= 'Hasil Penilaian | ' . $this->title;
		$this->data['content']	= 'admin/hasil_penilaian';
		$this->template($this->data, 'admin');
	}

	public function daftar_pengetahuan_tacit()
    {
        $this->load->model('tacit_m');
        if ($this->POST('id_tacit') && $this->POST('delete'))
        {
            $this->tacit_m->delete($this->POST('id_tacit'));
            exit;
        }

        $this->data['tacit']        = $this->tacit_m->get_tacit();
        $this->data['title']        = 'Daftar Pengetahuan Tacit';
        $this->data['content']      = 'admin/daftar_pengetahuan_tacit';
        $this->template($this->data, 'admin');
    }

    public function detail_data_tacit()
    {
        $this->data['id_tacit'] = $this->uri->segment(3);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/daftar-pengetahuan-tacit');
            exit;
        }

        $this->load->model('user_m');
        $this->load->model('tacit_m');
        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $this->data['id_tacit']]);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan tacit tidak ditemukan', 'danger');
            redirect('admin/daftar-pengetahuan-tacit');
            exit;
        }

        $this->data['title']        = 'Detail Data Pengetahuan Tacit';
        $this->data['content']      = 'admin/detail_data_tacit';
        $this->template($this->data, 'admin');
    }

    public function tambah_data_tacit()
    {
        if($this->POST('simpan')){

            $this->data['data_tacit'] = [
                'nip'       => $this->data['nip'],
                'judul'     => $this->POST('judul'),
                'kategori'  => $this->POST('kategori'),
                'masalah'   => $this->POST('masalah'),
                'solusi'    => $this->POST('solusi'),
                'waktu'     => date('Y-m-d H:i:s')
            ];

            $this->load->model('tacit_m');
            $this->tacit_m->insert($this->data['data_tacit']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan tacit berhasil disimpan');

            redirect('admin/tambah-data-tacit');
            exit;
        }


        $this->data['title']        = 'Tambah Data Pengetahuan Tacit';
        $this->data['content']      = 'admin/tambah_data_tacit';
        $this->template($this->data, 'admin');
    }

    public function edit_data_tacit()
    {   
        $this->data['id_tacit'] = $this->uri->segment(3);
        if (!isset($this->data['id_tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/daftar-pengetahuan-tacit');
            exit;
        }

        $this->load->model('tacit_m');
        $this->data['tacit']        = $this->tacit_m->get_row(['id_tacit' => $this->data['id_tacit']]);
        if (!isset($this->data['tacit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan tacit tidak ditemukan', 'danger');
            redirect('admin/daftar-pengetahuan-tacit');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_tacit'] = [
                'judul'         => $this->POST('judul'),
                'kategori'      => $this->POST('kategori'),
                'masalah'       => $this->POST('masalah'),
                'solusi'        => $this->POST('solusi'),
            ];

            $this->tacit_m->update($this->data['id_tacit'], $this->data['data_tacit']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan tacit berhasil diedit');
            redirect('admin/edit-data-tacit/' . $this->data['id_tacit']);
            exit;
        }

        $this->data['title']        = 'Edit Data Pengetahuan Tacit';
        $this->data['content']      = 'admin/edit_data_tacit';
        $this->template($this->data, 'admin');
    }

    public function daftar_pengetahuan_explicit()
    {
        $this->load->model('explicit_m');
        if ($this->POST('delete') && $this->POST('id_explicit'))
        {
            $this->explicit_m->delete($this->POST('id_explicit'));
            exit;
        }

        $this->data['data']        = $this->explicit_m->get_explicit();
        $this->data['title']        = 'Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/data_explicit';
        $this->template($this->data, 'admin');
    }

    public function tambah_data_explicit()
    {
        if($this->POST('simpan'))
        {
            $filename = date('YmdHis');
            if ($this->upload($filename, 'dokumen', 'doc'))
            {
                $this->data['data_explicit'] = [
                    'nip'           => $this->data['nip'],
                    'judul'         => $this->POST('judul'),
                    'kategori'      => $this->POST('kategori'),
                    'keterangan'    => $this->POST('keterangan'),                
                    'waktu'         => date('Y-m-d H:i:s'),
                    'dokumen'       => $filename . '.pdf'
                ];

                $this->load->model('explicit_m');
                $this->explicit_m->insert($this->data['data_explicit']);
                $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan explicit berhasil disimpan');
            }
            else
            {
                $this->flashmsg('<i class="glyphicon glyphicon-warning"></i> Dokumen gagal diupload', 'danger');
            }

            redirect('admin/tambah-data-explicit');
            exit;
        }

        $this->data['title']        = 'Tambah Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/tambah_data_explicit';
        $this->template($this->data, 'admin');
    }

    public function edit_data_explicit()
    {   
        $this->data['id_explicit'] = $this->uri->segment(3);
        if (!isset($this->data['id_explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/daftar-pengetahuan-explicit');
            exit;
        }

        $this->load->model('explicit_m');
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $this->data['id_explicit']]);
        if (!isset($this->data['explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan eksplisit tidak ditemukan', 'danger');
            redirect('admin/daftar-pengetahuan-explicit');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_explicit'] = [
                'nip'           => $this->data['nip'],
                'judul'         => $this->POST('judul'),
                'kategori'      => $this->POST('kategori'),
                'keterangan'    => $this->POST('keterangan'),                
                'waktu'         => date('Y-m-d H:i:s')
            ];

            $filename = explode('.', $this->data['explicit']->dokumen);
            $this->upload($filename[0], 'dokumen', 'doc');

            $this->explicit_m->update($this->data['id_explicit'], $this->data['data_explicit']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Pengetahuan explicit berhasil diedit');
            redirect('admin/edit-data-explicit/' . $this->data['id_explicit']);
            exit;
        }

        $this->data['title']        = 'Edit Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/edit_data_explicit';
        $this->template($this->data, 'admin');
    }

    public function detail_data_explicit()
    {
        $this->data['id_explicit'] = $this->uri->segment(3);
        if (!isset($this->data['id_explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/daftar-pengetahuan-explicit');
            exit;
        }

        $this->load->model('user_m');
        $this->load->model('explicit_m');
        $this->data['explicit']     = $this->explicit_m->get_row(['id_explicit' => $this->data['id_explicit']]);
        if (!isset($this->data['explicit']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data pengetahuan eksplisit tidak ditemukan', 'danger');
            redirect('admin/daftar-pengetahuan-explicit');
            exit;
        }

        $this->data['title']        = 'Detail Data Pengetahuan Explicit';
        $this->data['content']      = 'admin/detail_data_explicit';
        $this->template($this->data, 'admin');
    }


    //---DEPARTEMEN--------------

    public function tambah_data_departemen()
    {
        if($this->POST('simpan')){

            $this->data['input'] = [
                'nama_departemen' => $this->POST('departemen'),
                'deskripsi'  => $this->POST('deskripsi')
            ];

            $this->load->model('departemen_m');
            $this->departemen_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data departemen berhasil disimpan');

            redirect('admin/departemen');
            exit;
        }


        $this->data['title']        = 'Tambah Data Departemen';
        $this->data['content']      = 'admin/departemen_tambah';
        $this->template($this->data, 'admin');
    }

    public function edit_data_departemen()
    {   
        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/departemen');
            exit;
        }

        $this->load->model('departemen_m');
        $this->data['data']        = $this->departemen_m->get_row(['id_departemen' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data departemen tidak ditemukan', 'danger');
            redirect('admin/departemen');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'nama_departemen'   => $this->POST('departemen'),
                'deskripsi'         => $this->POST('deskripsi')
            ];

            $this->departemen_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data departemen berhasil diedit');
            redirect('admin/edit-data-departemen/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data Departemen';
        $this->data['content']      = 'admin/departemen_edit';
        $this->template($this->data, 'admin');
    }

    public function departemen()
    {
        $this->load->model('departemen_m');
        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->departemen_m->delete($this->POST('id'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']        = $this->departemen_m->get();
        $this->data['title']        = 'Data Departemen';
        $this->data['content']      = 'admin/departemen_data';
        $this->template($this->data, 'admin');
    }

    //---KRITERIA--------------

    public function tambah_data_kriteria()
    {
        if($this->POST('simpan')){

            $this->data['input'] = [
                'nama'      => $this->POST('nama'),
                'label'     => $this->POST('label')
            ];

            $this->load->model('kriteria_m');
            $this->kriteria_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kriteria berhasil disimpan');

            redirect('admin/kriteria');
            exit;
        }


        $this->data['title']        = 'Tambah Data Kriteria';
        $this->data['content']      = 'admin/kriteria_tambah';
        $this->template($this->data, 'admin');
    }

    public function edit_data_kriteria()
    {   
        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/kriteria');
            exit;
        }

        $this->load->model('kriteria_m');
        $this->data['data']        = $this->kriteria_m->get_row(['id_kriteria' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data kriteria tidak ditemukan', 'danger');
            redirect('admin/kriteria');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'nama'          => $this->POST('nama'),
                'label'         => $this->POST('label')
            ];

            $this->kriteria_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kriteria berhasil diedit');
            redirect('admin/edit-data-kriteria/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data kriteria';
        $this->data['content']      = 'admin/kriteria_edit';
        $this->template($this->data, 'admin');
    }

    public function kriteria()
    {
        $this->load->model('kriteria_m');
        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->kriteria_m->delete($this->POST('id'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']        = $this->kriteria_m->get();
        $this->data['title']        = 'Data kriteria';
        $this->data['content']      = 'admin/kriteria_data';
        $this->template($this->data, 'admin');
    }

    //---Role--------------

    public function tambah_data_role()
    {
        if($this->POST('simpan')){

            $this->data['input'] = [
                'role'          => $this->POST('role'),
                'deskripsi'     => $this->POST('deskripsi')
            ];

            $this->load->model('role_m');
            $this->role_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data role berhasil disimpan');

            redirect('admin/role');
            exit;
        }


        $this->data['title']        = 'Tambah Data Role';
        $this->data['content']      = 'admin/role_tambah';
        $this->template($this->data, 'admin');
    }

    public function edit_data_role()
    {   
        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/role');
            exit;
        }

        $this->load->model('role_m');
        $this->data['data']        = $this->role_m->get_row(['id_role' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data role tidak ditemukan', 'danger');
            redirect('admin/role');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'role'              => $this->POST('role'),
                'deskripsi'         => $this->POST('deskripsi')
            ];

            $this->role_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data role berhasil diedit');
            redirect('admin/edit-data-role/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data role';
        $this->data['content']      = 'admin/role_edit';
        $this->template($this->data, 'admin');
    }

    public function role()
    {
        $this->load->model('role_m');
        $this->load->model('hak_akses_m');
        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->role_m->delete($this->POST('id'));

            // hapus juga di hak akses
            $this->hak_akses_m->delete_by(['id_role' => $this->POST('id')]);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']        = $this->role_m->get();
        $this->data['title']        = 'Data role';
        $this->data['content']      = 'admin/role_data';
        $this->template($this->data, 'admin');
    }


    //---Fuzzy--------------

    public function tambah_data_fuzzy()
    {
        if($this->POST('simpan')){

            $this->data['input'] = [
                'id_kriteria'   => $this->POST('id_kriteria'),
                'fuzzy'         => $this->POST('fuzzy'),
                'bobot_min'     => $this->POST('bobot_min'),
                'bobot_max'     => $this->POST('bobot_max')
            ];

            $this->load->model('fuzzy_m');
            $this->fuzzy_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data fuzzy berhasil disimpan');

            redirect('admin/fuzzy');
            exit;
        }


        $this->data['title']        = 'Tambah Data Fuzzy';
        $this->data['content']      = 'admin/fuzzy_tambah';
        $this->template($this->data, 'admin');
    }

    public function edit_data_fuzzy()
    {   
        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/fuzzy');
            exit;
        }

        $this->load->model('fuzzy_m');
        $this->data['data']        = $this->fuzzy_m->get_row(['id_fuzzy' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data fuzzy tidak ditemukan', 'danger');
            redirect('admin/fuzzy');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'id_kriteria'   => $this->POST('id_kriteria'),
                'fuzzy'         => $this->POST('fuzzy'),
                'bobot_min'     => $this->POST('bobot_min'),
                'bobot_max'     => $this->POST('bobot_max')
            ];

            $this->fuzzy_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data fuzzy berhasil diedit');
            redirect('admin/edit-data-fuzzy/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data Fuzzy';
        $this->data['content']      = 'admin/fuzzy_edit';
        $this->template($this->data, 'admin');
    }

    public function fuzzy()
    {
        $this->load->model('fuzzy_m');
        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->fuzzy_m->delete($this->POST('id'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']        = $this->fuzzy_m->get();
        $this->data['title']        = 'Data Fuzzy';
        $this->data['content']      = 'admin/fuzzy_data';
        $this->template($this->data, 'admin');
    }

    //---JABATAN--------------

    public function tambah_data_jabatan()
    {
        if($this->POST('simpan')){

            $this->data['input'] = [
                'nama_jabatan' => $this->POST('nama_jabatan'),
                'deskripsi'  => $this->POST('deskripsi')
            ];

            $this->load->model('jabatan_m');
            $this->jabatan_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data jabatan berhasil disimpan');

            redirect('admin/jabatan');
            exit;
        }


        $this->data['title']        = 'Tambah Data jabatan';
        $this->data['content']      = 'admin/jabatan_tambah';
        $this->template($this->data, 'admin');
    }

    public function edit_data_jabatan()
    {   
        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/jabatan');
            exit;
        }

        $this->load->model('jabatan_m');
        $this->data['data']        = $this->jabatan_m->get_row(['id_jabatan' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data jabatan tidak ditemukan', 'danger');
            redirect('admin/jabatan');
            exit;
        }

        if($this->POST('simpan'))
        {
            $this->data['data_row'] = [
                'nama_jabatan'   => $this->POST('nama_jabatan'),
                'deskripsi'         => $this->POST('deskripsi')
            ];

            $this->jabatan_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data jabatan berhasil diedit');
            redirect('admin/edit-data-jabatan/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data jabatan';
        $this->data['content']      = 'admin/jabatan_edit';
        $this->template($this->data, 'admin');
    }

    public function jabatan()
    {
        $this->load->model('jabatan_m');
        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->jabatan_m->delete($this->POST('id'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']        = $this->jabatan_m->get();
        $this->data['title']        = 'Data jabatan';
        $this->data['content']      = 'admin/jabatan_data';
        $this->template($this->data, 'admin');
    }

    //---Karyawan--------------

    public function tambah_data_karyawan()
    {
        $this->load->model('departemen_m');
        $this->load->model('jabatan_m');

        if($this->POST('simpan')){

            $this->data['input'] = [
                'id_departemen'     => $this->POST('id_departemen'),
                'id_jabatan'        => $this->POST('id_jabatan'),
                'username'          => $this->POST('username'),
                'password'          => md5($this->POST('password')),
                'NIK'               => $this->POST('NIK'),
                'nama'              => $this->POST('nama'),
                'tempat_lahir'      => $this->POST('tempat_lahir'),
                'tgl_lahir'         => $this->POST('tgl_lahir'),
                'jenis_kelamin'     => $this->POST('jenis_kelamin'),
                'agama'             => $this->POST('agama'),
                'alamat'            => $this->POST('alamat'),
                'pendidikan'        => $this->POST('pendidikan')
            ];

            $this->load->model('karyawan_m');
            $this->karyawan_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data karyawan berhasil disimpan');

            redirect('admin/karyawan');
            exit;
        }


        $this->data['title']        = 'Tambah Data karyawan';
        $this->data['content']      = 'admin/karyawan_tambah';
        $this->data['departemen']   = $this->departemen_m->get();
        $this->data['jabatan']      = $this->jabatan_m->get();
        $this->template($this->data, 'admin');
    }

    public function edit_data_karyawan()
    {
        $this->load->model('departemen_m');
        $this->load->model('jabatan_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/karyawan');
            exit;
        }

        $this->load->model('karyawan_m');
        $this->data['data']        = $this->karyawan_m->get_row(['id_karyawan' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data karyawan tidak ditemukan', 'danger');
            redirect('admin/karyawan');
            exit;
        }


        if($this->POST('simpan'))
        {
            if(empty($this->POST('password'))){
                $this->data['data_row'] = [
                    'id_departemen'     => $this->POST('id_departemen'),
                    'id_jabatan'        => $this->POST('id_jabatan'),
                    'username'          => $this->POST('username'),
                    'NIK'               => $this->POST('NIK'),
                    'nama'              => $this->POST('nama'),
                    'tempat_lahir'      => $this->POST('tempat_lahir'),
                    'tgl_lahir'         => $this->POST('tgl_lahir'),
                    'jenis_kelamin'     => $this->POST('jenis_kelamin'),
                    'agama'             => $this->POST('agama'),
                    'alamat'            => $this->POST('alamat'),
                    'pendidikan'        => $this->POST('pendidikan')
                ];
            }
            else {
                $this->data['data_row'] = [
                    'id_departemen'     => $this->POST('id_departemen'),
                    'id_jabatan'        => $this->POST('id_jabatan'),
                    'username'          => $this->POST('username'),
                    'password'          => md5($this->POST('password')),
                    'NIK'               => $this->POST('NIK'),
                    'nama'              => $this->POST('nama'),
                    'tempat_lahir'      => $this->POST('tempat_lahir'),
                    'tgl_lahir'         => $this->POST('tgl_lahir'),
                    'jenis_kelamin'     => $this->POST('jenis_kelamin'),
                    'agama'             => $this->POST('agama'),
                    'alamat'            => $this->POST('alamat'),
                    'pendidikan'        => $this->POST('pendidikan')
                ];
            }

            $this->karyawan_m->update($this->data['id'], $this->data['data_row']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data karyawan berhasil diedit');
            redirect('admin/edit-data-karyawan/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data karyawan';
        $this->data['content']      = 'admin/karyawan_edit';
        $this->data['departemen']   = $this->departemen_m->get();
        $this->data['jabatan']      = $this->jabatan_m->get();
        $this->template($this->data, 'admin');
    }

    public function detail_data_karyawan()
    {
        $this->load->model('departemen_m');
        $this->load->model('jabatan_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/karyawan');
            exit;
        }

        $this->load->model('karyawan_m');
        $this->data['data']        = $this->karyawan_m->get_row(['id_karyawan' => $this->data['id']]);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data karyawan tidak ditemukan', 'danger');
            redirect('admin/karyawan');
            exit;
        }

        $this->data['title']        = 'Detail Data Karyawan';
        $this->data['content']      = 'admin/karyawan_detail';
        $this->template($this->data, 'admin');
    }

    public function karyawan()
    {
        $this->load->model('karyawan_m');
        $this->load->model('departemen_m');
        $this->load->model('jabatan_m');
        $this->load->model('hak_akses_m');

        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->karyawan_m->delete($this->POST('id'));

            // hapus juga di hak akses
            $this->hak_akses_m->delete_by(['id_karyawan' => $this->POST('id')]);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']        = $this->karyawan_m->get();
        $this->data['title']        = 'Data karyawan';
        $this->data['content']      = 'admin/karyawan_data';
        $this->template($this->data, 'admin');
    }

    //---HAK Akses--------------

    public function tambah_data_hak_akses()
    {
        $this->load->model('karyawan_m');
        $this->load->model('role_m');

        if($this->POST('simpan')){

            $this->data['input']= [
                'id_role'       => $this->POST('id_role'),
                'id_karyawan'   => $this->POST('id_karyawan')
            ];

            $this->load->model('hak_akses_m');
            $this->hak_akses_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data hak akses berhasil disimpan');

            redirect('admin/hak_akses');
            exit;
        }


        $this->data['title']        = 'Tambah Data hak_akses';
        $this->data['content']      = 'admin/hak_akses_tambah';
        $this->data['role']         = $this->role_m->get();
        $this->data['karyawan']     = $this->karyawan_m->get();
        $this->template($this->data, 'admin');
    }

    public function hapus_hak_akses(){
        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('admin/hak_akses');
            exit;
        }

        $pk = explode('_', $this->uri->segment(3));
        $this->load->model('hak_akses_m');
        $this->hak_akses_m->delete_by(['id_role' => $pk['0'], 'id_karyawan' => $pk['1'] ]);
        $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
        redirect('admin/hak_akses');
        exit;
    }

    public function hak_akses()
    {
        $this->load->model('hak_akses_m');
        $this->load->model('role_m');
        $this->load->model('karyawan_m');

        $this->data['data']        = $this->hak_akses_m->get();
        $this->data['title']        = 'Data hak_akses';
        $this->data['content']      = 'admin/hak_akses_data';
        $this->template($this->data, 'admin');
    }    
}