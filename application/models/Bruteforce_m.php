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

			$str = strtolower( $row->kinerja );
			$s_len = strlen( $str );
			if ( $q_len > $s_len ) continue;

			$s_arr = str_split( $str );

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

			}

		}

		return $result;

	}

}