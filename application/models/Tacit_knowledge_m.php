<?php 

class Tacit_knowledge_m extends MY_Model {

	public function __construct() {

		parent::__construct();
		$this->data['table_name']	= 'tacit_knowledge';
		$this->data['primary_key']	= 'id_tacit';

	}

}