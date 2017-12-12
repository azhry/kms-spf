<?php 

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['title']	= 'Dashboard | ' . $this->title;
		$this->data['content']	= 'admin/dashboard';
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

	public function user()
	{
		$this->data['title']	= 'Daftar User | ' . $this->title;
		$this->data['content']	= 'admin/user';
		$this->template($this->data, 'admin');
	}

	public function tambah_user()
	{
		$this->data['title']	= 'Tambah User | ' . $this->title;
		$this->data['content']	= 'admin/tambah_user';
		$this->template($this->data, 'admin');
	}

	public function edit_user()
	{
		$this->data['title']	= 'Edit User | ' . $this->title;
		$this->data['content']	= 'admin/edit_user';
		$this->template($this->data, 'admin');
	}
}