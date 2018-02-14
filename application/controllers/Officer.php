<?php 

class Officer extends MY_Controller {

	public function __construct() {

		parent::__construct();
		$this->data['id_karyawan']  = $this->session->userdata('id_karyawan');
        $this->data['id_role']      = $this->session->userdata('id_role');

        if ( !isset( $this->data['id_karyawan'], $this->data['id_role'] ) ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->load->model( 'hak_akses_m' );
        $this->data['hak_akses'] = $this->hak_akses_m->get_row([
            'id_karyawan'   => $this->data['id_karyawan'],
            'id_role'       => $this->data['id_role']
        ]);

        if ( !isset( $this->data['hak_akses'] ) ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->load->model( 'role_m' );
        $this->data['role'] = $this->role_m->get_row([ 'id_role' => $this->data['hak_akses']->id_role ]);
        if ( !isset( $this->data['role'] ) or strtolower( $this->data['role']->role ) !== 'officer' ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->load->model( 'karyawan_m' );
        $this->data['karyawan'] = $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'] ]);

        if ( !isset( $this->data['karyawan'] ) ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->data['id_departemen'] = $this->session->userdata( 'id_departemen' );

	}

	public function index() {

        $this->load->model('departemen_m');
        $this->load->model('karyawan_m');
        $this->load->model('kriteria_m');
        $this->load->model('fuzzy_m');
        $this->load->model('jabatan_m');
        $this->load->model('keputusan_m');

        $this->data['title']    = 'Dashboard | ' . $this->title;
        $this->data['content']  = 'officer/dashboard';
        $this->data['departemen']   = $this->departemen_m->get();
        $this->data['data_karyawan']= $this->karyawan_m->get([ 'id_departemen' => $this->data['id_departemen'] ]);
        $this->data['kriteria']     = $this->kriteria_m->get();
        $this->data['fuzzy']        = $this->fuzzy_m->get();
        $this->data['jabatan']      = $this->jabatan_m->get();
        $this->data['keputusan']    = $this->keputusan_m->get();
        $this->data['hasil_penilaian']  = $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
        $this->template($this->data, 'officer');

	}

    public function data_karyawan() {

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

        $this->data['data']         = $this->karyawan_m->get([ 'id_departemen' => $this->session->userdata( 'id_departemen' ) ]);
        $this->data['title']        = 'Data karyawan';
        $this->data['content']      = 'officer/karyawan_data';
        $this->template($this->data, 'officer');

    }

    public function detail_data_karyawan() {

        $this->load->model('departemen_m');
        $this->load->model('jabatan_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('officer/data-karyawan');
            exit;
        }

        $this->load->model('karyawan_m');
        $this->data['data']        = $this->karyawan_m->get_row(['id_karyawan' => $this->data['id']]);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data karyawan tidak ditemukan', 'danger');
            redirect('officer/data-karyawan');
            exit;
        }

        $this->data['title']        = 'Detail Data Karyawan';
        $this->data['content']      = 'officer/karyawan_detail';
        $this->template($this->data, 'officer');

    }

    public function tambah_data_karyawan() {

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

            redirect('officer/data-karyawan');
            exit;
        }


        $this->data['title']        = 'Tambah Data karyawan';
        $this->data['content']      = 'officer/karyawan_tambah';
        $this->data['departemen']   = $this->departemen_m->get();
        $this->data['jabatan']      = $this->jabatan_m->get();
        $this->template($this->data, 'officer');

    }

    public function edit_data_karyawan() {

        $this->load->model('departemen_m');
        $this->load->model('jabatan_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('officer/data-karyawan');
            exit;
        }

        $this->load->model('karyawan_m');
        $this->data['data']        = $this->karyawan_m->get_row(['id_karyawan' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data karyawan tidak ditemukan', 'danger');
            redirect('officer/data-karyawan');
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
            redirect('officer/edit-data-karyawan/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data karyawan';
        $this->data['content']      = 'officer/karyawan_edit';
        $this->data['departemen']   = $this->departemen_m->get();
        $this->data['jabatan']      = $this->jabatan_m->get();
        $this->template($this->data, 'officer');

    }

    public function data_kriteria() {

        $this->load->model('kriteria_m');
        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->kriteria_m->delete($this->POST('id'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']        = $this->kriteria_m->get();
        $this->data['title']        = 'Data kriteria';
        $this->data['content']      = 'officer/kriteria_data';
        $this->template($this->data, 'officer');

    }

    public function tambah_data_kriteria() {

        if($this->POST('simpan')) {

            $this->data['input'] = [
                'nama'      => $this->POST('nama'),
                'label'     => $this->POST('label')
            ];

            $this->load->model('kriteria_m');
            $this->kriteria_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data kriteria berhasil disimpan');

            redirect('officer/data-kriteria');
            exit;
        }


        $this->data['title']        = 'Tambah Data Kriteria';
        $this->data['content']      = 'officer/kriteria_tambah';
        $this->template($this->data, 'officer');

    }

    public function edit_data_kriteria() {

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('officer/data-kriteria');
            exit;
        }

        $this->load->model('kriteria_m');
        $this->data['data']        = $this->kriteria_m->get_row(['id_kriteria' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data kriteria tidak ditemukan', 'danger');
            redirect('officer/data-kriteria');
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
            redirect('officer/edit-data-kriteria/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data kriteria';
        $this->data['content']      = 'officer/kriteria_edit';
        $this->template($this->data, 'officer');

    }

    public function data_penilaian() {

        $this->load->model( 'karyawan_m' );
        $this->load->model( 'departemen_m' );
        $this->load->model( 'jabatan_m' );
        $this->data['hasil_penilaian']  = $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
        $this->data['title']            = 'Data Penilaian Karyawan';
        $this->data['content']          = 'officer/data_penilaian';
        $this->template( $this->data, 'officer' );

    }

    public function input_penilaian() {

        $this->data['id_karyawan'] = $this->uri->segment( 3 );
        if ( !isset( $this->data['id_karyawan'] ) ) {

            $this->flashmsg( 'Required parameter is missing', 'danger' );
            redirect( 'officer/data-karyawan' );
            exit;

        }

        $this->load->model( 'karyawan_m' );
        $this->data['data_karyawan'] = $this->karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'] ] );
        if ( !isset( $this->data['data_karyawan'] ) ) {

            $this->flashmsg( 'Data not found', 'danger' );
            redirect( 'officer/data-karyawan' );
            exit;            

        }

        $this->load->model( 'penilaian_karyawan_m' );

        if ( $this->POST( 'submit' ) ) {

            $kompetensi_inti = $this->POST( 'kompetensi_inti' );
            $KI = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 1 ] );
            if ( !isset( $KI ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 1,
                    'bobot'         => $kompetensi_inti
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KI->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_inti
                ]);
            }

            $kompetensi_peran = $this->POST( 'kompetensi_peran' );
            $KP = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 2 ] );
            if ( !isset( $KP ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 2,
                    'bobot'         => $kompetensi_peran
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KP->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_peran
                ]);
            }

            $kompetensi_fungsional = $this->POST( 'kompetensi_fungsional' );
            $KF = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 3 ] );
            if ( !isset( $KF ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 3,
                    'bobot'         => $kompetensi_fungsional
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KF->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_fungsional
                ]);
            }

            $kompetensi_pendidikan = $this->POST( 'kompetensi_pendidikan' );
            $KPd = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 4 ] );
            if ( !isset( $KPd ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 4,
                    'bobot'         => $kompetensi_pendidikan
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KPd->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_pendidikan
                ]);
            }

            $kompetensi_pengalaman_kerja = $this->POST( 'kompetensi_pengalaman_kerja' );
            $KPK = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 5 ] );
            if ( !isset( $KPK ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 5,
                    'bobot'         => $kompetensi_pengalaman_kerja
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KPK->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_pengalaman_kerja
                ]);
            }

            $this->load->model( 'fuzzy_m' );
            $this->load->model( 'keputusan_m' );
            $this->load->model( 'hasil_penilaian_m' );
            $Z = $this->fuzzy_m->tsukamoto( $this->data['id_karyawan'] );
            $keputusan = $this->keputusan_m->get_row([
                'nmin >=' => $Z,
                'nmax <=' => $Z
            ]);

            if ( !isset( $keputusan ) ) {

                $keputusan = (object)[
                    'id_keputusan'  => 3,
                    'nama'          => 'Kurang Baik',
                    'nmin'          => 20,
                    'nmax'          => 55
                ];

            }

            $penilaian = $this->hasil_penilaian_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'], 'id_keputusan' => $keputusan->id_keputusan ]);
            if ( !isset( $penilaian ) ) {

                $this->hasil_penilaian_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_keputusan'  => $keputusan->id_keputusan
                ]);

            } else {

                $this->hasil_penilaian_m->update($penilaian->id_hasil, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_keputusan'  => $keputusan->id_keputusan
                ]);

            }

            $this->flashmsg( 'Nilai berhasil disimpan' );
            redirect( 'officer/input-penilaian/' . $this->data['id_karyawan'] );
            exit;

        }

        $this->data['title']    = 'Input Penilaian | ' . $this->title;
        $this->data['content']  = 'officer/input_penilaian';
        $this->template($this->data, 'officer');
    
    }

    public function detail_penilaian() {

        $this->data['id_karyawan']  = $this->uri->segment( 3 );
        if ( !isset( $this->data['id_karyawan'] ) ) {

            $this->flashmsg( 'Required parameter is missing', 'danger' );
            redirect( 'officer/data-penilaian' );
            exit;

        }

        $this->load->model( 'karyawan_m' );
        $this->data['data_karyawan'] = $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'] ]);
        if ( !isset( $this->data['data_karyawan'] ) ) {

            $this->flashmsg( 'Data not found', 'danger' );
            redirect( 'officer/data-penilaian' );
            exit;

        }

        $this->load->model( 'departemen_m' );
        $this->load->model( 'jabatan_m' );
        $this->load->model( 'hasil_penilaian_m' );
        $this->load->model( 'penilaian_karyawan_m' );
        $this->load->model( 'komentar_tacit_m' );

        $this->data['nilai']    = $this->penilaian_karyawan_m->get_nilai([ 'id_karyawan' => $this->data['id_karyawan'] ]);
        $this->data['hasil']    = $this->hasil_penilaian_m->get_hasil( $this->data['id_karyawan'] );
        if ( isset( $this->data['hasil'] ) ) {
            $this->data['komentar'] = $this->komentar_tacit_m->get_by_order( 'waktu', 'DESC', [ 'id_hasil' => $this->data['hasil']->id_hasil ] );

            if ( $this->POST( 'submit' ) ) {

                $this->data['komentar'] = [
                    'komentar'      => $this->POST( 'komentar' ),
                    'id_karyawan'   => $this->session->userdata( 'id_karyawan' ),
                    'id_hasil'      => $this->data['hasil']->id_hasil
                ];
                $this->komentar_tacit_m->insert( $this->data['komentar'] );
                redirect( 'officer/detail-penilaian/' . $this->data['id_karyawan'] );
                exit;

            }
        }
        $this->data['title']    = 'Detail Penilaian | ' . $this->title;
        $this->data['content']  = 'officer/detail_penilaian';
        $this->template( $this->data, 'officer' );

    }

    public function data_keputusan() {

        $this->load->model( 'keputusan_m' );

        if ( $this->POST( 'delete' ) ) {

            $this->keputusan_m->delete( $this->POST( 'id_keputusan' ) );
            $this->flashmsg( 'Data berhasil dihapus' );
            redirect( 'officer/data-keputusan' );
            exit;

        }

        $this->data['keputusan']    = $this->keputusan_m->get();
        $this->data['title']        = 'Data Keputusan | ' . $this->title;
        $this->data['content']      = 'officer/data_keputusan';
        $this->template( $this->data, 'officer' );

    }

    public function input_keputusan() {

        $this->load->model( 'keputusan_m' );
        if ( $this->POST( 'submit' ) ) {

            $this->data['keputusan'] = [
                'nama'  => $this->POST( 'nama' ),
                'nmin'  => $this->POST( 'nmin' ),
                'nmax'  => $this->POST( 'nmax' )
            ];

            $this->keputusan_m->insert( $this->data['keputusan'] );
            $this->flashmsg( 'Data berhasil disimpan' );
            redirect( 'officer/data-keputusan' );

            exit;

        }

        $this->data['title']        = 'Data Keputusan | ' . $this->title;
        $this->data['content']      = 'officer/input_keputusan';
        $this->template( $this->data, 'officer' );

    }

    public function edit_keputusan() {

        $this->data['id_keputusan'] = $this->uri->segment( 3 );
        if ( !isset( $this->data['id_keputusan'] ) ) {

            $this->flashmsg( 'Required parameter is missing', 'danger' );
            redirect( 'officer/data-keputusan' );
            exit;

        }

        $this->load->model( 'keputusan_m' );
        $this->data['keputusan']    = $this->keputusan_m->get_row( [ 'id_keputusan' => $this->data['id_keputusan'] ] );
        if ( !isset( $this->data['keputusan'] ) ) {

            $this->flashmsg( 'Data tidak ditemukan', 'danger' );
            redirect( 'officer/data-keputusan' );
            exit;

        }

        if ( $this->POST( 'submit' ) ) {

            $this->data['keputusan'] = [
                'nama'  => $this->POST( 'nama' ),
                'nmin'  => $this->POST( 'nmin' ),
                'nmax'  => $this->POST( 'nmax' )
            ];
            $this->keputusan_m->update( $this->data['id_keputusan'], $this->data['keputusan'] );
            $this->flashmsg( 'Data berhasil diedit' );
            redirect( 'officer/data-keputusan' );
            exit;

        }

        $this->data['title']    = 'Edit Keputusan | ' . $this->title;
        $this->data['content']  = 'officer/edit_keputusan';
        $this->template( $this->data, 'officer' );

    }

    public function data_departemen() {

        $this->load->model('departemen_m');
        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->departemen_m->delete($this->POST('id'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']        = $this->departemen_m->get();
        $this->data['title']        = 'Data Departemen';
        $this->data['content']      = 'officer/departemen_data';
        $this->template($this->data, 'officer');

    }

    public function tambah_data_departemen() {

        if($this->POST('simpan')){

            $this->data['input'] = [
                'nama_departemen' => $this->POST('departemen'),
                'deskripsi'  => $this->POST('deskripsi')
            ];

            $this->load->model('departemen_m');
            $this->departemen_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data departemen berhasil disimpan');

            redirect('officer/data-departemen');
            exit;
        }


        $this->data['title']        = 'Tambah Data Departemen';
        $this->data['content']      = 'officer/departemen_tambah';
        $this->template($this->data, 'officer');
    }

    public function edit_data_departemen() {  

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('officer/data-departemen');
            exit;
        }

        $this->load->model('departemen_m');
        $this->data['data']        = $this->departemen_m->get_row(['id_departemen' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data departemen tidak ditemukan', 'danger');
            redirect('officer/data-departemen');
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
            redirect('officer/edit-data-departemen/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data Departemen';
        $this->data['content']      = 'officer/departemen_edit';
        $this->template($this->data, 'officer');
    }

    public function data_jabatan() {

        $this->load->model('jabatan_m');
        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->jabatan_m->delete($this->POST('id'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']        = $this->jabatan_m->get();
        $this->data['title']        = 'Data jabatan';
        $this->data['content']      = 'officer/jabatan_data';
        $this->template($this->data, 'officer');

    }

    public function tambah_data_jabatan() {

        if($this->POST('simpan')) {

            $this->data['input'] = [
                'nama_jabatan' => $this->POST('nama_jabatan'),
                'deskripsi'  => $this->POST('deskripsi')
            ];

            $this->load->model('jabatan_m');
            $this->jabatan_m->insert($this->data['input']);

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data jabatan berhasil disimpan');

            redirect('officer/data-jabatan');
            exit;
        }


        $this->data['title']        = 'Tambah Data jabatan';
        $this->data['content']      = 'officer/jabatan_tambah';
        $this->template($this->data, 'officer');

    }

    public function edit_data_jabatan() {

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('officer/data-jabatan');
            exit;
        }

        $this->load->model('jabatan_m');
        $this->data['data']        = $this->jabatan_m->get_row(['id_jabatan' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data jabatan tidak ditemukan', 'danger');
            redirect('officer/data-jabatan');
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
            redirect('officer/edit-data-jabatan/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data jabatan';
        $this->data['content']      = 'officer/jabatan_edit';
        $this->template($this->data, 'officer');

    }

    public function data_fuzzy() {

        $this->load->model('fuzzy_m');
        $this->load->model('kriteria_m');
        if ($this->POST('delete') && $this->POST('id'))
        {
            $this->fuzzy_m->delete($this->POST('id'));
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
            exit;
        }

        $this->data['data']         = $this->fuzzy_m->get();
        $this->data['title']        = 'Data Fuzzy';
        $this->data['content']      = 'officer/fuzzy_data';
        $this->template($this->data, 'officer');

    }

    public function tambah_data_fuzzy() {

        $this->load->model('kriteria_m');
        $this->load->model('fuzzy_m');

        if ($this->POST('simpan'))
        {
            
            $dynamic_form_count = count($this->POST('fuzzy'));
            $fuzzy              = $this->POST('fuzzy');
            $bobot_min          = $this->POST('bobot_min');
            $bobot_max          = $this->POST('bobot_max');

            for ($i = 0; $i < $dynamic_form_count; $i++)
            {

                $this->data['entri'] = [
                    'id_kriteria'   => $this->POST('id_kriteria'),
                    'fuzzy'         => $fuzzy[$i],
                    'bobot_min'     => (int)$bobot_min[$i],
                    'bobot_max'     => (int)$bobot_max[$i]
                ];

                $this->fuzzy_m->insert($this->data['entri']);
            }

            $this->flashmsg('Data Fuzzy berhasil ditambahkan');
            redirect('officer/tambah-data-fuzzy');
            exit;
        }

        $this->data['title']        = 'Tambah Data Fuzzy';
        $this->data['content']      = 'officer/fuzzy_tambah';
        $this->data['kriteria']     = $this->kriteria_m->get();
        $this->template($this->data, 'officer');

    }

    public function edit_data_fuzzy() {

        $this->load->model('kriteria_m');
        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('officer/data-fuzzy');
            exit;
        }

        $this->load->model('fuzzy_m');
        $this->data['data']        = $this->fuzzy_m->get_row(['id_fuzzy' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data fuzzy tidak ditemukan', 'danger');
            redirect('officer/data-fuzzy');
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
            redirect('officer/edit-data-fuzzy/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data Fuzzy';
        $this->data['content']      = 'officer/fuzzy_edit';
        $this->data['kriteria']     = $this->kriteria_m->get();
        $this->template($this->data, 'officer');

    }

}