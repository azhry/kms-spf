<?php 

class Karyawan extends MY_Controller
{
    public function __construct()
    {
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
        if ( !isset( $this->data['role'] ) or strtolower( $this->data['role']->role ) !== 'karyawan' ) {

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

    }

    public function index()
    {
        $this->data['data_karyawan'] = $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'] ]);

        $this->load->model( 'departemen_m' );
        $this->load->model( 'jabatan_m' );
        $this->load->model( 'hasil_penilaian_m' );
        $this->load->model( 'penilaian_karyawan_m' );
        $this->load->model( 'komentar_tacit_m' );

        $this->data['nilai']    = $this->penilaian_karyawan_m->get_nilai([ 'id_karyawan' => $this->data['id_karyawan'] ]);
        $this->data['hasil']    = $this->hasil_penilaian_m->get_hasil( $this->data['id_karyawan'] );
        // if ( isset( $this->data['hasil'] ) ) {
        //     $this->data['komentar'] = $this->komentar_tacit_m->get_by_order( 'waktu', 'DESC', [ 'id_hasil' => $this->data['hasil']->id_hasil ] );

        //     if ( $this->POST( 'submit' ) ) {

        //         $this->data['komentar'] = [
        //             'komentar'      => $this->POST( 'komentar' ),
        //             'id_karyawan'   => $this->session->userdata( 'id_karyawan' ),
        //             'id_hasil'      => $this->data['hasil']->id_hasil
        //         ];
        //         $this->komentar_tacit_m->insert( $this->data['komentar'] );
        //         redirect( 'officer/detail-penilaian/' . $this->data['id_karyawan'] );
        //         exit;

        //     }
        // }

        $this->load->view('karyawan/detail_penilaian',$this->data);
    }
}