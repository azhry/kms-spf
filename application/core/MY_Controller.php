<?php

class MY_Controller extends CI_Controller
{
  	public $title = 'Knowledge Management System - PT. Sumatera Prima Fibreboard';
	
	public function __construct()
	{
		parent::__construct();
		// $this->load->library('lib_log');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function template($data, $module = NULL)
	{
		if ($module == NULL)
		{
			return $this->load->view('includes/layout', $data);
		}
		else
		{
			$data['module'] = $module;
			return $this->load->view($module . '/includes/layout', $data);
		}
	}

	public function POST($name)
	{
		return $this->input->post($name);
	}

	public function GET($name, $clean = false)
	{
		return $this->input->get($name, $clean);
	}

	public function METHOD()
	{
		return $this->input->method();
	}

	public function flashmsg($msg, $type = 'success',$name='msg')
	{
		return $this->session->set_flashdata($name, '<div class="alert alert-'.$type.' alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$msg.'</div>');
	}

	public function upload($id, $directory, $tag_name = 'userfile')
	{
		if ($_FILES[$tag_name])
		{
			$upload_path = realpath(APPPATH . '../assets/' . $directory . '/');
			@unlink($upload_path . '/' . $id . '.pdf');
			$config = [
				'file_name' 		=> $id . '.pdf',
				'allowed_types'		=> 'pdf',
				'upload_path'		=> $upload_path
			];
			$this->load->library('upload');
			$this->upload->initialize($config);
			return $this->upload->do_upload($tag_name);
		}
		return FALSE;
	}

	public function upload_img($id, $directory, $tag_name = 'userfile')
	{
		if ($_FILES[$tag_name])
		{
			$upload_path = realpath(APPPATH . '../assets/' . $directory . '/');
			@unlink($upload_path . '/' . $id . '.jpg');
			$config = [
				'file_name' 		=> $id. '.jpg',
				'allowed_types'		=> 'jpeg|png|jpg',
				'upload_path'		=> $upload_path
			];
			$this->load->library('upload');
			$this->upload->initialize($config);
			return $this->upload->do_upload($tag_name);
		}
		return FALSE;
	}

	public function dump($var)
	{
		echo '<pre>';
		var_dump($var);
		echo '</pre>';
	}
}
