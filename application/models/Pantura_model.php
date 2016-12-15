<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Pantura_model extends CI_Model {

		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		function get_kota(){
      $obj = $this->db->select('*')
          ->get('tb_kota');
      return $obj->result_array();
		}

    function detail_kota($kd){
      $obj = $this->db->select('*')
          ->where('id_kota',$kd)
          ->get('tb_kota');
      return $obj->result_array();
    }

    function store_user($data){
      return $this->db->insert('tb_user', $data);
    }

    function get_individual_user($data){
      $obj = $this->db->select('*')
          ->where('email',$data)
          ->get('tb_user');
      return $obj->result_array();
    }

    function get_if_user_exist($data){
      $obj = $this->db->select('email')
          ->where('email',$data)
          ->get('tb_user');
      return $obj->result_array();
    }

		/**
	   * Encrypting password
	   * @param password
	   * returns salt and encrypted password
	   */
	  public function hashSSHA($password) {

	      $salt = sha1(rand());
	      $salt = substr($salt, 0, 10);
	      $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
	      $hash = array("salt" => $salt, "encrypted" => $encrypted);
	      return $hash;
	  }

	  /**
	   * Decrypting password
	   * @param salt, password
	   * returns hash string
	   */
	  public function checkhashSSHA($salt, $password) {

	      $hash = base64_encode(sha1($password . $salt, true) . $salt);

	      return $hash;
	  }

		public function store_user_2($name, $email, $password){
			$uuid = random_string('sha1',40);
			$hash = $this->Pantura_model->hashSSHA($password);
			$encrypted_password = $hash["encrypted"]; // encrypted password
			$salt = $hash["salt"]; // salt
			$this->db->query("INSERT INTO tb_user VALUES (NULL, '$uuid', '$name', '$email', '$encrypted_password', '$salt', NOW(), NULL)");
		}

		public function get_user_by_email_password($email, $password) {
			$query = $this->Pantura_model->get_individual_user($email);
			if(count($query) == 1) {
				foreach($query as $user) {
					$salt = $user['salt'];
					$encrypted_password = $user['encrypted_password'];
					$email = $user['email'];
				}
				$hash = $this->Pantura_model->checkhashSSHA($salt, $password);
				if ($encrypted_password == $hash) {
						// user authentication details are correct
						return $this->Pantura_model->get_individual_user($email);
				}
			} else {
				return NULL;
			}
		}

		public function is_user_existed($email) {
			$query = $this->Pantura_model->get_if_user_exist($email);
			if ($query) {
				//echo 'true';
				return true;
			} else {
				//echo 'false';
				return false;
			}
		}


	}

?>
