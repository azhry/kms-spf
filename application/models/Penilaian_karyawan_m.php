<?php 

class Penilaian_karyawan_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'penilaian_karyawan';
		$this->data['primary_key']	= 'id_penilaian';
	}
}