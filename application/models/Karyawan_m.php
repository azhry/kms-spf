<?php 

class Karyawan_m extends MY_Model
{
	public function __construct() {

		parent::__construct();
		$this->data['table_name']	= 'karyawan';
		$this->data['primary_key']	= 'id_karyawan';
	
	}

	public function get_hasil_penilaian( $cond = '' ) {

		$this->db->select( '*, karyawan.nama AS nama_karyawan, keputusan.nama AS kinerja' );
		$this->db->from( $this->data['table_name'] );
		$this->db->join( 'hasil_penilaian', $this->data['table_name'] . '.id_karyawan = hasil_penilaian.id_karyawan', 'left' );
		$this->db->join( 'keputusan', 'hasil_penilaian.id_keputusan = keputusan.id_keputusan' );
		if ( ( is_array( $cond ) && count( $cond ) > 0 ) or ( is_string( $cond ) && strlen( $cond ) >= 3 ) ) {
			$this->db->where( $cond );
		}
		$query = $this->db->get();
		return $query->result();

	}
}