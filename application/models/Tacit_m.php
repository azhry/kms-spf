<?php 

class Tacit_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'tacit';
		$this->data['primary_key']	= 'id_tacit';
	}

	public function get_tacit()
	{
		$this->db->select('*');
		$this->db->from($this->data['table_name']);
		$this->db->order_by($this->data['table_name'] . '.waktu', 'DESC');
		$this->db->join('user', $this->data['table_name'] . '.nip = user.nip');
		$query = $this->db->get();
		return $query->result();
	}
}