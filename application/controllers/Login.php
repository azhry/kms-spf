<?php 

class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->data['nip']	= $this->session->userdata('nip');
		if (isset($this->data['nip']))
		{
			$this->data['role'] = $this->session->userdata('role');
			if (isset($this->data['role']))
			{
				switch ($this->data['role'])
				{
					case 'admin':
						redirect('admin');
						exit;

					case 'kepala dinas':
						redirect('kepala-dinas');
						exit;
				}
			}
		}
	}

	public function index()
	{
		$this->data['title']	= 'Login | ' . $this->title;
		$this->data['content']	= 'login';
		$this->load->view('login', $this->data);
	}

	public function login_process()
	{
		if ($this->POST('login-submit'))
		{
			$this->load->model('login_m');
			$account = $this->login_m->login($this->POST('nip'), md5($this->POST('password')));
			if (!$account)
			{
				$this->flashmsg('<i class="fa fa-warning"></i> NIP atau password salah', 'danger');
			}
		}

		redirect('login');
	}

	public function secret_login_url()
	{
		$this->load->model('pegawai_m');
		$postdata = json_decode(file_get_contents('php://input'));
		// echo json_encode($postdata);exit; 
		$response['error'] = false;
		$nip 		= $postdata->nip;
		$password 	= $postdata->password;
		if (isset($nip, $password))
		{
			$check_account = $this->pegawai_m->get_row([
				'nip' 		=> $nip,
				'password' 	=> md5($password)
			]);
			if (!isset($check_account))
			{
				$response['error'] 			= true;
				$response['error_status']	= 1;
				$response['error_message']	= 'Wrong username or password'; 
			}
			else
			{
				$updated_at = date('Y-m-d H:i:s');
				$ip_address = $this->input->ip_address();
				$access_token = base64_encode($check_account->nip) . '.' .
							base64_encode($ip_address) . '.' . 
							base64_encode($updated_at);
				$entry = [
					'access_token'	=> $access_token,
				];

				$this->pegawai_m->update($check_account->nip, $entry);
				// $response['access_token'] =  $access_token;
				$response['profile']	= json_encode($check_account);
			}
		}
		else
		{
			$response['error'] 			= true;
			$response['error_status']	= 2;
			$response['error_message']	= 'Required parameter is missing'; 
		}

		echo json_encode($response);
	}

	public function check_access_token()
	{
		$this->load->model('pegawai_m');
		$response['error'] = false;
		$access_token = $this->POST('access_token');
		$token_generic = explode('.', $access_token);
		if (count($token_generic) > 1)
		{
			$nip 		= base64_decode($token_generic[0]);
			$username 	= base64_decode($token_generic[1]);
			$verify = $this->pegawai_m->select_row(['access_token'], [
				'access_token' 	=> $access_token,
				'nip'			=> $nip
			]);
			if ($verify)
			{
				$updated_at = date('Y-m-d H:i:s');
				$ip_address = $this->input->ip_address();
				$access_token = base64_encode($nip) . '.' .
							base64_encode($ip_address) . '.' . 
							base64_encode($updated_at);
				$entry = [
					'access_token'	=> $access_token
				];

				$this->pegawai_m->update($nip, $entry);
				$response['access_token'] =  $access_token;
			}
			else
			{
				$response['error']			= true;
				$response['error_status']	= 1;
				$response['error_message']	= 'You have no authorized access. Please login!';
			}	
		}
		else
		{
			$response['error']			= true;
			$response['error_status']	= 1;
			$response['error_message']	= 'You have no authorized access. Please login!';
		}
		
		echo json_encode($response);
	}
}