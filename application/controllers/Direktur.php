<?php 

class Direktur extends MY_Controller {

	public function __construct() {

		parent::__construct();
		$this->data['id_karyawan']  = $this->session->userdata('id_karyawan');
        $this->data['id_role']      = $this->session->userdata('id_role');

        if ( !isset( $this->data['id_karyawan'], $this->data['id_role'] ) ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->load->model( 'hak_akses_m' );
        $this->data['hak_akses'] = $this->hak_akses_m->get_row([
            'id_karyawan'   => $this->data['id_karyawan'],
            'id_role'       => $this->data['id_role']
        ]);

        if ( !isset( $this->data['hak_akses'] ) ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->load->model( 'role_m' );
        $this->data['role'] = $this->role_m->get_row([ 'id_role' => $this->data['hak_akses']->id_role ]);
        if ( !isset( $this->data['role'] ) or strtolower( $this->data['role']->role ) !== 'direktur' ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->load->model( 'karyawan_m' );
        $this->data['karyawan'] = $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'] ]);

        if ( !isset( $this->data['karyawan'] ) ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->data['id_departemen'] = $this->session->userdata( 'id_departemen' );

	}

	public function index() {

		$this->data['hasil_penilaian']	= $this->karyawan_m->get_hasil_penilaian();
		$this->data['title']			= 'Dashboard | ' . $this->title;
		$this->data['content']			= 'direktur/dashboard';
		$this->template( $this->data, 'direktur' );

	}

	public function data_penilaian() {

        $this->load->model( 'karyawan_m' );
        $this->load->model( 'departemen_m' );
        $this->load->model( 'jabatan_m' );
        $this->data['hasil_penilaian']  = $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
        $this->data['title']            = 'Data Penilaian Karyawan';
        $this->data['content']          = 'direktur/data_penilaian';
        $this->template( $this->data, 'direktur' );

    }

	public function detail_penilaian() {

        $this->data['id_karyawan']  = $this->uri->segment( 3 );
        if ( !isset( $this->data['id_karyawan'] ) ) {

            $this->flashmsg( 'Required parameter is missing', 'danger' );
            redirect( 'direktur/data-penilaian' );
            exit;

        }

        $this->load->model( 'karyawan_m' );
        $this->data['data_karyawan'] = $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'] ]);
        if ( !isset( $this->data['data_karyawan'] ) ) {

            $this->flashmsg( 'Data not found', 'danger' );
            redirect( 'direktur/data-penilaian' );
            exit;

        }

        $this->load->model( 'departemen_m' );
        $this->load->model( 'jabatan_m' );
        $this->load->model( 'hasil_penilaian_m' );
        $this->load->model( 'penilaian_karyawan_m' );
        $this->load->model( 'komentar_tacit_m' );

        $this->data['nilai']    = $this->penilaian_karyawan_m->get_nilai([ 'id_karyawan' => $this->data['id_karyawan'] ]);
        $this->data['hasil']    = $this->hasil_penilaian_m->get_hasil( $this->data['id_karyawan'] );
        if ( isset( $this->data['hasil'] ) ) {
            $this->data['komentar'] = $this->komentar_tacit_m->get_by_order( 'waktu', 'DESC', [ 'id_hasil' => $this->data['hasil']->id_hasil ] );

            if ( $this->POST( 'submit' ) ) {

                $this->data['komentar'] = [
                    'komentar'      => $this->POST( 'komentar' ),
                    'id_karyawan'   => $this->session->userdata( 'id_karyawan' ),
                    'id_hasil'      => $this->data['hasil']->id_hasil
                ];
                $this->komentar_tacit_m->insert( $this->data['komentar'] );
                redirect( 'direktur/detail-penilaian/' . $this->data['id_karyawan'] );
                exit;

            }
        }
        $this->data['title']    = 'Detail Penilaian | ' . $this->title;
        $this->data['content']  = 'direktur/detail_penilaian';
        $this->template( $this->data, 'direktur' );

    }

    public function buat_laporan() {

    	$this->load->model( 'karyawan_m' );
    	$this->load->model( 'penilaian_karyawan_m' );
    	$this->load->model( 'departemen_m' );
    	$this->load->model( 'jabatan_m' );

    	$this->data['hasil_penilaian']	= $this->karyawan_m->get_hasil_penilaian();
    	$html = $this->load->view('direktur/laporan_penilaian', $this->data, true);
    	$pdfFilePath = 'Laporan Penilaian Karyawan - ' . date('Y-m-d') . '.pdf';
    	$this->load->library('m_pdf');
    	$this->m_pdf->pdf->WriteHTML($html);
    	$this->m_pdf->pdf->Output($pdfFilePath, "D");

    }

    public function upload_foto()
    { 
        if($this->POST('upload')){
            $id = $this->data['id_karyawan'];
            $this->upload_img($id, 'foto/direktur', 'foto');

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Foto berhasil di upload!');
            redirect('direktur/upload-foto');
            exit;
        }

        $this->data['title']        = 'Upload Foto Profile';
        $this->data['content']      = 'direktur/profile';
        $this->template($this->data, 'direktur');
    } 

}