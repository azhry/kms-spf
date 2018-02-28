<?php 

class Tacit_knowledge_m extends MY_Model {

	public function __construct() {

		parent::__construct();
		$this->data['table_name']	= 'tacit_knowledge';
		$this->data['primary_key']	= 'id_tacit';

	}

	public function get_knowledge() {

		$this->db->select( '*, keputusan.nama AS kinerja' );
		$this->db->from( $this->data['table_name'] );
		$this->db->join( 'hasil_penilaian', $this->data['table_name'] . '.id_hasil = hasil_penilaian.id_hasil' );
		$this->db->join( 'keputusan', 'hasil_penilaian.id_keputusan = keputusan.id_keputusan' );
		$query = $this->db->get();
		return $query->result();

	}

}