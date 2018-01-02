<?php 

class Login_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login($data)
	{

		$this->load->model('karyawan_m');
		$karyawan = $this->karyawan_m->get_row([
			'username' 		=> $data['username'],
			'password'		=> $data['password']
		]);

		if ($karyawan)
		{
			$this->session->set_userdata([
				'id_karyawan'	=> $karyawan->id_karyawan,
				'username'		=> $karyawan->username
			]);
		}
		return $karyawan;
	}

	public function cek_akses($id_karyawan, $id_role){

		$hak_akses = $this->db->query('SELECT * FROM `hak_akses` WHERE id_role = '.$id_role.' and id_karyawan = '.$id_karyawan.'')->result();

		if (count($hak_akses) == 1)
		{
			$this->session->set_userdata([
				'id_karyawan'	=> $hak_akses->id_karyawan,
				'id_role'		=> $hak_akses->id_role
			]);
		}
		return $hak_akses;
	}
}