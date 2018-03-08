<?php 

class Manajer extends MY_Controller {

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
        if ( !isset( $this->data['role'] ) or strtolower( $this->data['role']->role ) !== 'manajer' ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->load->model( 'karyawan_m' );
        $this->data['karyawan'] = $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'] ]);
        $this->data['data_karyawan2'] = $this->data['karyawan'];

        if ( !isset( $this->data['karyawan'] ) ) {

            $this->session->sess_destroy();
            redirect( 'login' );
            exit;

        }

        $this->data['id_departemen'] = $this->session->userdata( 'id_departemen' );

	}

	public function index() {

		$this->load->model( 'karyawan_m' );
        $this->load->model( 'tacit_knowledge_m' );
        $this->load->model( 'explicit_knowledge_m' );
        $this->data['tacit']    = $this->tacit_knowledge_m->get([ 'id_karyawan' => $this->data['id_karyawan'] ]);
        $this->data['explicit'] = $this->explicit_knowledge_m->get([ 'id_karyawan' => $this->data['id_karyawan'] ]);
		$this->data['data_karyawan']	= $this->karyawan_m->get([ 'id_departemen' => $this->data['id_departemen'] ]);
        $this->data['data_penilaian']  = $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
		$this->data['penilaian']		= $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
		$this->data['title']	= 'Dashboard | ' . $this->title;
		$this->data['content']	= 'manajer/dashboard';
		$this->template( $this->data, 'manajer' );

	}

	// public function data_karyawan() {

	// 	$this->load->model('karyawan_m');
 //        $this->load->model('departemen_m');
 //        $this->load->model('jabatan_m');
 //        $this->load->model('hak_akses_m');

 //        if ($this->POST('delete') && $this->POST('id'))
 //        {
 //            $this->karyawan_m->delete($this->POST('id'));

 //            // hapus juga di hak akses
 //            $this->hak_akses_m->delete_by(['id_karyawan' => $this->POST('id')]);
 //            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data berhasil dihapus!');
 //            exit;
 //        }

 //        $this->data['data']        	= $this->karyawan_m->get([ 'id_departemen' => $this->session->userdata( 'id_departemen' ) ]);
 //        $this->data['title']        = 'Data karyawan';
 //        $this->data['content']      = 'manajer/karyawan_data';
 //        $this->template($this->data, 'manajer');

	// }

	// public function detail_data_karyawan() {

	// 	$this->load->model('departemen_m');
 //        $this->load->model('jabatan_m');

 //        $this->data['id'] = $this->uri->segment(3);
 //        if (!isset($this->data['id']))
 //        {
 //            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
 //            redirect('manajer/data-karyawan');
 //            exit;
 //        }

 //        $this->load->model('karyawan_m');
 //        $this->data['data']        = $this->karyawan_m->get_row(['id_karyawan' => $this->data['id']]);
 //        if (!isset($this->data['id']))
 //        {
 //            $this->flashmsg('<i class="lnr lnr-warning"></i> Data karyawan tidak ditemukan', 'danger');
 //            redirect('manajer/data-karyawan');
 //            exit;
 //        }

 //        $this->data['title']        = 'Detail Data Karyawan';
 //        $this->data['content']      = 'manajer/karyawan_detail';
 //        $this->template($this->data, 'manajer');

	// }

	// public function tambah_data_karyawan() {

	// 	$this->load->model('departemen_m');
 //        $this->load->model('jabatan_m');

 //        if($this->POST('simpan')){

 //            $this->data['input'] = [
 //                'id_departemen'     => $this->POST('id_departemen'),
 //                'id_jabatan'        => $this->POST('id_jabatan'),
 //                'username'          => $this->POST('username'),
 //                'password'          => md5($this->POST('password')),
 //                'NIK'               => $this->POST('NIK'),
 //                'nama'              => $this->POST('nama'),
 //                'tempat_lahir'      => $this->POST('tempat_lahir'),
 //                'tgl_lahir'         => $this->POST('tgl_lahir'),
 //                'jenis_kelamin'     => $this->POST('jenis_kelamin'),
 //                'agama'             => $this->POST('agama'),
 //                'alamat'            => $this->POST('alamat'),
 //                'pendidikan'        => $this->POST('pendidikan')
 //            ];

 //            $this->load->model('karyawan_m');
 //            $this->karyawan_m->insert($this->data['input']);

 //            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data karyawan berhasil disimpan');

 //            redirect('manajer/data-karyawan');
 //            exit;
 //        }


 //        $this->data['title']        = 'Tambah Data karyawan';
 //        $this->data['content']      = 'manajer/karyawan_tambah';
 //        $this->data['departemen']   = $this->departemen_m->get();
 //        $this->data['jabatan']      = $this->jabatan_m->get();
 //        $this->template($this->data, 'manajer');

	// }

	// public function edit_data_karyawan() {

 //        $this->load->model('departemen_m');
 //        $this->load->model('jabatan_m');

 //        $this->data['id'] = $this->uri->segment(3);
 //        if (!isset($this->data['id']))
 //        {
 //            $this->flashmsg('<i class="lnr lnr-warning"></i> Required parameter is missing', 'danger');
 //            redirect('manajer/data-karyawan');
 //            exit;
 //        }

 //        $this->load->model('karyawan_m');
 //        $this->data['data']        = $this->karyawan_m->get_row(['id_karyawan' => $this->data['id']]);
       
 //        if (!isset($this->data['data']))
 //        {
 //            $this->flashmsg('<i class="lnr lnr-warning"></i> Data karyawan tidak ditemukan', 'danger');
 //            redirect('manajer/data-karyawan');
 //            exit;
 //        }


 //        if($this->POST('simpan'))
 //        {
 //            if(empty($this->POST('password'))){
 //                $this->data['data_row'] = [
 //                    'id_departemen'     => $this->POST('id_departemen'),
 //                    'id_jabatan'        => $this->POST('id_jabatan'),
 //                    'username'          => $this->POST('username'),
 //                    'NIK'               => $this->POST('NIK'),
 //                    'nama'              => $this->POST('nama'),
 //                    'tempat_lahir'      => $this->POST('tempat_lahir'),
 //                    'tgl_lahir'         => $this->POST('tgl_lahir'),
 //                    'jenis_kelamin'     => $this->POST('jenis_kelamin'),
 //                    'agama'             => $this->POST('agama'),
 //                    'alamat'            => $this->POST('alamat'),
 //                    'pendidikan'        => $this->POST('pendidikan')
 //                ];
 //            }
 //            else {
 //                $this->data['data_row'] = [
 //                    'id_departemen'     => $this->POST('id_departemen'),
 //                    'id_jabatan'        => $this->POST('id_jabatan'),
 //                    'username'          => $this->POST('username'),
 //                    'password'          => md5($this->POST('password')),
 //                    'NIK'               => $this->POST('NIK'),
 //                    'nama'              => $this->POST('nama'),
 //                    'tempat_lahir'      => $this->POST('tempat_lahir'),
 //                    'tgl_lahir'         => $this->POST('tgl_lahir'),
 //                    'jenis_kelamin'     => $this->POST('jenis_kelamin'),
 //                    'agama'             => $this->POST('agama'),
 //                    'alamat'            => $this->POST('alamat'),
 //                    'pendidikan'        => $this->POST('pendidikan')
 //                ];
 //            }

 //            $this->karyawan_m->update($this->data['id'], $this->data['data_row']);
 //            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data karyawan berhasil diedit');
 //            redirect('manajer/edit-data-karyawan/' . $this->data['id']);
 //            exit;
 //        }

 //        $this->data['title']        = 'Edit Data karyawan';
 //        $this->data['content']      = 'manajer/karyawan_edit';
 //        $this->data['departemen']   = $this->departemen_m->get();
 //        $this->data['jabatan']      = $this->jabatan_m->get();
 //        $this->template($this->data, 'manajer');

 //    }

	public function data_penilaian() {

        $this->load->model( 'penilaian_karyawan_m' );
        $this->load->model( 'kriteria_m' );
        $this->load->model( 'karyawan_m' );
        $this->data['hasil_penilaian']  = $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
        $this->data['kriteria'] = $this->kriteria_m->get();
        $this->data['title']    = 'Hasil Penilaian | ' . $this->title;
        $this->data['content']  = 'manajer/hasil_penilaian';
        $this->template( $this->data, 'manajer' );

	}

	public function input_penilaian() {

        $this->data['id_karyawan'] = $this->uri->segment( 3 );
        if ( !isset( $this->data['id_karyawan'] ) ) {

            $this->flashmsg( 'Required parameter is missing', 'danger' );
            redirect( 'manajer/data-karyawan' );
            exit;

        }

        $this->load->model( 'karyawan_m' );
        $this->data['data_karyawan'] = $this->karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'] ] );
        if ( !isset( $this->data['data_karyawan'] ) ) {

            $this->flashmsg( 'Data not found', 'danger' );
            redirect( 'manajer/data-karyawan' );
            exit;            

        }

        $this->load->model( 'penilaian_karyawan_m' );

        if ( $this->POST( 'submit' ) ) {

            $kompetensi_inti = $this->POST( 'kompetensi_inti' );
            $KI = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 1 ] );
            if ( !isset( $KI ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 1,
                    'bobot'         => $kompetensi_inti
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KI->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_inti
                ]);
            }

            $kompetensi_peran = $this->POST( 'kompetensi_peran' );
            $KP = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 2 ] );
            if ( !isset( $KP ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 2,
                    'bobot'         => $kompetensi_peran
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KP->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_peran
                ]);
            }

            $kompetensi_fungsional = $this->POST( 'kompetensi_fungsional' );
            $KF = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 3 ] );
            if ( !isset( $KF ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 3,
                    'bobot'         => $kompetensi_fungsional
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KF->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_fungsional
                ]);
            }

            $kompetensi_pendidikan = $this->POST( 'kompetensi_pendidikan' );
            $KPd = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 4 ] );
            if ( !isset( $KPd ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 4,
                    'bobot'         => $kompetensi_pendidikan
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KPd->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_pendidikan
                ]);
            }

            $kompetensi_pengalaman_kerja = $this->POST( 'kompetensi_pengalaman_kerja' );
            $KPK = $this->penilaian_karyawan_m->get_row( [ 'id_karyawan' => $this->data['id_karyawan'], 'id_kriteria' => 5 ] );
            if ( !isset( $KPK ) ) {
                $this->penilaian_karyawan_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_kriteria'   => 5,
                    'bobot'         => $kompetensi_pengalaman_kerja
                ]);
            } else {
                $this->penilaian_karyawan_m->update($KPK->id_penilaian, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'bobot'         => $kompetensi_pengalaman_kerja
                ]);
            }

            $this->load->model( 'fuzzy_m' );
            $this->load->model( 'keputusan_m' );
            $this->load->model( 'hasil_penilaian_m' );
            $Z = $this->fuzzy_m->tsukamoto( $this->data['id_karyawan'] );
            $keputusan = $this->keputusan_m->get_row([
                'nmin >=' => $Z,
                'nmax <=' => $Z
            ]);

            if ( !isset( $keputusan ) ) {

                $keputusan = (object)[
                    'id_keputusan'  => 3,
                    'nama'          => 'Kurang Baik',
                    'nmin'          => 20,
                    'nmax'          => 55
                ];

            }

            $penilaian = $this->hasil_penilaian_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'], 'id_keputusan' => $keputusan->id_keputusan ]);
            if ( !isset( $penilaian ) ) {

                $this->hasil_penilaian_m->insert([
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_keputusan'  => $keputusan->id_keputusan
                ]);

            } else {

                $this->hasil_penilaian_m->update($penilaian->id_hasil, [
                    'id_karyawan'   => $this->data['id_karyawan'],
                    'id_keputusan'  => $keputusan->id_keputusan
                ]);

            }

            $this->flashmsg( 'Nilai berhasil disimpan' );
            redirect( 'manajer/input-penilaian/' . $this->data['id_karyawan'] );
            exit;

        }

		$this->data['title']	= 'Input Penilaian | ' . $this->title;
		$this->data['content']	= 'manajer/input_penilaian';
		$this->template($this->data, 'manajer');
	
    }

	public function detail_penilaian() {

		$this->data['id_karyawan']	= $this->uri->segment( 3 );
		if ( !isset( $this->data['id_karyawan'] ) ) {

			$this->flashmsg( 'Required parameter is missing', 'danger' );
			redirect( 'manajer/data-penilaian' );
			exit;

		}

		$this->load->model( 'karyawan_m' );
		$this->data['karyawan']	= $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['id_karyawan'] ]);
		if ( !isset( $this->data['karyawan'] ) ) {

			$this->flashmsg( 'Data not found', 'danger' );
			redirect( 'manajer/data-penilaian' );
			exit;

		}

		$this->load->model( 'departemen_m' );
		$this->load->model( 'jabatan_m' );
		$this->load->model( 'hasil_penilaian_m' );
		$this->load->model( 'penilaian_karyawan_m' );
		$this->load->model( 'komentar_tacit_m' );

		$this->data['nilai']	= $this->penilaian_karyawan_m->get_nilai([ 'id_karyawan' => $this->data['id_karyawan'] ]);
		$this->data['hasil']	= $this->hasil_penilaian_m->get_hasil( $this->data['id_karyawan'] );
		// if ( isset( $this->data['hasil'] ) ) {
		// 	$this->data['komentar']	= $this->komentar_tacit_m->get_by_order( 'waktu', 'DESC', [ 'id_hasil' => $this->data['hasil']->id_hasil ] );

		// 	if ( $this->POST( 'submit' ) ) {

		// 		$this->data['komentar'] = [
		// 			'komentar'		=> $this->POST( 'komentar' ),
		// 			'id_karyawan'	=> $this->session->userdata( 'id_karyawan' ),
		// 			'id_hasil'		=> $this->data['hasil']->id_hasil
		// 		];
		// 		$this->komentar_tacit_m->insert( $this->data['komentar'] );
		// 		redirect( 'manajer/detail-penilaian/' . $this->data['id_karyawan'] );
		// 		exit;

		// 	}
		// }
		$this->data['title']	= 'Detail Penilaian | ' . $this->title;
		$this->data['content']	= 'manajer/detail_penilaian';
		$this->template( $this->data, 'manajer' );

	}

    public function hasil_penilaian()
    {
        $this->load->model( 'karyawan_m' );
        $this->load->model( 'departemen_m' );
        $this->load->model( 'jabatan_m' );
        $this->load->model( 'bruteforce_m' );

        $this->data['hasil_penilaian']  = $this->karyawan_m->get_hasil_penilaian([ 'id_departemen' => $this->data['id_departemen'] ]);
        if ( $this->POST( 'query' ) ) {

            $this->data['hasil_penilaian'] = $this->bruteforce_m->search( $this->POST( 'query' ), $this->data['hasil_penilaian'] );

        }

        $this->data['title']            = 'Data Penilaian Karyawan';
        $this->data['content']          = 'manajer/data_penilaian';
        $this->template( $this->data, 'manajer' );
    }

    public function upload_foto()
    { 
        if($this->POST('upload')){
            $id = $this->data['id_karyawan'];
            $this->upload_img($id, 'foto/manajer', 'foto');

            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Foto berhasil di upload!');
            redirect('manajer/upload-foto');
            exit;
        }

        $this->data['title']        = 'Upload Foto Profile';
        $this->data['content']      = 'manajer/profile';
        $this->template($this->data, 'manajer');
    } 

    public function knowledge_sharing() {

        $this->load->model( 'tacit_knowledge_m' );
        $this->load->model( 'explicit_knowledge_m' );
        $this->data['tacit']    = $this->tacit_knowledge_m->get();
        $this->data['explicit'] = $this->explicit_knowledge_m->get();
        $this->data['title']    = 'Knowledge Sharing | ' . $this->title;
        $this->data['content']  = 'manajer/knowledge_sharing';
        $this->template( $this->data, 'manajer' );

    }

    public function tacit_knowledge() {

        $this->load->model( 'tacit_knowledge_m' );
        if ( $this->GET( 'delete' ) && $this->GET( 'id_tacit' ) ) {

            $this->tacit_knowledge_m->delete_by([ 'id_tacit' => $this->GET( 'id_tacit' ), 'id_karyawan' => $this->data['id_karyawan'] ]);
            $this->flashmsg( 'Tacit knowledge telah dihapus' );
            redirect( 'manajer/tacit-knowledge' );
            exit;

        }

        if($this->POST('ubah_status') && $this->POST('id_tacit')){
            $tacit = $this->tacit_knowledge_m->get_row(['id_tacit' => $this->POST('id_tacit')]);
 
            if (isset($tacit))
            {
                $id = $this->POST('id_tacit');

                if ($tacit->status == '1')
                {
                    $this->tacit_knowledge_m->update($id, ['status' => '0']);
                    echo '<button class="btn btn-danger" onclick="changeStatus('.$id.')"><i class="fa fa-close"></i> Belum Valid</button>';
                }
                else
                {
                    $this->tacit_knowledge_m->update($id, ['status' => '1']);
                    echo '<button class="btn btn-success" onclick="changeStatus('.$id.')"><i class="fa fa-check"></i> Valid</button>';   
                }
            }
            exit;
        }

        $this->data['tacit']    = $this->tacit_knowledge_m->get();
        $this->data['title']    = 'Tacit Knowledge | ' . $this->title;
        $this->data['content']  = 'manajer/tacit_knowledge';
        $this->template( $this->data, 'manajer' );

    }

    public function detail_tacit() {

        $this->data['id_tacit'] = $this->uri->segment( 3 );
        if ( !isset( $this->data['id_tacit'] ) ) {

            $this->flashmsg( 'Required parameter is missing', 'danger' );
            redirect( 'manajer/tacit-knowledge' );
            exit;

        }

        $this->load->model( 'tacit_knowledge_m' );
        $this->data['tacit']    = $this->tacit_knowledge_m->get_row([ 'id_tacit' => $this->data['id_tacit'] ]);
        if ( !isset( $this->data['tacit'] ) ) {

            $this->flashmsg( 'Data not found', 'danger' );
            redirect( 'manajer/tacit-knowledge' );
            exit;

        }

        if ( isset( $this->data['tacit'] ) ) {

            $this->load->model( 'komentar_tacit_m' );
            $this->data['komentar'] = $this->komentar_tacit_m->get_by_order( 'waktu', 'DESC', [ 'id_tacit' => $this->data['tacit']->id_tacit ] );

            if ( $this->POST( 'submit' ) ) {

                $this->data['komentar'] = [
                    'komentar'      => $this->POST( 'komentar' ),
                    'id_karyawan'   => $this->session->userdata( 'id_karyawan' ),
                    'id_tacit'      => $this->data['tacit']->id_tacit
                ];
                $this->komentar_tacit_m->insert( $this->data['komentar'] );
                redirect( 'manajer/detail-tacit/' . $this->data['id_tacit'] );
                exit;

            }
        }

        $this->load->model( 'karyawan_m' );
        $this->data['penerbit']     = $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['tacit']->id_karyawan ]);

        $this->load->model( 'hasil_penilaian_m' );
        $this->load->model( 'keputusan_m' );
        $this->load->model( 'penilaian_karyawan_m' );
        $this->load->model( 'kriteria_m' );

        $this->data['hasil_penilaian']  = $this->hasil_penilaian_m->get_row([ 'id_hasil' => $this->data['tacit']->id_hasil ]);
        $this->data['keputusan']        = $this->keputusan_m->get_row([ 'id_keputusan' => $this->data['hasil_penilaian']->id_keputusan ]);
        $this->data['penilaian']        = $this->penilaian_karyawan_m->get([ 'id_karyawan' => $this->data['hasil_penilaian']->id_karyawan ]);

        $this->data['title']    = 'Detail Tacit | ' . $this->title;
        $this->data['content']  = 'manajer/detail_tacit';
        $this->template( $this->data, 'manajer' );

    }

    public function explicit_knowledge() {

        $this->load->model( 'explicit_knowledge_m' );
        if ( $this->GET( 'delete' ) && $this->GET( 'id_explicit' ) ) {

            $this->explicit_knowledge_m->delete_by([ 'id_explicit' => $this->GET( 'id_explicit' ), 'id_karyawan' => $this->data['id_karyawan'] ]);
            $this->flashmsg( 'Explicit knowledge telah dihapus' );
            redirect( 'manajer/explicit-knowledge' );
            exit;

        }

        if($this->POST('ubah_status') && $this->POST('id_explicit')){
            $explicit = $this->explicit_knowledge_m->get_row(['id_explicit' => $this->POST('id_explicit')]);
 
            if (isset($explicit))
            {
                $id = $this->POST('id_explicit');

                if ($explicit->status == '1')
                {
                    $this->explicit_knowledge_m->update($id, ['status' => '0']);
                    echo '<button class="btn btn-danger" onclick="changeStatus('.$id.')"><i class="fa fa-close"></i> Belum Valid</button>';
                }
                else
                {
                    $this->explicit_knowledge_m->update($id, ['status' => '1']);
                    echo '<button class="btn btn-success" onclick="changeStatus('.$id.')"><i class="fa fa-check"></i> Valid</button>';   
                }
            }
            exit;
        }

        $this->data['explicit']    = $this->explicit_knowledge_m->get();
        $this->data['title']    = 'Explicit Knowledge | ' . $this->title;
        $this->data['content']  = 'manajer/explicit_knowledge';
        $this->template( $this->data, 'manajer' );

    }

    public function detail_explicit() {

        $this->data['id_explicit'] = $this->uri->segment( 3 );
        if ( !isset( $this->data['id_explicit'] ) ) {

            $this->flashmsg( 'Required parameter is missing', 'danger' );
            redirect( 'manajer/explicit-knowledge' );
            exit;

        }

        $this->load->model( 'explicit_knowledge_m' );
        $this->data['explicit']    = $this->explicit_knowledge_m->get_row([ 'id_explicit' => $this->data['id_explicit'] ]);
        if ( !isset( $this->data['explicit'] ) ) {

            $this->flashmsg( 'Data not found', 'danger' );
            redirect( 'manajer/explicit-knowledge' );
            exit;

        }

        if ( isset( $this->data['explicit'] ) ) {

            $this->load->model( 'komentar_explicit_m' );
            $this->data['komentar'] = $this->komentar_explicit_m->get_by_order( 'waktu', 'DESC', [ 'id_explicit' => $this->data['explicit']->id_explicit ] );

            if ( $this->POST( 'submit' ) ) {

                $this->data['komentar'] = [
                    'komentar'      => $this->POST( 'komentar' ),
                    'id_karyawan'   => $this->session->userdata( 'id_karyawan' ),
                    'id_explicit'      => $this->data['explicit']->id_explicit
                ];
                $this->komentar_explicit_m->insert( $this->data['komentar'] );
                redirect( 'manajer/detail-explicit/' . $this->data['id_explicit'] );
                exit;

            }
        }

        $this->load->model( 'karyawan_m' );
        $this->data['penerbit']     = $this->karyawan_m->get_row([ 'id_karyawan' => $this->data['explicit']->id_karyawan ]);

        $this->load->model( 'hasil_penilaian_m' );
        $this->load->model( 'keputusan_m' );
        $this->load->model( 'penilaian_karyawan_m' );
        $this->load->model( 'kriteria_m' );

        $this->data['hasil_penilaian']  = $this->hasil_penilaian_m->get_row([ 'id_hasil' => $this->data['explicit']->id_hasil ]);
        $this->data['keputusan']        = $this->keputusan_m->get_row([ 'id_keputusan' => $this->data['hasil_penilaian']->id_keputusan ]);
        $this->data['penilaian']        = $this->penilaian_karyawan_m->get([ 'id_karyawan' => $this->data['hasil_penilaian']->id_karyawan ]);

        $this->data['title']    = 'Detail Explicit | ' . $this->title;
        $this->data['content']  = 'manajer/detail_explicit';
        $this->template( $this->data, 'manajer' );

    }
}