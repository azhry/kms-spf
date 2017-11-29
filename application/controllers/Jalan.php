<?php 

class Jalan extends MY_Controller
{
	private $response;

	public function __construct()
	{
		parent::__construct();
		$this->response['error'] 			= false;
		$this->response['error_message']	= '';
		$this->response['data']				= [];
		
		$this->load->model('jalan_m');
	}

	public function set_jalan()
	{
		$request_method = $this->METHOD();

		if ($request_method == 'post')
		{
			$postdata 	= json_decode(file_get_contents('php://input'));
			$nama		= $postdata->nama;
			$kelurahan	= $postdata->kelurahan;
			$kecamatan	= $postdata->kecamatan;
			$tipe		= $postdata->tipe;
			$kondisi	= $postdata->kondisi;
			$latitude	= $postdata->latitude;
			$longitude	= $postdata->longitude;
			// $nama		= $this->POST('nama');
			// $kelurahan	= $this->POST('kelurahan');
			// $kecamatan	= $this->POST('kecamatan');
			// $tipe		= $this->POST('tipe');
			// $kondisi	= $this->POST('kondisi');
			// $latitude	= $this->POST('latitude');
			// $longitude	= $this->POST('longitude');
			if (isset($nama, $kelurahan, $kecamatan, $tipe, $kondisi, $latitude, $longitude))
			{
				$this->jalan_m->insert([
					'nama'		=> $nama,
					'kelurahan'	=> $kelurahan,
					'kecamatan'	=> $kecamatan,
					'tipe'		=> $tipe,
					'kondisi'	=> $kondisi,
					'latitude'	=> $latitude,
					'longitude'	=> $longitude
				]);

				$upload_path = realpath(APPPATH . '../img/');
				$config = [
					'file_name'			=> $this->db->insert_id() . '.jpg',
					'allowed_types'		=> 'jpg|jpeg|png',
					'upload_path'		=> $upload_path
				];
				$this->load->library('upload');
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('foto'))
				{
					$this->response['error']			= true;
					$this->response['error_message']	= 'Error while uploading image';
				}
			}
			else
			{
				$this->response['error']			= true;
				$this->response['error_message']	= 'Required parameters are missing';
			}
		}
		else
		{
			$this->response['error'] 			= true;
			$this->response['error_message']	= 'Request aborted';
		}

		echo json_encode($this->response);
	}

	public function edit_jalan()
	{
		$request_method = $this->METHOD();

		if ($request_method == 'post')
		{
			$postdata 	= json_decode(file_get_contents('php://input'));
			$nama		= $postdata->nama;
			$kelurahan	= $postdata->kelurahan;
			$kecamatan	= $postdata->kecamatan;
			$tipe		= $postdata->tipe;
			$kondisi	= $postdata->kondisi;
			$latitude	= $postdata->latitude;
			$longitude	= $postdata->longitude;
			if (isset($nama, $kelurahan, $kecamatan, $tipe, $kondisi, $latitude, $longitude))
			{
				$this->jalan_m->update($postdata->id_data, [
					'nama'		=> $nama,
					'kelurahan'	=> $kelurahan,
					'kecamatan'	=> $kecamatan,
					'tipe'		=> $tipe,
					'kondisi'	=> $kondisi,
					'latitude'	=> $latitude,
					'longitude'	=> $longitude
				]);

				$upload_path = realpath(APPPATH . '../img/');
				$config = [
					'file_name'			=> $this->db->insert_id() . '.jpg',
					'allowed_types'		=> 'jpg|jpeg|png',
					'upload_path'		=> $upload_path
				];
				$this->load->library('upload');
				$this->upload->initialize($config);

				$this->upload->do_upload('foto')
			}
			else
			{
				$this->response['error']			= true;
				$this->response['error_message']	= 'Required parameters are missing';
			}
		}
		else
		{
			$this->response['error'] 			= true;
			$this->response['error_message']	= 'Request aborted';
		}

		echo json_encode($this->response);	
	}

	public function get_jalan()
	{
		$type = $this->GET('type', true);
		$query_string = $_GET;
		unset($query_string['type']);
		$fields = $query_string;

		if (isset($type) && $type == 'one')
		{
			if (count($fields) > 0)
			{
				$this->response['data'] = $this->jalan_m->select_row(['*'], $fields);
			}
			else
			{
				$this->response['data'] = $this->jalan_m->select_row();
			}
		}
		else
		{
			if (count($fields) > 0)
			{
				$this->response['data'] = $this->jalan_m->select(['*'], $fields);
			}
			else
			{
				$this->response['data'] = $this->jalan_m->select();
			}
		}

		echo json_encode($this->response);
	}

	public function delete_jalan()
	{
		$request_method = $this->METHOD();
		if ($request_method == 'post')
		{
			$postdata = json_decode(file_get_contents('php://input'));
			$this->jalan_m->delete($postdata->id_data);
		}
		else
		{
			$this->response['error'] 			= true;
			$this->response['error_message']	= 'Request aborted';
		}

		echo json_encode($this->response);
	}
}

