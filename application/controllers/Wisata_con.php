<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata_con extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Pantura_model');
	}
	
	function index(){
		$data = array(
			'title' => 'Pantura',
			'isi' => 'wisata_view'
		);	
		$data['wisata'] = $this->Pantura_model->data_view_wisata()->result();
		$this->load->view('layout/wrapper', $data);
	}
	
	function tambah(){
		$data = array(
			'title' => 'Pantura',
			'isi' => 'input_wisata',
			'kota' => $this->Pantura_model->data_view_kota()
		);
		
		$this->load->view('layout/wrapper', $data);
	}
	
	function tambah_data(){
		$nama_tempat = $this->input->post('nama_tempat');
		$deskripsi = $this->input->post('deskripsi');
		$langitude = $this->input->post('langitude');
		$longitude = $this->input->post('longitude');
		$id_kota = $this->input->post('id_kota');
		
		$config['upload_path']		= './img_wisata/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 2048;
		$config['max_width']		= 5000;
		$config['max_height']		= 3000;
		
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar_wis');
		
		$gambar_wis1 = $this->upload->data();
		
		$data = array(
			'nama_tempat'	=> $nama_tempat,
			'deskripsi'		=> $deskripsi,
			'langitude'		=> $langitude,
			'longitude'		=> $longitude,
			'id_kota'		=> $id_kota,
			'gambar'		=> $gambar_wis1['file_name']
		);
		
		$this->Pantura_model->input_data($data, 'tb_tempat_wisata');
		redirect('Wisata_con/index');
	}
	
	function hapus($id){
		$where = array('id_tempat_wisata' => $id);
		$this->Pantura_model->hapus_data($where, 'tb_tempat_wisata');
		redirect('Wisata_con/index');
	}
	
	function edit($id){
		$where = array('id_tempat_wisata' => $id);
		$data = array(
			'title' => 'Pantura',
			'isi' => 'edit_wisata',
			'wisata' => $this->Pantura_model->edit_data($where, 'tb_tempat_wisata')->result()
		);	
		$this->load->view('layout/wrapper', $data);
	}
	
	function update(){
		$id = $this->input->post('id_tempat_wisata');
		$nama_tempat = $this->input->post('nama_tempat');
		$deskripsi = $this->input->post('deskripsi');
		$langitude = $this->input->post('langitude');
		$longitude = $this->input->post('longitude');
		
		$data = array(
			'nama_tempat' => $nama_tempat,
			'deskripsi' => $deskripsi,
			'langitude' => $langitude,
			'longitude' => $longitude
		);
		
		$where = array(
			'id_tempat_wisata' => $id
		);
		
		$this->Pantura_model->update_data($where, $data, 'tb_tempat_wisata');
		redirect('Wisata_con/index');
	}
}