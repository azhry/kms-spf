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

		echo 'Dashboard';

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

	public function data_penilaian() {

		$this->load->model( 'karyawan_m' );
		$this->load->model( 'departemen_m' );
		$this->load->model( 'jabatan_m' );
		$this->data['hasil_penilaian']	= $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
		$this->data['title']			= 'Data Penilaian Karyawan';
		$this->data['content']			= 'manajer/data_penilaian';
		$this->template( $this->data, 'manajer' );

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

}