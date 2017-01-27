<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Kuliner_con extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Pantura_model');
	}
	
	function index(){
		$data = array(
			'title' => 'Pantura',
			'isi' => 'kuliner_view'
		);	
		$data['kuliner'] = $this->Pantura_model->data_view_kuliner()->result();
		$this->load->view('layout/wrapper', $data);
	}
	
	function tambah(){
		$data=array(
			'title'=>'Pantura',
			'isi' =>'input_kuliner',
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
		
		$config['upload_path']		= './img_kuliner/';
		$config['allowed_types']	= 'gif|jpg|png|jpeg';
		$config['max_size']			= 2048;
		$config['max_width']		= 5000;
		$config['max_height']		= 3000;
		
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar_kul');
		
		$gambar_kul1 = $this->upload->data();
		
		$data = array(
			'nama_tempat'	=> $nama_tempat,
			'deskripsi'		=> $deskripsi,
			'langitude'		=> $langitude,
			'longitude'		=> $longitude,
			'id_kota'		=> $id_kota,
			'gambar'		=> $gambar_kul1['file_name']
		);
		
		$this->Pantura_model->input_data($data, 'tb_tempat_kuliner');
		redirect('Kuliner_con/index');
	}
	
	function hapus($id){
		$where = array('id_tempat_kuliner' => $id);
		$this->Pantura_model->hapus_data($where, 'tb_tempat_kuliner');
		redirect('Kuliner_con/index');
	}
	
	function edit($id){
		$where = array('id_tempat_kuliner' => $id);
		$data = array(
			'title' => 'Pantura',
			'isi' => 'edit_kuliner',
			'kuliner' => $this->Pantura_model->edit_data($where, 'tb_tempat_kuliner')->result()
		);
		$this->load->view('layout/wrapper', $data);
	}
	
	function update(){
		$id = $this->input->post('id_tempat_kuliner');
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
			'id_tempat_kuliner' => $id
		);
		
		$this->Pantura_model->update_data($where, $data, 'tb_tempat_kuliner');
		redirect('Kuliner_con/index');
	}
}