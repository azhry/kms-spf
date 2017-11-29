<?php 

class Pegawai extends MY_Controller
{
	private $response;

	public function __construct()
	{
		parent::__construct();
		$this->response['error'] 			= false;
		$this->response['error_message']	= '';
		$this->response['data']				= [];
		$this->load->model('pegawai_m');
	}

	public function set_pegawai()
	{
		$request_method = $this->METHOD();

		if ($request_method == 'post')
		{
			$postdata = json_decode(file_get_contents('php://input'));
			$nip 	= $postdata->nip;
			// $nip 		= $this->POST('nip');
			$pegawai = $this->pegawai_m->get_row(['nip'	=> $nip]);
			if (isset($pegawai))
			{
				$this->response['error']			= true;
				$this->response['error_message']	= 'NIP telah dipakai. Silahkan coba NIP lain';
			}
			else
			{
				$nama		= $postdata->nama;
				$jabatan	= $postdata->jabatan;
				$email		= $postdata->email;
				$nomor_hp	= $postdata->nomor_hp;
				$password	= md5($postdata->password);
				// $nama		= $this->POST('nama');
				// $jabatan	= $this->POST('jabatan');
				// $email		= $this->POST('email');
				// $nomor_hp	= $this->POST('nomor_hp');
				// $password	= md5($this->POST('password'));
				if (isset($nip, $nama, $jabatan, $email, $nomor_hp, $password))
				{
					$this->pegawai_m->insert([
						'nip'		=> $nip,
						'nama'		=> $nama,
						'jabatan'	=> $jabatan,
						'email'		=> $email,
						'nomor_hp'	=> $nomor_hp,
						'password'	=> $password
					]);
				}
				else
				{
					$this->response['error']			= true;
					$this->response['error_message']	= 'Required parameters are missing';
				}
			}
		}
		else
		{
			$this->response['error'] 			= true;
			$this->response['error_message']	= 'Request aborted';
		}

		echo json_encode($this->response);
	}

	public function get_pegawai()
	{
		$type = $this->GET('type', true);
		$query_string = $_GET;
		unset($query_string['type']);
		$fields = $query_string;

		if (isset($type) && $type == 'one')
		{
			if (count($fields) > 0)
			{
				$this->response['data'] = $this->pegawai_m->select_row(['*'], $fields);
			}
			else
			{
				$this->response['data'] = $this->pegawai_m->select_row();
			}
		}
		else
		{
			if (count($fields) > 0)
			{
				$this->response['data'] = $this->pegawai_m->select(['*'], $fields);
			}
			else
			{
				$this->response['data'] = $this->pegawai_m->select();
			}
		}

		echo json_encode($this->response);
	}

	public function delete_pegawai()
	{
		$request_method = $this->METHOD();
		if ($request_method == 'post')
		{
			$postdata = json_decode(file_get_contents('php://input'));
			$this->pegawai_m->delete($postdata->nip);
		}
		else
		{
			$this->response['error'] 			= true;
			$this->response['error_message']	= 'Request aborted';
		}

		echo json_encode($this->response);
	}
}