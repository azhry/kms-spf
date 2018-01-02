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
		$this->load->model('login_m');
		$this->load->model('role_m');

		if ($this->input->post('login-submit'))
		{
			$this->data = [
				'username'	=> $this->input->post('username'),
				'password'	=> md5($this->input->post('password'))
			];

			$cek_karyawan 	= $this->login_m->login($this->data);

			if(count($cek_karyawan) < 1){
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Anda tidak terdaftar!</div>');
				redirect('login');
				exit;
			}

			$id_karyawan 	= $this->session->userdata('id_karyawan');
			$id_role		= $this->input->post('role');

			$cek_hak_akses 	= $this->login_m->cek_akses($id_karyawan, $id_role);

			if(count($cek_hak_akses) == 1){
				redirect('admin');
				exit;
			}
			else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Username atau password salah!</div>');
				redirect('login');
				exit;
			}
		}

		$this->data['title']  = 'Login | ' . $this->title;
        $this->data['role']   = $this->role_m->get();
		$this->load->view('login',$this->data);
	}
}