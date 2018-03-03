<?php 

class Manajer extends MY_Controller {

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
        if ( !isset( $this->data['role'] ) or strtolower( $this->data['role']->role ) !== 'manajer' ) {

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

		$this->load->model( 'karyawan_m' );
		$this->data['data_karyawan']	= $this->karyawan_m->get([ 'id_departemen' => $this->data['id_departemen'] ]);
		$this->data['penilaian']		= $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
		$this->data['title']	= 'Dashboard | ' . $this->title;
		$this->data['content']	= 'manajer/dashboard';
		$this->template( $this->data, 'manajer' );

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

        $this->data['data']        	= $this->karyawan_m->get([ 'id_departemen' => $this->session->userdata( 'id_departemen' ) ]);
        $this->data['title']        = 'Data karyawan';
        $this->data['content']      = 'manajer/karyawan_data';
        $this->template($this->data, 'manajer');

	}

	public function detail_data_karyawan() {

		$this->load->model('departemen_m');
        $this->load->model('jabatan_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('manajer/data-karyawan');
            exit;
        }

        $this->load->model('karyawan_m');
        $this->data['data']        = $this->karyawan_m->get_row(['id_karyawan' => $this->data['id']]);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data karyawan tidak ditemukan', 'danger');
            redirect('manajer/data-karyawan');
            exit;
        }

        $this->data['title']        = 'Detail Data Karyawan';
        $this->data['content']      = 'manajer/karyawan_detail';
        $this->template($this->data, 'manajer');

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

            redirect('manajer/data-karyawan');
            exit;
        }


        $this->data['title']        = 'Tambah Data karyawan';
        $this->data['content']      = 'manajer/karyawan_tambah';
        $this->data['departemen']   = $this->departemen_m->get();
        $this->data['jabatan']      = $this->jabatan_m->get();
        $this->template($this->data, 'manajer');

	}

	public function edit_data_karyawan() {

        $this->load->model('departemen_m');
        $this->load->model('jabatan_m');

        $this->data['id'] = $this->uri->segment(3);
        if (!isset($this->data['id']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
            redirect('manajer/data-karyawan');
            exit;
        }

        $this->load->model('karyawan_m');
        $this->data['data']        = $this->karyawan_m->get_row(['id_karyawan' => $this->data['id']]);
       
        if (!isset($this->data['data']))
        {
            $this->flashmsg('<i class="lnr lnr-warning"></i> Data karyawan tidak ditemukan', 'danger');
            redirect('manajer/data-karyawan');
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
            redirect('manajer/edit-data-karyawan/' . $this->data['id']);
            exit;
        }

        $this->data['title']        = 'Edit Data karyawan';
        $this->data['content']      = 'manajer/karyawan_edit';
        $this->data['departemen']   = $this->departemen_m->get();
        $this->data['jabatan']      = $this->jabatan_m->get();
        $this->template($this->data, 'manajer');

    }

	public function data_penilaian() {

		$this->load->model( 'karyawan_m' );
		$this->load->model( 'departemen_m' );
		$this->load->model( 'jabatan_m' );
        $this->load->model( 'bruteforce_m' );

		$this->data['hasil_penilaian']	= $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
        if ( $this->POST( 'query' ) ) {

            $this->data['hasil_penilaian'] = $this->bruteforce_m->search( $this->POST( 'query' ), $this->data['hasil_penilaian'] );

        }

		$this->data['title']			= 'Data Penilaian Karyawan';
		$this->data['content']			= 'manajer/data_penilaian';
		$this->template( $this->data, 'manajer' );

	}

	public function input_penilaian() {

        $this->data['id_karyawan'] = $this->uri->segment( 3 );
        if ( !isset( $this->data['id_karyawan'] ) ) {

            $this->flashmsg( 'Required parameter is missing', 'danger' );
            redirect( 'manajer/data-karyawan' );
            exit;

        }

        $this->load->model( 'karyawan_m' );
        $this->data['data_karyawan'] = $this->karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'] ] );
        if ( !isset( $this->data['data_karyawan'] ) ) {

            $this->flashmsg( 'Data not found', 'danger' );
            redirect( 'manajer/data-karyawan' );
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
            redirect( 'manajer/input-penilaian/' . $this->data['id_karyawan'] );
            exit;

        }

		$this->data['title']	= 'Input Penilaian | ' . $this->title;
		$this->data['content']	= 'manajer/input_penilaian';
		$this->template($this->data, 'manajer');
	
    }

	public function detail_penilaian() {

		$this->data['id_karyawan']	= $this->uri->segment( 3 );
		if ( !isset( $this->data['id_karyawan'] ) ) {

			$this->flashmsg( 'Required parameter is missing', 'danger' );
			redirect( 'manajer/data-penilaian' );
			exit;

		}

		$this->load->model( 'karyawan_m' );
		$this->data['karyawan']	= $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'] ]);
		if ( !isset( $this->data['karyawan'] ) ) {

			$this->flashmsg( 'Data not found', 'danger' );
			redirect( 'manajer/data-penilaian' );
			exit;

		}

		$this->load->model( 'departemen_m' );
		$this->load->model( 'jabatan_m' );
		$this->load->model( 'hasil_penilaian_m' );
		$this->load->model( 'penilaian_karyawan_m' );
		$this->load->model( 'komentar_tacit_m' );

		$this->data['nilai']	= $this->penilaian_karyawan_m->get_nilai([ 'id_karyawan' => $this->data['id_karyawan'] ]);
		$this->data['hasil']	= $this->hasil_penilaian_m->get_hasil( $this->data['id_karyawan'] );
		if ( isset( $this->data['hasil'] ) ) {
			$this->data['komentar']	= $this->komentar_tacit_m->get_by_order( 'waktu', 'DESC', [ 'id_hasil' => $this->data['hasil']->id_hasil ] );

			if ( $this->POST( 'submit' ) ) {

				$this->data['komentar'] = [
					'komentar'		=> $this->POST( 'komentar' ),
					'id_karyawan'	=> $this->session->userdata( 'id_karyawan' ),
					'id_hasil'		=> $this->data['hasil']->id_hasil
				];
				$this->komentar_tacit_m->insert( $this->data['komentar'] );
				redirect( 'manajer/detail-penilaian/' . $this->data['id_karyawan'] );
				exit;

			}
		}
		$this->data['title']	= 'Detail Penilaian | ' . $this->title;
		$this->data['content']	= 'manajer/detail_penilaian';
		$this->template( $this->data, 'manajer' );

	}

	public function tacit_knowledge() {


	}

	public function explicit_knowledge() {


	}

    public function upload_foto()
    { 
        if($this->POST('upload')){
            $id = $this->data['id_karyawan'];
            $this->upload_img($id, 'foto/manajer', 'foto');

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Foto berhasil di upload!');
            redirect('manajer/upload-foto');
            exit;
        }

        $this->data['title']        = 'Upload Foto Profile';
        $this->data['content']      = 'manajer/profile';
        $this->template($this->data, 'manajer');
    } 

}