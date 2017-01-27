<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status')!= "login" ){
			redirect(base_url("Welcome"));
		}
	}
	
	function index(){
		//redirect aja ini
		redirect('Kota_con/index');
	}
	
	function logout(){
		$this->session->sess_destroy();
		$this->load->view('welcome_message');
	}
}