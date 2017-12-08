<?php 

class Nice_admin_documentation extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		redirect(base_url('assets/NiceAdmin'));
	}
}