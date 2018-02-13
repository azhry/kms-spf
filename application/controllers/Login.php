<?php 

class Login extends MY_Controller
{
	public function __construct() {

		parent::__construct();
		$this->data['id_karyawan']	= $this->session->userdata( 'id_karyawan' );
		$this->data['id_role']		= $this->session->userdata( 'id_role' );

		if ( isset( $this->data['id_karyawan'], $this->data['id_role'] ) ) {

			$this->load->model( 'hak_akses_m' );
			$hak_akses = $this->hak_akses_m->get_row([
				'id_role'		=> $this->data['id_role'],
				'id_karyawan'	=> $this->data['id_karyawan']
			]);

			if ( isset( $hak_akses ) ) {

				switch ( $this->data['id_role'] ) {

					case 1:
						redirect( 'admin' );
						break;

					case 2:
						redirect( 'manajer' );
						exit;

				}

			}

		}

	}

	public function index() {	

		$this->load->model( 'login_m' );
		$this->load->model( 'role_m' );

		if ( $this->POST('submit') ) {
			
			$data = [
				'username'	=> $this->POST( 'username' ),
				'password'	=> md5( $this->POST( 'password' ) ),
				'id_role'	=> $this->POST( 'id_role' )
			];

			if ( !$this->login_m->login( $data ) ) {
				$this->flashmsg( 'Username atau password salah', 'danger' );
			}

			redirect( 'login' );
			exit;

		}

		$this->data['title']  = 'Login | ' . $this->title;
        $this->data['role']   = $this->role_m->get();
		$this->load->view('login',$this->data);

	}
}