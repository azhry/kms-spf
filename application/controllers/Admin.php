<?php 

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['title'] 	= 'Dashboard | ' . $this->title;
		$this->data['content']	= 'admin/dashboard';
		$this->template($this->data);
	}

	public function jalan()
	{
		$this->load->model('jalan_m');
		
		if ($this->POST('simpan'))
		{
			$this->data['jalan'] = [
				'nama'			=> $this->POST('nama'),
				'kelurahan'		=> $this->POST('kelurahan'),
				'kecamatan'		=> $this->POST('kecamatan'),
				'tipe'			=> $this->POST('tipe'),
				'kondisi'		=> $this->POST('kondisi'),
				'latitude'		=> $this->POST('latitude'),
				'longitude'		=> $this->POST('longitude')
			];

			$this->jalan_m->insert($this->data['jalan']);
			$this->upload($this->db->insert_id(), '../img', 'foto');

			$this->flashmsg('<i class="fa fa-check"></i> Data jalan baru berhasil disimpan');
			redirect('admin/jalan');
			exit;
		}

		if ($this->POST('edit') && $this->POST('id_data'))
		{
			$this->data['jalan'] = [
				'nama'			=> $this->POST('nama'),
				'kelurahan'		=> $this->POST('kelurahan'),
				'kecamatan'		=> $this->POST('kecamatan'),
				'tipe'			=> $this->POST('tipe'),
				'kondisi'		=> $this->POST('kondisi'),
				'latitude'		=> $this->POST('latitude'),
				'longitude'		=> $this->POST('longitude')
			];

			$this->jalan_m->update($this->POST('id_data'), $this->data['jalan']);
			$this->upload($this->POST('id_data'), '../img', 'foto');

			$this->flashmsg('<i class="fa fa-check"></i> Data jalan berhasil diedit');
			redirect('admin/jalan');
			exit;	
		}

		if ($this->POST('get') && $this->POST('id_data'))
		{
			$this->data['jalan'] = $this->jalan_m->get_row(['id_data' => $this->POST('id_data')]);
			$tipe 		= [
				'Tanah' => 'Tanah', 
				'Semen' => 'Semen', 
				'Aspal' => 'Aspal'
			];
			$kondisi	= [
				'Baik'  => 'Baik', 
				'Sedang'=> 'Sedang', 
				'Buruk'	=> 'Buruk'
			];
			$this->data['jalan']->tipe_jalan = form_dropdown('tipe', $tipe, $this->data['jalan']->tipe, ['class' => 'form-control']);
			$this->data['jalan']->kondisi_jalan = form_dropdown('kondisi', $kondisi, $this->data['jalan']->kondisi, ['class' => 'form-control']);
			echo json_encode($this->data['jalan']);
			exit;
		}

		if ($this->GET('delete') && $this->GET('id'))
		{
			$this->data['id_data'] = $this->GET('id', true);
			$this->jalan_m->delete($this->data['id_data']);
			@unlink(realpath(APPPATH . '../img/' . $this->data['id_data'] . '.jpg'));
			$this->flashmsg('<i class="fa fa-trash"></i> Data jalan berhasil dihapus', 'warning');
			redirect('admin/jalan');
			exit;	
		}

		$this->data['jalan']	= $this->jalan_m->get_by_order('id_data', 'DESC');
		$this->data['title']	= 'Data Jalan | ' . $this->title;
		$this->data['content']	= 'admin/data_jalan';
		$this->template($this->data);	
	}

	public function user()
	{
		$this->load->model('pegawai_m');
		
		if ($this->POST('simpan'))
		{
			$this->data['user'] = [
				'nip'			=> $this->POST('nip'),
				'nama'			=> $this->POST('nama'),
				'jabatan'		=> $this->POST('jabatan'),
				'email'			=> $this->POST('email'),
				'nomor_hp'		=> $this->POST('nomor_hp'),
				'password'		=> md5($this->POST('password'))
			];

			$this->pegawai_m->insert($this->data['user']);

			$this->flashmsg('<i class="fa fa-check"></i> Data user baru berhasil disimpan');
			redirect('admin/user');
			exit;
		}

		if ($this->POST('edit') && $this->POST('nip_pk'))
		{
			$password = $this->POST('password');

			$this->data['user'] = [
				'nip'			=> $this->POST('nip'),
				'nama'			=> $this->POST('nama'),
				'jabatan'		=> $this->POST('jabatan'),
				'email'			=> $this->POST('email'),
				'nomor_hp'		=> $this->POST('nomor_hp')
			];

			if (!empty($password)) $this->data['user']['password'] = md5($password);

			$this->pegawai_m->update($this->POST('nip_pk'), $this->data['user']);
			$this->flashmsg('<i class="fa fa-check"></i> Data user berhasil diedit');
			redirect('admin/user');
			exit;	
		}

		if ($this->POST('get') && $this->POST('nip'))
		{
			$this->data['user'] = $this->pegawai_m->get_row(['nip' => $this->POST('nip')]);
			echo json_encode($this->data['user']);
			exit;
		}

		if ($this->GET('delete') && $this->GET('id'))
		{
			$this->data['nip'] = $this->GET('id', true);
			$this->pegawai_m->delete($this->data['nip']);
			$this->flashmsg('<i class="fa fa-trash"></i> Data user berhasil dihapus', 'warning');
			redirect('admin/user');
			exit;	
		}

		$this->data['pegawai']	= $this->pegawai_m->get_by_order('nama', 'ASC');
		$this->data['title']	= 'Data User | ' . $this->title;
		$this->data['content']	= 'admin/data_user';
		$this->template($this->data);
	}
}