<?php 

class Hasil_penilaian_m extends MY_Model {

	public function __construct() {

		parent::__construct();
		$this->data['table_name']	= 'hasil_penilaian';
		$this->data['primary_key']	= 'id_hasil';

	}

	public function get_hasil( $id_karyawan ) {

		$this->db->select( '*' );
		$this->db->from( $this->data['table_name'] );
		$this->db->join( 'keputusan', $this->data['table_name'] . '.id_keputusan = keputusan.id_keputusan' );
		$this->db->where([ 'id_karyawan' => $id_karyawan ]);
		$query = $this->db->get();
		return $query->row();

	}

}