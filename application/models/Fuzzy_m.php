<?php 

class Fuzzy_m extends MY_Model {

	public function __construct() {

		parent::__construct();
		$this->data['table_name']	= 'fuzzy';
		$this->data['primary_key']	= 'id_fuzzy';

	}

	public function tsukamoto( $id_karyawan ) {

		$fuzzies = $this->fuzzification( $id_karyawan );
		return $this->rule_check( $fuzzies );

	}

	private function fuzzification( $id_karyawan ) {

		$this->load->model( 'kriteria_m' );
		$this->load->model( 'penilaian_karyawan_m' );

		$result = [];
		$kriteria = $this->kriteria_m->get();
		foreach ( $kriteria as $row ) {

			$nilai = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $id_karyawan, 'id_kriteria' => $row->id_kriteria ] );
			$fuzzy = $this->get( [ 'id_kriteria' => $row->id_kriteria ] );
			$result[ $row->label ] = [];
			foreach ( $fuzzy as $f ) {

				$f_label = str_replace( ' ', '_', strtolower( $f->fuzzy ) );
				if ( $f->bobot_min >= 20 && $f->bobot_max <= 55 ) {

					if ( !isset( $nilai ) ) $result[ $row->label ] []= 0;
					else $result[ $row->label ][ $f_label ] = ( 60 - $nilai->bobot ) / 55;

				} else if ( $f->bobot_min >= 60 && $f->bobot_max <= 80 ) {

					if ( !isset( $nilai ) ) $result[ $row->label ] []= 0;
					else $result[ $row->label ][ $f_label ] = ( $nilai->bobot - 55 ) / 60;

				} else if ( $f->bobot_min >= 85 && $f->bobot_max <= 100 ) {

					if ( !isset( $nilai ) ) $result[ $row->label ] []= 0;
					else $result[ $row->label ][ $f_label ] = ( $nilai->bobot - 80 ) / 100;

				}

			}	

		}

		return $result;

	}

	private function rule_check( $fuzzies ) {

		$z_values 	= [];
		$predicate 	= [];

		// rule 1
		$predicate []= min([
			$fuzzies['KI']['baik'],
			$fuzzies['KP']['bisa_memimpin'],
			$fuzzies['KF']['menguasai'],
			$fuzzies['KPd']['d3'],
			$fuzzies['KPK']['pengalaman']
		]);

		$z_values []= $predicate[0] * 50 + 60;


		// rule 2
		$predicate []= min([
			$fuzzies['KI']['sangat_baik'],
			$fuzzies['KP']['sangat_bisa_memimpin'],
			$fuzzies['KF']['sangat_menguasai'],
			$fuzzies['KPd']['s1'],
			$fuzzies['KPK']['sangat_pengalaman']
		]);

		$z_values []= $predicate[1] * 50 + 100;


		// rule 3
		$predicate []= min([
			$fuzzies['KI']['baik'],
			$fuzzies['KP']['bisa_memimpin'],
			$fuzzies['KF']['menguasai'],
			$fuzzies['KPd']['s1'],
			$fuzzies['KPK']['pengalaman']
		]);

		$z_values []= $predicate[2] * 50 + 60;


		// rule 4
		$predicate []= min([
			$fuzzies['KI']['sangat_baik'],
			$fuzzies['KP']['sangat_bisa_memimpin'],
			$fuzzies['KF']['sangat_menguasai'],
			$fuzzies['KPd']['s1'],
			$fuzzies['KPK']['pengalaman']
		]);

		$z_values []= $predicate[3] * 50 + 100;

		echo '<pre>';
		var_dump( $fuzzies );
		echo '</pre>';

		echo '<pre>';
		var_dump( $predicate );
		echo '</pre>';

		$numerator = 0;
		for ( $i = 0; $i < count( $z_values ); $i++ ) {
			echo $predicate[$i] . ' * ' . $z_values[$i] . ' + ';
			$numerator += ( $predicate[$i] * $z_values[$i] );
		}

		echo '<br>';
		$denominator = array_sum( $predicate );
		echo $numerator . '/' . $denominator;

		return $numerator/$denominator;

	}

}