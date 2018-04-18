<?php 

class Bruteforce_m extends MY_Model {

	public function __construct() {

		parent::__construct();

	}

	public function search($query, $data) {

		$query = strtolower( $query );

		$q_len = strlen( $query );
		$q_arr = str_split( $query );

		$result = [];
		foreach ( $data as $row ) {

			$str = strtolower( $row->judul );
			$s_len = strlen( $str );
			if ( $q_len > $s_len ) continue;

			$s_arr = str_split( $str );

			if ( strtolower( $query ) == 'baik'  ) {

				if ( strtolower( $query ) == strtolower( $row->judul ) ) {

					$result []= $row;

				}

			} else {

				if ( $q_len != $s_len ) {

					for ( $i = 0; $i < $s_len; $i++ ) {

						$found = true;
						for ( $j = 0; $j < $q_len; $j++ ) {

							if ( $i + $j >= $s_len ) break;

							if ( $q_arr[$j] != $s_arr[$i + $j] ) {

								$found = false;
								break;
							
							}

						}

						if ( $found ) {

							$result []= $row;
							break;

						}

					}

				} else {

					$found = true;
					for ( $i = 0; $i < $s_len; $i++ ) {

						if ( $q_arr[$i] != $s_arr[$i] ) {

							$found = false;
							break;

						}

					}

					if ( $found ) {
						$result []= $row;
					}

				}

			} 

		}

		return $result;

	}

	public function search_knowledge( $query ) {

		$this->load->model( 'explicit_knowledge_m' );
		// $this->load->model( 'tacit_knowledge_m' );

		$knowledge = $this->explicit_knowledge_m->get_knowledge();
		// $tacit = $this->tacit_knowledge_m->get_knowledge();
		// foreach ( $tacit as $row ) {

		// 	$knowledge []= $row;

		// }

		return $this->search( $query, $knowledge );

	}

}