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


	public function test_user_exist($name,$email,$password){
		return $this->Pantura_model->store_user_2($name, $email, $password);
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



}
