<?php 

class Fuzzy_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'fuzzy';
		$this->data['primary_key']	= 'id_fuzzy';
	}
}