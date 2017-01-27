<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Pantura_model');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	function login(){
		$session = $this->session->userdata('isLogin'); //mengabil dari session apakah sudah login atau belum
		if($session == FALSE) {//jika session false maka akan menampilkan halaman login
				$data=array('title'=>'Login Administrator',
				'isi' =>'login_view');
				$this->load->view('login_view',$data);
		}
	}

	function get_kota(){
		$query = $this->Pantura_model->get_kota();
		$response = array();
		$cek = $query;
		if($cek > 0){
			$response["kota"]	=array();
			foreach ($query as $row) {
				$data=array();
				$data["id"]		=	$row["id_kota"];
				$data["kota"]	=	$row["nama_kota"];
				$data["gambar"]	=	$row["gambar"];
				array_push($response["kota"], $data);
			}
			$response["success"]	= 1;
			$response["message"]	= "Semua data kota";
			echo json_encode($response);
		} else {
			$response["success"]	= 0;
			$response["message"]	= "Data kota gagal";
			echo json_encode($response);
		}
	}

	function detail_kota(){
		if($this->input->get('id_kota')){
			$kd=$this->input->get('id_kota');
		}
		$query = $this->Pantura_model->detail_kota($kd);
		$response = array();
		$cek = $query;
		if($cek > 0){
			$response["kota"]	=array();
			foreach ($query as $row) {
				$data=array();
				$data["id"]		=	$row["id_kota"];
				$data["kota"]	=	$row["nama_kota"];
				$data["deskripsi"]	=	$row["deskripsi"];
				$data["gambar"]	=	$row["gambar"];
				array_push($response["kota"], $data);
			}
			$response["success"]	= 1;
			$response["message"]	= "Semua data kota";
			echo json_encode($response);
		} else {
			$response["success"]	= 0;
			$response["message"]	= "Data kota gagal";
			echo json_encode($response);
		}
	}

	function get_wisata(){
		if($this->input->get('id_kota')){
			$kd=$this->input->get('id_kota');
		}
		$query = $this->Pantura_model->get_wisata($kd);
		$response = array();
		$cek = $query;
		if($cek > 0){
			$response["wisata"]	=array();
			foreach ($query as $row) {
				$data=array();
				$data["id_wisata"]		=	$row["id_tempat_wisata"];
				$data["id_kota"]		=	$row["id_kota"];
				$data["nama_tempat"]	=	$row["nama_tempat"];
				// $data["deskripsi"]	=	$row["deskripsi"];
				$data["gambar"]	=	$row["gambar"];
				$data["langi"]	=	$row["langitude"];
				$data["longi"]	=	$row["longitude"];
				array_push($response["wisata"], $data);
			}
			$response["success"]	= 1;
			$response["message"]	= "Semua data wisata";
			echo json_encode($response);
		} else {
			$response["success"]	= 0;
			$response["message"]	= "Data kota wisata";
			echo json_encode($response);
		}
	}

	function get_kuliner(){
		if($this->input->get('id_kota')){
			$kd=$this->input->get('id_kota');
		}
		$query = $this->Pantura_model->get_kuliner($kd);
		$response = array();
		$cek = $query;
		if($cek > 0){
			$response["kuliner"]	=array();
			foreach ($query as $row) {
				$data=array();
				$data["id_kuliner"]		=	$row["id_tempat_kuliner"];
				$data["id_kota"]		=	$row["id_kota"];
				$data["nama_tempat"]	=	$row["nama_tempat"];
				// $data["deskripsi"]	=	$row["deskripsi"];
				$data["gambar"]	=	$row["gambar"];
				$data["langi"]	=	$row["langitude"];
				$data["longi"]	=	$row["longitude"];
				array_push($response["kuliner"], $data);
			}
			$response["success"]	= 1;
			$response["message"]	= "Semua data wisata";
			echo json_encode($response);
		} else {
			$response["success"]	= 0;
			$response["message"]	= "Data kota wisata";
			echo json_encode($response);
		}
	}

	function detail_wisata(){
		if($this->input->post('id_kota') && $this->input->post('id_wisata')){
			$kd=$this->input->post('id_kota');
			$idw=$this->input->post('id_wisata');
		}
		$query = $this->Pantura_model->detail_wisata($kd,$idw);
		$response = array();
		$cek = $query;
		if($cek > 0){
			$response["wisata"]	=array();
			foreach ($query as $row) {
				$data=array();
				$data["id_wisata"]		=	$row["id_tempat_wisata"];
				$data["id_kota"]		=	$row["id_kota"];
				$data["nama_tempat"]	=	$row["nama_tempat"];
				$data["deskripsi"]	=	$row["deskripsi"];
				$data["gambar"]	=	$row["gambar"];
				$data["langi"]	=	$row["langitude"];
				$data["longi"]	=	$row["longitude"];
				array_push($response["wisata"], $data);
			}
			$response["success"]	= 1;
			$response["message"]	= "Semua data wisata";
			echo json_encode($response);
		} else {
			$response["success"]	= 0;
			$response["message"]	= "Data wisata gagal";
			echo json_encode($response);
		}
	}

	function detail_kuliner(){
		if($this->input->post('id_kota') && $this->input->post('id_kuliner')){
			$kd=$this->input->post('id_kota');
			$idk=$this->input->post('id_kuliner');
		}
		$query = $this->Pantura_model->detail_kuliner($kd,$idk);
		$response = array();
		$cek = $query;
		if($cek > 0){
			$response["kuliner"]	=array();
			foreach ($query as $row) {
				$data=array();
				$data["id_kuliner"]		=	$row["id_tempat_kuliner"];
				$data["id_kota"]		=	$row["id_kota"];
				$data["nama_tempat"]	=	$row["nama_tempat"];
				$data["deskripsi"]	=	$row["deskripsi"];
				$data["gambar"]	=	$row["gambar"];
				$data["langi"]	=	$row["langitude"];
				$data["longi"]	=	$row["longitude"];
				array_push($response["kuliner"], $data);
			}
			$response["success"]	= 1;
			$response["message"]	= "Semua data kuliner";
			echo json_encode($response);
		} else {
			$response["success"]	= 0;
			$response["message"]	= "Data kuliner gagal";
			echo json_encode($response);
		}
	}

	function comment_wisata(){
		if($this->input->post('id_kota') && $this->input->post('id_wisata')){
			$wd=$this->input->post('id_kota');
			$idw=$this->input->post('id_wisata');
		}
		$query = $this->Pantura_model->get_feedback_wisata($wd,$idw);
		$response = array();
		$cek = $query;
		if($cek > 0){
			$response["comment_w"]	=array();
			foreach ($query as $row) {
				$data=array();
				$data["id_wisata"]		=	$row["id_tempat_wisata"];
				$data["id_kota"]		=	$row["id_kota"];
				$data["id_feedback_tw"]		=	$row["id_feedback_tw"];
				$data["feedback"]	=	$row["feedback"];
				$data["name"]	=	$row["name"];
				$data["id_user"]	=	$row["id_user"];
				array_push($response["comment_w"], $data);
			}
			$response["success"]	= 1;
			$response["message"]	= "Semua data wisata";
			echo json_encode($response);
		} else {
			$response["success"]	= 0;
			$response["message"]	= "Data wisata gagal";
			echo json_encode($response);
		}
	}

	function comment_kuliner(){
		if($this->input->post('id_kota') && $this->input->post('id_kuliner')){
			$kd=$this->input->post('id_kota');
			$idw=$this->input->post('id_kuliner');
		}
		$query = $this->Pantura_model->get_feedback_kuliner($kd,$idw);
		$response = array();
		$cek = $query;
		if($cek > 0){
			$response["comment_k"]	=array();
			foreach ($query as $row) {
				$data=array();
				$data["id_kuliner"]		=	$row["id_tempat_kuliner"];
				$data["id_kota"]		=	$row["id_kota"];
				$data["feedback"]	=	$row["feedback"];
				$data["name"]	=	$row["name"];
				$data["id_user"]	=	$row["id_user"];
				$data["id_feedback_tk"]	=	$row["id_feedback_tk"];
				array_push($response["comment_k"], $data);
			}
			$response["success"]	= 1;
			$response["message"]	= "Semua data kuliner";
			echo json_encode($response);
		} else {
			$response["success"]	= 0;
			$response["message"]	= "Data kuliner gagal";
			echo json_encode($response);
		}
	}

	function submit_feedback_tw() {
		$response = array("error" => FALSE);

		if ($this->input->post('id_user',TRUE) && $this->input->post('id_wisata',TRUE)) {

		    // receiving the post params
		    $id_user = $this->input->post('id_user',TRUE);
		    $id_wisata = $this->input->post('id_wisata',TRUE);
		    $id_kota = $this->input->post('id_kota',TRUE);
				$feedback = $this->input->post('feedback',TRUE);

				$data = array(
					'id_user' => $id_user,
					'id_tempat_wisata' => $id_wisata,
					'id_kota' => $id_kota,
					'feedback' => $feedback
				);

				$this->Pantura_model->store_comment_wisata($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function submit_feedback_tk() {
		$response = array("error" => FALSE);

		if ($this->input->post('id_user',TRUE) && $this->input->post('id_kuliner',TRUE)) {

		    // receiving the post params
		    $id_user = $this->input->post('id_user',TRUE);
		    $id_kuliner = $this->input->post('id_kuliner',TRUE);
		    $id_kota = $this->input->post('id_kota',TRUE);
				$feedback = $this->input->post('feedback',TRUE);

				$data = array(
					'id_user' => $id_user,
					'id_tempat_kuliner' => $id_kuliner,
					'id_kota' => $id_kota,
					'feedback' => $feedback
				);

				$this->Pantura_model->store_comment_kuliner($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function delete_data_kota() {
		$response = array("error" => FALSE);

		if ($this->input->post('id_kota',TRUE)) {

		    // receiving the post params
		    $id_kota = $this->input->post('id_kota',TRUE);

				$data = array(
					'id_kota' => $id_kota,
				);

				$this->Pantura_model->delete_kota($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function delete_data_wisata() {
		$response = array("error" => FALSE);

		if ($this->input->post('id_kota',TRUE) && $this->input->post('id_wisata',TRUE)) {

		    // receiving the post params
		    $id_kota = $this->input->post('id_kota',TRUE);
		    $id_wisata = $this->input->post('id_wisata',TRUE);
				$data = array(
					'id_kota' => $id_kota,
					'id_wisata' => $id_wisata
				);

				$this->Pantura_model->delete_wisata($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function delete_data_kuliner() {
		$response = array("error" => FALSE);

		if ($this->input->post('id_kota',TRUE) && $this->input->post('id_kuliner',TRUE)) {

		    // receiving the post params
		    $id_kota = $this->input->post('id_kota',TRUE);
		    $id_kuliner = $this->input->post('id_kuliner',TRUE);
				$data = array(
					'id_kota' => $id_kota,
					'id_kuliner' => $id_kuliner
				);

				$this->Pantura_model->delete_kuliner($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function submit_data_kota() {
		$response = array("error" => FALSE);

		if ($this->input->post('deskripsi',TRUE) && $this->input->post('nama_kota',TRUE) && $this->input->post('nama_gambar',TRUE)) {

		    // receiving the post params
		    $nama_kota = $this->input->post('nama_kota',TRUE);
				$deskripsi = $this->input->post('deskripsi',TRUE);
				$nama_gambar = $this->input->post('nama_gambar',TRUE);

				$image_encoded = $this->input->post('gambar', TRUE);
				$image_decoded = base64_decode($image_encoded);

				$path = './img_kota/'.$nama_gambar;

				$file = fopen($path, 'w');

			  //Write the file to the folder
			  fwrite($file, $image_decoded);

			  //Close the file
			  fclose($file);

				$data = array(
					'nama_kota' => $nama_kota,
					'deskripsi' => $deskripsi,
					'gambar' => $nama_gambar
				);

				$this->Pantura_model->input_kota($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}


	function submit_data_kuliner() {
		$response = array("error" => FALSE);

		if ($this->input->post('deskripsi',TRUE) && $this->input->post('nama_tempat',TRUE) && $this->input->post('id_kota',TRUE)) {

		    // receiving the post params
		    $nama_tempat = $this->input->post('nama_tempat',TRUE);
				$deskripsi = $this->input->post('deskripsi',TRUE);
				$nama_gambar = $this->input->post('nama_gambar',TRUE);
				$lati = $this->input->post('lati',TRUE);
				$longi = $this->input->post('longi',TRUE);
				$id_kota = $this->input->post('id_kota',TRUE);

				$image_encoded = $this->input->post('gambar', TRUE);
				$image_decoded = base64_decode($image_encoded);

				$path = './img_kota/'.$nama_gambar;

				$file = fopen($path, 'w');

			  //Write the file to the folder
			  fwrite($file, $image_decoded);

			  //Close the file
			  fclose($file);

				$data = array(
					'id_kota' => $id_kota,
					'nama_tempat' => $nama_tempat,
					'deskripsi' => $deskripsi,
					'gambar' => $nama_gambar,
					'langitude' => $lati,
					'longitude' => $longi
				);

				$this->Pantura_model->input_kuliner($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function submit_data_wisata() {
		$response = array("error" => FALSE);

		if ($this->input->post('deskripsi',TRUE) && $this->input->post('nama_tempat',TRUE) && $this->input->post('id_kota',TRUE)) {

		    // receiving the post params
		    $nama_tempat = $this->input->post('nama_tempat',TRUE);
				$deskripsi = $this->input->post('deskripsi',TRUE);
				$nama_gambar = $this->input->post('nama_gambar',TRUE);
				$lati = $this->input->post('lati',TRUE);
				$longi = $this->input->post('longi',TRUE);
				$id_kota = $this->input->post('id_kota',TRUE);

				$image_encoded = $this->input->post('gambar', TRUE);
				$image_decoded = base64_decode($image_encoded);

				$path = './img_kota/'.$nama_gambar;

				$file = fopen($path, 'w');

			  //Write the file to the folder
			  fwrite($file, $image_decoded);

			  //Close the file
			  fclose($file);

				$data = array(
					'id_kota' => $id_kota,
					'nama_tempat' => $nama_tempat,
					'deskripsi' => $deskripsi,
					'gambar' => $nama_gambar,
					'langitude' => $lati,
					'longitude' => $longi
				);

				$this->Pantura_model->input_wisata($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function edit_data_kota() {
		$response = array("error" => FALSE);

		if ($this->input->post('deskripsi',TRUE) && $this->input->post('id_kota',TRUE)) {

		    // receiving the post params
		    $nama_kota = $this->input->post('nama_kota',TRUE);
		    $id_kota = $this->input->post('id_kota',TRUE);
				$deskripsi = $this->input->post('deskripsi',TRUE);

				$data = array(
					'nama_kota' => $nama_kota,
					'id_kota' => $id_kota,
					'deskripsi' => $deskripsi
				);

				$this->Pantura_model->edit_kota($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function edit_data_wisata() {
		$response = array("error" => FALSE);

		if ($this->input->post('id_wisata',TRUE) && $this->input->post('deskripsi',TRUE)) {

		    // receiving the post params
		    $id_wisata = $this->input->post('id_wisata',TRUE);
		    $id_kota = $this->input->post('id_kota',TRUE);
		    $nama_tempat = $this->input->post('nama_tempat',TRUE);
				$deskripsi = $this->input->post('deskripsi',TRUE);
				$lati = $this->input->post('lati',TRUE);
				$longi = $this->input->post('longi',TRUE);

				$data = array(
					'id_tempat_wisata' => $id_wisata,
					'id_kota' => $id_kota,
					'deskripsi' => $deskripsi,
					'langitude' => $lati,
					'longitude' => $longi,
					'nama_tempat' => $nama_tempat
				);

				$this->Pantura_model->edit_tempat_wisata($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function edit_data_kuliner() {
		$response = array("error" => FALSE);

		if ($this->input->post('id_kuliner',TRUE) && $this->input->post('deskripsi',TRUE)) {

		    // receiving the post params
		    $id_kuliner = $this->input->post('id_kuliner',TRUE);
		    $id_kota = $this->input->post('id_kota',TRUE);
		    $nama_tempat = $this->input->post('nama_tempat',TRUE);
				$deskripsi = $this->input->post('deskripsi',TRUE);
				$lati = $this->input->post('lati',TRUE);
				$longi = $this->input->post('longi',TRUE);

				$data = array(
					'id_tempat_kuliner' => $id_kuliner,
					'id_kota' => $id_kota,
					'deskripsi' => $deskripsi,
					'langitude' => $lati,
					'longitude' => $longi,
					'nama_tempat' => $nama_tempat
				);

				$this->Pantura_model->edit_tempat_kuliner($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function delete_comment_wisata_data() {
		$response = array("error" => FALSE);

		if ($this->input->post('id_user',TRUE) && $this->input->post('id_feedback_tw',TRUE)) {

		    // receiving the post params
		    $id_user = $this->input->post('id_user',TRUE);
		    $id_wisata = $this->input->post('id_wisata',TRUE);
		    $id_kota = $this->input->post('id_kota',TRUE);
				$id_feedback_tw = $this->input->post('id_feedback_tw',TRUE);

				$data = array(
					'id_user' => $id_user,
					'id_tempat_wisata' => $id_wisata,
					'id_kota' => $id_kota,
					'id_feedback_tw' => $id_feedback_tw
				);

				$this->Pantura_model->delete_comment_wisata($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	function delete_comment_kuliner_data() {
		$response = array("error" => FALSE);

		if ($this->input->post('id_user',TRUE) && $this->input->post('id_feedback_tk',TRUE)) {

		    // receiving the post params
		    $id_user = $this->input->post('id_user',TRUE);
		    $id_kuliner = $this->input->post('id_kuliner',TRUE);
		    $id_kota = $this->input->post('id_kota',TRUE);
				$id_feedback_tk = $this->input->post('id_feedback_tk',TRUE);

				$data = array(
					'id_user' => $id_user,
					'id_tempat_kuliner' => $id_kuliner,
					'id_kota' => $id_kota,
					'id_feedback_tk' => $id_feedback_tk
				);

				$this->Pantura_model->delete_comment_kuliner($data);
				$response["success"] = TRUE;
				$response["success_msg"] = "Success";
				echo json_encode($response);

		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters is missing!";
		    echo json_encode($response);
		}
	}

	public function registration_endpoint() {
		$response = array("error" => FALSE);

		if ($this->input->post('email',TRUE) && $this->input->post('password',TRUE) && $this->input->post('name',TRUE)) {
		// if (($this->input->get('name',TRUE) && $this->input->get('email',TRUE)) && ($this->input->get('password',TRUE))) {

		    // receiving the post params
		    $name = $this->input->post('name',TRUE);
		    $email = $this->input->post('email',TRUE);
		    $password = $this->input->post('password',TRUE);

				$cek = $this->Pantura_model->is_user_existed($email);

		    // check if user is already existed with the same email
		    if ($cek) {
		        // user already existed
		        $response["error"] = TRUE;
		        $response["error_msg"] = "User already existed with " . $email;
		        echo json_encode($response);
		    } else {
		        // create a new user
						$this->Pantura_model->store_user_2($name, $email, $password);

						$user_stored = $this->Pantura_model->get_individual_user($email);

						if ($user_stored > 0) {
							foreach($user_stored as $user) {
								// user stored successfully
		            $response["error"] = FALSE;
		            $response["uid"] = $user["unique_id"];
		            $response["user"]["name"] = $user["name"];
		            $response["user"]["email"] = $user["email"];
		            $response["user"]["created_at"] = $user["created_at"];
		            $response["user"]["updated_at"] = $user["updated_at"];
		            echo json_encode($response);
							}
		        } else {
		            // user failed to store
		            $response["error"] = TRUE;
		            $response["error_msg"] = "Unknown error occurred in registration!";
		            echo json_encode($response);
		        }
		    }
		} else {
		    $response["error"] = TRUE;
		    $response["error_msg"] = "Required parameters (name, email or password) is missing!";
		    echo json_encode($response);
		}
	}

	public function login_endpoint() {
		$response = array("error" => FALSE);
		if ($this->input->post('email',TRUE) && $this->input->post('password',TRUE)) {

		  // receiving the post params
		  $email = $this->input->post('email');
		  $password = $this->input->post('password');

		  // get the user by email and password
		  $query = $this->Pantura_model->get_user_by_email_password($email, $password);

		  if ($query > 0) {
				foreach ($query as $user) {
					// use is found
		      $response["error"] = FALSE;
		      $response["uid"] = $user["unique_id"];
		      $response["user"]["name"] = $user["name"];
		      $response["user"]["email"] = $user["email"];
		      $response["user"]["created_at"] = $user["created_at"];
		      $response["user"]["updated_at"] = $user["updated_at"];
		      $response["user"]["id_user"] = $user["id_user"];
		      echo json_encode($response);
				}
		  } else {
		      // user is not found with the credentials
		      $response["error"] = TRUE;
		      $response["error_msg"] = "Login credentials are wrong. Please try again!";
		      echo json_encode($response);
		  }
		} else {
		  // required post params is missing
		  $response["error"] = TRUE;
		  $response["error_msg"] = "Required parameters email or password is missing!";
		  echo json_encode($response);
		}
	}

	function login_action(){

		$response = array("error" => FALSE);
		if ($this->input->post('email',TRUE) && $this->input->post('password',TRUE)) {

		// receiving the post params
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		//&& $this->db->where('name', "Pantura Administrator")
		// get the user by email and password
		$query = $this->Pantura_model->get_user_by_email_password($email, $password);

		if($query > 0){
			$data_session = array(
				'nama' => $email,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			if($this->session->userdata('nama')  == "admin" ){
				redirect(base_url('Admin'));
			} else {
				$this->session->set_flashdata('err_message', 'Anda tidak berhak mengakses halaman ini!');
				redirect('welcome/login', $data);
                                $this->session->sess_destroy();
			}
		} else {
			$this->session->set_flashdata('err_message', 'Invalid User Id and Password combination!');
			//$data["error"]= "Invalid User Id and Password combination";
			redirect('welcome/login', $data);
		}
	}

}
	}
