<?php 

class Jalan_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'jalan';
		$this->data['primary_key']	= 'id_data';
	}
}