<?php
defined('BASEPATH') OR exit ('No direct script  access allowed');

class Kota_con extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Pantura_model');
	}
	
	function index(){
		$data=array(
			'title'=>'Pantura',
			'isi' =>'home_view'
		);
		$this->load->view('layout/wrapper',$data); 
	}
	
	function daftar_kota(){
		$data=array(
			'title'=>'Pantura',
			'isi' =>'kota_view'
		);
		$data['kota'] = $this->Pantura_model->data_view_kota()->result();
		$this->load->view('layout/wrapper', $data);
	}
	
	function tambah(){
		$data=array('title'=>'Pantura',
			'isi' =>'input_kota'
		);
		$this->load->view('layout/wrapper', $data);
	}
	
	function tambah_data(){
		
		$nama_kota = $this->input->post('nama_kota');
		$deskripsi = $this->input->post('deskripsi');
		
		$config['upload_path']          = './img_kota/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 2048;
		$config['max_width']            = 5000;
		$config['max_height']           = 3000;
		
		$this->upload->initialize($config);
		$this->load->library('upload', $config);
		$this->upload->do_upload('gambar');
		
		$gambar1 = $this->upload->data();
			$data = array(
				'nama_kota' => $nama_kota,
				'deskripsi' => $deskripsi,
				'gambar' => $gambar1['file_name']
			);
			
		$this->Pantura_model->input_data($data, 'tb_kota');
		redirect('Kota_con/daftar_kota');
	}
	
	function hapus($id){
		$where = array('id_kota' => $id);
		$this->Pantura_model->hapus_data($where, 'tb_kota');
		redirect('Kota_con/daftar_kota');
	}
	
	function edit($id){
		
		$where = array('id_kota' => $id);
		
		$data=array(
			'title'=>'Pantura',
			'isi' =>'edit_view',
			'kota' => $this->Pantura_model->edit_data($where, 'tb_kota')->result()
		);
		$this->load->view('layout/wrapper',$data); 
	}
	
	function update(){
		$id = $this->input->post('id_kota');
		$kota = $this->input->post('nama_kota');
		$deskripsi = $this->input->post('deskripsi');
		
		$data = array(
			'nama_kota' => $kota,
			'deskripsi' => $deskripsi
		);
		
		$where = array(
			'id_kota' => $id
		);
		
		$this->Pantura_model->update_data($where, $data, 'tb_kota');
		redirect('Kota_con/daftar_kota');
	}
}