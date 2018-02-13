<?php 

class Penilaian_karyawan_m extends MY_Model {

	public function __construct() {

		parent::__construct();
		$this->data['table_name']	= 'penilaian_karyawan';
		$this->data['primary_key']	= 'id_penilaian';
	
	}

	public function get_nilai( $cond = '' ) {

		$this->db->select( '*' );
		$this->db->from( $this->data['table_name'] );
		$this->db->join( 'kriteria', $this->data['table_name'] . '.id_kriteria = kriteria.id_kriteria' );
		if ( ( is_array( $cond ) && count( $cond ) > 0 ) or ( is_string( $cond ) && strlen( $cond ) >= 3 ) ) {
			$this->db->where( $cond );
		}
		$query = $this->db->get();
		return $query->result();

	}

}