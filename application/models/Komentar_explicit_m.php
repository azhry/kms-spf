<?php 

class Komentar_explicit_m extends MY_Model {

	public function __construct() {

		parent::__construct();
		$this->data['table_name']	= 'komentar_explicit';
		$this->data['primary_key']	= 'id_komentar';

	}

}