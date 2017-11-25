<?php 

class Login_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login($nip, $password)
	{
		$this->load->model('pegawai_m');
		$pegawai = $this->pegawai_m->get_row([
			'nip' 		=> $nip,
			'password'	=> $password
		]);
		if ($pegawai)
		{
			$this->session->set_userdata([
				'nip'	=> $pegawai->nip,
				'role'	=> $pegawai->role
			]);
		}
		return $pegawai;
	}
}